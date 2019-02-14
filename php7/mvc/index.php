<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/12/9
   * Time: 10:11
   * description: 入口文件
   *  - 用来接收用户请求时 url地址栏带的参数
   *  本地访问
   *  localhost/php/mvc/index.php?m=admin&c=category&a=indexAction
   */

  require_once './framework/core/Framework.class.php';
  // use framework\core\Framework;

  new \framework\core\Framework();