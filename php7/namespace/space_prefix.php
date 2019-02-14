<?php

  // ui 命名空间，后面的代码属于 ui 这个空间
  namespace php;

  require_once 'space3.php';

  // class
  class Person{
    public function __construct(){
      echo 'php __construct<br>';
    }
  }

  /**
   * Person类前面没有任何空间修饰，就属于 非限定名称
   * 这种情况，就会在当前空间找 Person类
   */
  new Person();


  /**
   * 要实例化 space3.php 这个文件里面的 类
   * 在当前空间找 php\php6\Person
   */
  new php6\Person();


  /**
   * 完全限定名称
   */
  require_once 'space2.php';

  echo '<hr>';
  // 当前是 php空间
  new \web\Person2();


  // 完全限定名称
  new \web\Person();


  // 类只在当前空间查找，如果没有就报错
  function var_dump($val){
    echo '<br>'.$val;
  }
  var_dump('DUMP');


?>