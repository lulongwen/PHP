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

  $sqls = "SELECT * FROM `employee`;";
  $sqls .= "SELECT * FROM `job`;";
  $sqls .= "SELECT * FROM `address`";

  // 如果有错，直接退出
  if( !$mysqli->multi_query($sqls) )
    die('<br> <mark>执行失败，错误是：</mark> '. $mysqli->error );

  /*
   * do{

    }while();
   */

  do{
    $res = $mysqli->store_result();

    while( $row = $res->fetch_assoc()){
      foreach($row as $val){
        echo ' -- '. $val;
      };
      echo '<p></p>';
    }

    // 释放结果
    $res->free();

    // 判断还有没有下一个结果集，该函数只是判断有没有更多的结果，返回 boolean
    if( !$mysqli->more_results() ) break;

    // next_result() 是否还有下一个值
  }while( $mysqli->next_result() );


















