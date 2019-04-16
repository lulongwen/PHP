<?php
  header('content-type: application/json;charset=utf-8');

  // 设定默认的时区，不然晚8个小时
  date_default_timezone_set('PRC');

  // 1 引入数据库链接文件
  include './mysqli.php';

  // 获取数据
  $data = json_decode(file_get_contents("php://input"), true);
  $id = $data['id'];

  // 1 接收表单数据, 对ID 进行验证
  if(empty($id)){
    $response['status'] = 0;
    $response['message'] = 'id 不能为空';
    echo json_encode($response);
    exit;
  }

  // 3 拼接 sql语句，通过 用户名和密码获取当前用户的信息
  $sql = "DELETE FROM `list` WHERE id = '{$id}'";

  // 4 执行 sql语句, $res 是 mysqli_result 的对象
  $res = $mysqli->query($sql);

  // 对结果进行判断
  if(!$res){
    echo '<br> 执行失败， sql语句是'. $sql .
      '<br> 失败的原因是：'. $mysqli->error;
    exit;
  }

  // 5 update & delete 修改是否影响到了数据库的表，例如删除的 id不存在
  if( $mysqli->affected_rows > 0 ){
    // 返回的数据
    $response['status'] = 200;
    $response['message'] = '删除成功';
    echo json_encode($response);
  }else{
    $response['status'] = 200;
    $response['message'] = '删除的数据不存在';
    echo json_encode($response);
  }


  //6 释放资源，关闭链接
  // $res-> free();
  $mysqli-> close();
