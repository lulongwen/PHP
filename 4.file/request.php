<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2019-04-20
   * Time: 12:58
   * description:
   *
   * $_REQUEST $_GET & $_POST & $_COOKIE
   *
   *
   * 全局数组，所有变量都能拿到
   * $_GLOBALS
   */

  header('content-type:text/html; charset=utf-8');

  echo '$POST <pre>';
  var_dump($_POST);

  echo '<br><br>';



  $address = '珑文';
  /**
   * $_REQUEST 包含
   *  $_GET & $_POST & $_COOKIE
   */
  echo '$_REQUEST <pre>';
  var_dump($_REQUEST);

  echo '<br><br>';



  echo '$GLOBALS <pre>';
  var_dump($GLOBALS);
