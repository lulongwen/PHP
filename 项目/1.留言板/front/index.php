<?php
header('content-type:text/html; charset=utf-8');
// 设定默认的时区，不然晚8个小时
date_default_timezone_set('PRC');

/**
 * Created by PhpStorm.
 * User: lulongwen
 * Date: 2019-02-28
 * Time: 22:53
 *
  接收数据，处理提交请求的思路
 * 1 接收用户提交的数据，对值进行校验
 * 2 链接数据库，选择使用数据库
 * 3 把 sql语句发送给 DBMS
 * 4 获取结果
 */

// 1 接收数据，$_POST 预定义超全局数组
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$title = $_POST['title'];
$content = $_POST['content'];
$addtime = date('Y-m-d H:i:s'); // 2016-03-25 09:56:22


// 2 对数据进行验证
if (!$name || !$title || !$content) {
  echo "<script>
    alert('内容不能为空')
    location.href = '../index.html'
  </script>";
  exit;
}


// 3 引入数据库链接，拼接 sql语句
include '../mysqli.php';
$sql = "insert into mes_info
  values(null, '{$name}', '{$phone}', '{$email}', '{$title}', '{$content}', '{$addtime}')";

// 5 执行 sql语句，$res是mysqli_result 的对象
$res = $mysqli-> query($sql);

// 成功返回 true，失败 false
if (!$res) {
  echo '留言失败，sql语句是：'. $sql .'<br>
        失败的原因是：'. $mysqli->error;
  exit;
}

// 返回留言页面，不要卸载关闭 mysqli链接后面
echo '<script>location.href="../index.html"</script>';

// 6 关闭资源，释放结果集，如果你不释放，系统也会自动释放
$res-> free();

// 7 关闭 mysql链接
$mysqli-> close();


























