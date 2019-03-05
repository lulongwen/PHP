<?php
/**
* Created by PhpStorm.
* User: lulongwen
* Date: 2019-02-21
* Time: 23:10
*/
header('content-type: text/html; charset=utf-8');

require 'DAO_Mysqli.php';

$options = array(
  'host' => 'localhost',
  'user' => 'root',
  'pwd' => 'root',
  'dbname' => 'itbull',
  'port' => 3306,
  'charset' => 'utf-8'
);


$dao = DAO_Mysqli::getSingleton($options);


