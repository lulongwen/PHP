<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/30
   * Time: 13:57
   * description: mysqli  批量添加，提高效率
   *
   */

  // 使用 mysqli 完成 dml
  $mysqli = new Mysqli('localhost', 'root', 'root', 'db2', '3306');

  // 1判断是否链接成功
  if( $mysqli->connect_errno )
    die('链接错误，错误是： '. $mysqli->connect_error );
  // 设置字符集
  $mysqli->set_charset('utf8');


  /** 2 批量执行 sql语句
   * dml语句和 dql语句分开，不要混在一起批量操作，因为： dql语句返回资源集，dml语句返回 boolean
   *
   *  .=
   *  每行 sql要加 ;
   *  最后结束的 不用加 ;
   */
  $sqls = "UPDATE `employee` SET salary= salary-100 WHERE id=27;";
  $sqls .= "UPDATE `employee` SET salary = salary+1000 WHERE id = 7;";
  $sqls .= "DELETE FROM `employee` WHERE id=36;";
  $sqls .= "INSERT INTO `employee` VALUES('105', '孝宽', '男', '566-03-02', '平契丹', '912340', '韦孝宽一人平契丹')";

  // 3 执行 SQL
  if( !$mysqli->multi_query($sqls) )
    die('<mark>添加失败，原因是： </mark>'. $mysqli->error );

  echo '添加成功';


















