<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/28
   * Time: 11:16
   * description: 接收提交的数据
   *
   * $_GET
   * $_POST
   * $_SERVER
   */

  header('content-type:text/html;charset=utf-8');

  echo '<h2>$_GET</h2><pre>';
  var_dump( $_GET );

  $user = isset( $_GET['username'] ) ? $_GET['username'] : '没有设置这个属性';
  echo $user;


  echo '</pre><h2>$_POST</h2><pre>';
  var_dump( $_POST );


  echo '</pre><h2>$_SERVER HTTP 信息</h2><pre>';
  var_dump( $_SERVER );