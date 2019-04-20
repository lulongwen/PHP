<?php
  header('content-type:text/html;charset=utf8');

  include_once 'DAOPDO.class.php';

  $options =array(
    'host' => 'localhost',
    'user' => 'root',
    'password' => 'root',
    'dbname' => 'db2',
    'port' => 3306,
    'charset' => 'utf8'
  );

  $link = DAOPDO::getSingleton($options);

  // fetchOne();
  $sql = "SELECT count(*) AS total FROM `employee`";
  $total = $link->fetchOne($sql);


  // fetchAll();
  $sql2 = "SELECT * FROM `employee`";
  $total2 = $link->fetchAll($sql2);

  // fetchColumn();
  $sql3 = "SELECT * FROM `employee` WHERE id='27'";
  $total3 = $link->fetchAll($sql3);

  // exec() 受影响的表
  $exec = $link->exec($sql3);
  var_dump($exec);


  // lastInserId
 $lastId = $link->lastInsertId();


  // quote() 转义
  $val = "hello '1 or 1' world";
  $quote_val = $link-> quote($val);


  var_dump($total3);
?>