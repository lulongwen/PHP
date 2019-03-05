<?php
/** fetch_* 取回查询结果，推荐使用 fetch_assoc()
 *
 * fetch_assoc()  关联数组
 * fetch_row()    索引数组
 * fetch_array()  关联数组 + 索引数组，服务器压力大
 * fetch_object() 返回对象
 *
 * fetch_all()
 * fetch_field()
 * fetch_field_direct()
 * fetch_fields()
 */

$mysqli = new Mysqli();
if ($mysqli-> connect_errno) {
  die('error'. $mysqli-> connect_error);
}

$mysqli-> set_charset('utf8mb4');

$sql = 'select * from employee';

// 结果集
$res = $mysqli-> query($sql);


$arr = array();
while($row = $res-> fetch_assoc()) {
  $arr[] = $row;
}
/** fetch_row() 返回索引数组
 * select语句改变，会导致数组改变，不推荐使用
 * data_seek 将结果指向设置为0，相当于放到结果集最前面,否则 $res早已循环结束，没有值
 */
$res-> data_seek(0);
while($row = $res-> fetch_row()) {
  $arr[] = $row;
}


/** fetch_array() 返回索引数组+ 关联数组
 * 不推荐使用，资源请求太多，服务器压力大
 * data_seek 将结果指向设置为0，相当于放到结果集最前面
 */
$res-> data_seek(0);
while($row = $res-> fetch_array()) {
  $arr[] = $row;
}


/** fetch_object() 返回对象
 *
 * data_seek 将结果指向设置为0，相当于放到结果集最前面
 */
$res-> data_seek(0);
while($row = $res-> fetch_object()) {
  $arr[] = $row;
}















