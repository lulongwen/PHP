
<?php
header('content-type:text/html; charset=utf-8');
/** 处理提交请求的思路
 * 1. 接受用户提交的信息并验证
 * 2. 链接数据库
 * 3. 通过用户名和密码获取当前用户的数据 select语句
 * 4. 如果有用户跳转列表页，如果没有用户，警告
 * 2019-03-03 22:25:37
 */

// 1 接收表单数据
$username = $_POST['username'];
$password = $_POST['password'];

// 2 对数据进行验证
if(!$username || !$password){
  echo "<script>alert('用户名和密码不能为空！');
    location.href='../login.html'</script>";
  exit;
}

// 3 引入数据库链接
include '../mysqli.php';


// 4 拼接 sql语句，通过 用户名和密码获取当前用户的信息
$sql = "SELECT * FROM `users`
  WHERE username = '{$username}' AND password = '{$password}'";

// 5 执行 sql语句, $res是 mysqli_result 的对象
$res = $mysqli->query($sql);
if(!$res){
  echo '<br> 执行失败， sql语句是'. $sql .
    '<br> 失败的原因是：'. $mysqli->error;
  exit;
}

// 6 能取到一条数据就返回 true，否则 false
$row = $res-> num_rows;

// 7 用户名密码正确跳转到主页面
if($row){
  echo "<script>location.href = './admin.php';</script>";
}else{
  echo "<script>location.href = '../login.html';
    alert('用户名或密码错误 ！')</script>";
  exit;
}


// 8 释放资源，关闭 mysqli链接
$res->free();
$mysqli->close();




