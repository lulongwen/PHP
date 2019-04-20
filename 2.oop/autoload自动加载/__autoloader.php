<?php
  header('content-type:text/html;charset=utf-8');
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017年11月13日18:12:33
   *
   * description: autoload() 类的自动加载
   *  当我们使用一个未定义的类名时，就会自动的触发 __auoload() 这个系统函数
   *
   * spl_autoload_register();
   *  - spl 标准的PHP标准库 Standard PHP Library
   *  - 可以重复执行多次
   */
  
  // echo dirname(__FILE__);
  
  // 1 引入一个全局类
  require 'config.php';
  
  /** spl_autoload_register() 可以灵活的注册 自动加载函数
   *  spl_autoload_register('myAutoLoad');
   *
   * function myAutoLoad($class_name){
        global $class_map;
        require $class_map[$class_name];
     }
   */
  

  function __autoload($class_name){
    echo '<br>'. $class_name;
  
    /** require './'. $class_name .'.class.php'; // 拼接 require
     * 缺点： 要拼接路径，灵活性不够
     */
    
    global $class_map;
    require $class_map[$class_name];
  }
  
  $cat = new Cat;
  $cat->sound();
  
  $tigger = new Tigger;
  $tigger->sound();
  
  
  $pig = new Pig;
  $pig->sound();
