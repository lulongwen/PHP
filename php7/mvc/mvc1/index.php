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

  // ? 访问前台 & 后台
  $m = isset($_GET['m']) ? $_GET['m'] : 'home';

  // ？那个控制器
  $c = isset($_GET['c']) ? $_GET['c'] : 'Index';

  $controller_name = $c .'Controller'; // 控制器

  // ？访问控制器的哪个操作
  $a = isset($_GET['a']) ? $_GET['a'] : 'indexAction';

  // 先加载控制器类，然后实例化对象
  $class_file = './application/'.$m.'/controller/'.$controller_name.'.class.php';
  require_once $class_file;

  $controller = new $controller_name;

  // 调用控制器方法
  $controller->$a();