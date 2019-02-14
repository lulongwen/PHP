<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/30
   * Time: 13:57
   * description: mysqli 预处理
   * 案例：
   *  用预处理方式向数据库添加3个用户
   *
   */

  // 使用 mysqli 完成 dml
  $mysqli = new Mysqli('localhost', 'root', 'root', 'db2', '3306');

  // 1判断是否链接成功
  if( $mysqli->connect_errno )
    die('链接错误，错误是： '. $mysqli->connect_error );
  // 设置字符集
  $mysqli->set_charset('utf8');


  /** mysqli 预处理
   *
   */
  $sql = "INSERT INTO `job` VALUES(?, ?, ?)";

  // 2 一个 prepared语句
  $pre_sql = $mysqli->prepare($sql);

  // 3 给 $pre_sql 绑定参数
  $id = null;
  $name = '元宏';
  $title = '拓跋宏';


  /** bind->param()
   *  - iss 表示 i，int 整数；s，string； s，string 字符串； d， double 小数
   *  - $id, $name, $title, 传入的值，建议和 数据库的字段一致
   */
  $pre_sql->bind_param('iss', $id, $name, $title );
  if( !$pre_sql->execute() )
    die('<br> 执行失败 '. $mysqli->error);

  echo '<h2>执行成功</h2>';

  // 添加一个用户
  $id= null;
  $name= '元琪';
  $title = '汉化后改姓为元';

  $pre_sql->bind_param('iss', $id, $name, $title);
  if(!$pre_sql->execute() )
    die('<br> 执行失败，错误是：'. $mysqli->error);

  echo '<h2>执行成功</h2>';


  // 释放资源，关闭链接
  $pre_sql->close();
  $mysqli->close();


















