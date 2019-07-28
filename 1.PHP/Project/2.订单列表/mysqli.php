<?php

// 定义数据库链接常量
define('host', 'localhost');
define('user', 'root');
define('pwd', 'root');
define('dbName', 'pms');
define('port', 3306);

// 1 实例化一个 Mysqi 对象
$mysqli = new Mysqli(host, user, pwd, dbName, port);

// 2 设置字符集
$mysqli-> set_charset('utf8');

// 3 链接是否成功，
if ($mysqli-> connect_errno) {
  die('数据库链接错误，错误信息是：'. $mysqli->connect_error);
}


/* ================
// 4 链接成功，拼接 sql语句返回结果集
$sql = 'SELECT * FROM `employee`';

// 5 执行 sql语句，$res是mysqli_result 的对象
$res = $mysqli-> query($sql);

// 5.1 成功返回 true，失败 false，进行页面链接跳转
if ($res) {
  echo '<script>location.href="../info.php"</script>';
}
else {
  echo '<script>location.href="../index.html"</script>';
  echo '执行失败，sql语句是：'. $sql .'<br>
        失败的原因是：'. $mysqli->error;
  exit;
}

// update & delete 修改是否影响到了表的数据，例如 删除的 id 不存在
if ($mysqli-> affected_rows > 0) {
  echo '<mark>操作修改了表的数据</mark>';
}
// 获取刚刚添加数据的自增长 id
echo 'id='. $mysqli-> insert_id;


// 6 显示数据
$arr = array();
while($row = $res-> fetch_assoc() ) {
  $arr[] = $row;
}
echo '<pre>';
var_dump($arr);


// 7 关闭资源，释放结果集，如果你不释放，系统也会自动释放
$res-> free();

// 8 关闭 mysql链接
$mysqli-> close();

 */








