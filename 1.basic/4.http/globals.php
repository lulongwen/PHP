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

  $address = '殷商封国曰宋';

  echo '<h2>$_POST</h2><pre>';
  var_dump( $_POST );


  echo '</pre><h2>$_REQURST 包括 $_GET & $_POST & $_COOKIE</h2><pre>';
  var_dump( $_REQUEST );


  echo '</pre><h2>$GLOBALS 全局变量</h2><pre>';
  var_dump( $GLOBALS );