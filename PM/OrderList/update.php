<?php
  header('content-type: application/json;charset=utf-8');

  // 设定默认的时区，不然晚8个小时
  date_default_timezone_set('PRC');

  // 1 引入数据库链接文件
  include './mysqli.php';

  // 获取数据
  $data = json_decode(file_get_contents("php://input"), true);

  // 2 接收参数
  $sku = $data['sku'];
  $number = $data['number'];
  $purchase = $data['purchase_price'];
  $kg = $data['kg'];
  $link = $data['link'];
  $sell = $data['sell_price'];
  $remark = $data['remark'];
  $avatar = $data['avatar'];
  $undesc = $data['undesc'];
  $id = $data['id'];

  // 3 验证数据不能为空和数据格式有效性
  if (!$number) {
    $response['status'] = 0;
    $response['message'] = '商品编码不能为空';
    echo json_encode($response);
    exit;
  }

  // 4 发送 sql语句
  $sql = "UPDATE list
  SET sku='{$sku}', number='{$number}', purchase_price = '{$purchase}', sell_price = '{$sell}',
  kg='{$kg}', link='{$link}', remark = '{$remark}', avatar = '{$avatar}', undesc = '{$undesc}'
  WHERE id = '{$id}'";


  $res = $mysqli-> query($sql);
  if (!$res) {
    $response['status'] = 0;
    $response['message'] = '修改失败！原因：'. $mysqli->error;
    echo json_encode($response);
    exit;
  }
  $response['status'] = 200;
  $response['message'] = '修改成功';
  echo json_encode($response);
  exit;

  // 5 释放资源，关闭 mysqli链接
  // $res-> free();
  $mysqli-> close();