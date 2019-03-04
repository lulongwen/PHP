
<?php
header('content-type:text/html; charset=utf-8');
/** 处理提交请求的思路
 * 1. 接收这个 ID，对 id记录进行删除操作
 * 2. 链接数据库，delete 语句 where id= 这个ID
 */

// 1 接收表单数据, 对ID 进行验证
$id = $_GET['id'];
if(empty($id)){
  echo '<script>window.alert(\'错误的 ID！\');
    window.location.href="./admin.php"</script>';
  exit;
}

// 2 链接数据库
include "../mysqli.php";

// 3 拼接 sql语句，通过 用户名和密码获取当前用户的信息
$sql = "DELETE FROM `mes_info` WHERE id = '{$id}'";

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
  echo '<script>window.alert(\'真正影响到了数据库的表, 删除成功\')</script>';
}else{
  echo '<script>alert("删除失败，删除的数据不存在")</script>';
}

echo '<script>window.location.href="./admin.php"</script>';


//6 释放资源，关闭链接
$res-> free();
$mysqli-> close();
