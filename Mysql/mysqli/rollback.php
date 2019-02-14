<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/30
   * Time: 13:57
   * description: mysqli  affairs mysqli 事务控制
   *
   *  Innodb 数据库引擎的数据库或表才支持事务
   *  事务用来管理
   *  insert，update，delete语句
   */

  // 使用 mysqli 完成 dml
  $mysqli = new Mysqli('localhost', 'root', 'root', 'db2', '3306');

  // 1判断是否链接成功
  if( $mysqli->connect_errno )
    die('链接错误，错误是： '. $mysqli->connect_error );
  // 设置字符集
  $mysqli->set_charset('utf8');

  $sql = "UPDATE `employee` SET salary= salary-100 WHERE id=36";
  $sql2 = "UPDAT `employee` SET salary = salary+2000 WHERE id = 7";

  $sql3 = "DELETE FROM `employee` WHERE id=36";


  /* 开始事务
   * $mysqli->begin_transaction();
   * begin 开始一个事务
   * rollback 事务回滚
   * commit 事务确认
   */
  $mysqli->autocommit(false);

  $res = $mysqli->query($sql);
  $res2 = $mysqli->query($sql2);


  if($res && $res2){
    echo '<br> SQL语句执行成功，正式提交';
    $mysqli->commit();
  }
  else{
    echo '<br> SQL语句执行失败，回滚初始状态';
    $mysqli-> rollback();
  }


  if($mysqli->query($sql3)){
    echo '<br> SQL 执行成功，commit';
    $mysqli->commit();
  }
  else{
    echo '<br>SQL执行失败，rollback';
    $mysqli->rollback();
  }