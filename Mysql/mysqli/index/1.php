<?php

  /** 使用 DAOMysqli
   *
   */
  require_once '../DAOMysqli.class.php';

  $options_arr = array(
    'host' => 'localhost',
    'user' => 'root',
    'password' => 'root',
    'dbname' => 'db2',
    'port' => 3306,
    'charset' => 'utf8'
  );

  $link = DAOMysqli::getSingleton($options_arr);

  // dql
  $sql = "SELECT * FROM `employee`";
  $arr_list = $link->fetchAll($sql);

  echo '<pre>';
  var_dump($arr_list);
  echo '</pre>';


  // dml
  $sql = "INSERT INTO `employee` VALUES(27, '景升', '男', '108-10-06', '荆州', '180000', '景升有荆襄九郡')";

  $link->query($sql);

