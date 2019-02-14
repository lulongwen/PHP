<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/30
   * Time: 13:57
   * description: mysqli 预处理
   * 案例：
   *  使用预处理完成查询任务
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
  $sql = "SELECT id, name, salary FROM `employee` WHERE id = ?";

  // 2 一个 prepared语句
  $pre_sql = $mysqli->prepare($sql);

  // 3 给 $pre_sql 绑定参数 ?
  $id = 20;

  /** bind->param()
   *  - iss 表示 i，int 整数；s，string； s，string 字符串； d， double 小数
   *  - $id, $name, $title, 传入的值，建议和 数据库的字段一致
   */
  $pre_sql->bind_param('i', $id);

  $pre_sql->bind_result($isId, $isName, $isSalary);


  if( !$pre_sql->execute() )
    die('<br> 预处理查询失败 '. $mysqli->error);

  echo '<h2>查询成功，查询结果：</h2>';
  while( $pre_sql->fetch() )
    echo $isId .' -- '. $isName .' -- '. $isSalary;



  // 依次释放资源，关闭链接
  $pre_sql->free_result();
  $pre_sql->close();
  $mysqli->close();


















