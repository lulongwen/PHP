<?php
header('content-type:text/html;charset=utf-8');
/**
 *  使用 mysqli扩展对 mysql数据库进行 crud操作
 *  @首先要打开 mysqli的扩展：
 *    在php.ini文件中去掉前面的分号 ;extension=php_mysqli.dll
 *
 * @功能：
 *  得到一个连接到mysql数据库的链接，代表PHP和 Mysql数据库之间的一个连接
 *
 * @参数：
 *  host: string 主机 localhost
 *  username: string 用户名 root
 *  passwd: string 密码 root
 *  dbname: string  数据库名字 message
 *  port: int 3306 数据库端口 3306
 *  socket: 一般不用
 */

// 1 实例化一个 Mysqli对象
$mysqli = new Mysqli(
  'localhost',
  'root',
  'root',
  'message', // 数据库名字
  3306
);


// 2 判断链接是否成功，成功返回 0，否则返回对应的错误号，如果不是0，说明链接错误
// connect_errno 属性表示链接失败的错误信息
if ($mysqli->connect_errno) {
  die('链接错误，Mysql返回的错误：' . $mysqli->connect_error);
}
echo '<h3>链接成功!</h3>';


// 3 设置字符集
$mysqli->set_charset('utf8');

// 4 拼接 sql语句, select 语句属于 dql语句，返回集 对象
$sql = 'SELECT * FROM `employee`';

// 5 执行 sql语句, $res 是  mysqli_result 的对象
$res = $mysqli->query($sql);

// 6 显示数据，使用 $res 来循环取出数据，推荐使用 fetch_assoc()
$arr = array();
while ($row = $res->fetch_assoc()) {
  $arr[] = $row;
}
echo '<pre>';
var_dump($arr);


// 7 关闭相关资源，释放结果集，如果你不释放，系统也会自动释放
$res->free();
// 8 关闭链接
$mysqli->close();

?>

<script>
// php 数组转 JS格式的JSON
var array = <?php echo json_encode($arr);?>;
console.log(array)
</script>
