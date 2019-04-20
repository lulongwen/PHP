<?php
  /**
   * DML Data Manipulation Language 数据操纵语言，DML语句有：
   *  插入新数据 insert into `user`
   *  修改已有数据 update `user` set
   *  删除不需要的数据 delete from `user` where id = 3;
   *
   *  增，删，改 返回 true & false
   *
   *  select 是 dql语句
   */
  header('content-type:text/html;charset=utf-8');
  echo '<h2>dml语句 增，删，改，返回 true & false</h2>';
  echo '<h2>dql(select)语句，返回 查询结果集，对象</h2>';

  $mysqli = new Mysqli('localhost', 'root', '', 'db2', 3306);

  // 2 链接成功返回 0，否则返回对应的错误号，connect_errno 属性表示链接失败的错误信息
  if ($mysqli->connect_errno) {
    die('连接错误，错误信息是Mysql返回的是：' . $mysqli->connect_error);
  }
  $mysqli->set_charset('utf8'); // 3 设置字符集


  // 4 拼接 sql语句
  $sql = 'SELECT * FROM `employee`';

  // insert into
  $sql = "INSERT INTO `employee` VALUES(221, '吕后', '女', '128-02-22', '皇后', '9000', '一个年代久远的女人')";

  // update
  $sql = "UPDATE `employee` SET name='云云' WHERE id=32";

  // delete from
  $sql = "DELETE FROM `employee` WHERE id=86";


  // 4.1 执行的是一个 dml语句，成功返回 true，失败返回 false
  if (!$mysqli->query($sql)) {
    echo '<br>执行失败, SQL语句是<mark>'. $sql .'</mark>';
    die('<br>失败的原因是：'. $mysqli->error);
  }
  else if ($mysqli->affected_rows > 0) {
    echo '<br>执行成功,真正影响到了数据库的表';

    // 获取刚刚添加数据的那个自增长的id的值，适用于 insert into 语句
    echo '<br> id=' . $mysqli->insert_id;
  } else {
    echo '<br><mark>操作对数据表没有任何影响</mark>';
  }


  /*// 5 执行 sql语句, $res 是  mysqli_result 的对象
  $res = $mysqli->query($sql);

  // 6 显示数据，使用 $res 来循环取出数据，推荐使用 fetch_assoc()
  $arr = array();
  while($row = $res->fetch_assoc()){
      $arr[] = $row;
  }
  echo '<pre>';
  var_dump($arr);

  // 7 关闭相关资源，释放结果集，如果你不释放，系统也会自动释放
  $res->free();

  // 8 关闭链接
  $mysqli->close();*/


?>

