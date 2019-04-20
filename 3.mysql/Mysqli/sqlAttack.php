<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/30
   * Time: 13:57
   * description: mysqli 防止 SQL注入的方法
   *  1. 使用 PDO
   *  2. 预处理方法
   *  3. 使用好的工具类库，工具类有自身过滤 sql语句的功能
   *    框架
   *    函数：addslashes, mysqli real escape string()
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
  $sql = "SELECT id, name, salary FROM `employee` WHERE id = ? AND sex =?";

  // 2 一个 prepared语句
  $pre_sql = $mysqli->prepare($sql);

  // 3 给 $pre_sql 绑定参数 ?
  $id = 27;
  // $sex = "男";
  $sex = "'abc' or 1='1'";

  /** bind->param()
   *  - iss 表示 i，int 整数；s，string； s，string 字符串； d， double 小数
   *  - $id, $name, $title, 传入的值，建议和 数据库的字段一致
   */
  $pre_sql->bind_param('is', $id, $sex);

  // 绑定结果，因为 bind_result 是引用传递，因此变量名和后面取的时候一样就可以了
  $pre_sql->bind_result($isId, $isName, $isSalary);


  if( !$pre_sql->execute() )
    die('<br> 预处理查询失败 '. $mysqli->error);
  echo '<h2>查询成功，查询结果：</h2>';


  if( $pre_sql->fetch() ){
    echo '<br> '. $isId .' -- '. $isName .' -- '. $isSalary;
  }else echo '已禁止非法查询';

  // 依次释放资源，关闭链接
  $pre_sql->free_result();
  $pre_sql->close();
  $mysqli->close();


















