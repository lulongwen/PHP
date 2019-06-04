<?php
  header('content-type: application/json;charset=utf-8');

  // 设定默认的时区，不然晚8个小时
  date_default_timezone_set('PRC');

  // 1 引入数据库链接文件
  include './mysqli.php';

  // 获取数据
  $data = json_decode(file_get_contents("php://input"), true);

  //

  // 2 接收参数
  $sku = $data['sku'];
  $number = $data['number'];

  // 3 验证数据不能为空和数据格式有效性

  if (empty($sku)) {
    // select * from list where locate('ok',sku);
    $sql = "SELECT * FROM list WHERE LOCATE('{$number}', number)";
  }
  else if (empty($number)) {
    $sql = "SELECT * FROM list WHERE LOCATE('{$sku}', sku)";
  }
  else {
    $sql = "SELECT * FROM list WHERE LOCATE('{$sku}', sku) and LOCATE('{$number}', number)";
  }

  // 4 发送 sql语句
  $res = $mysqli-> query($sql);

  if (!$res) {
    // 返回的数据
    $response['status'] = 0;
    $response['message'] = $mysqli->error;
    echo json_encode($response);
  }

  // 定义一个空数组来接收数据
  $arr = array();
  while($row = $res-> fetch_assoc()) {
    $arr[] = $row;
  }

  // 返回的数据
  echo json_encode($arr);

  // 5 释放资源，关闭 mysqli链接
  // $res-> free();
  $mysqli-> close();

