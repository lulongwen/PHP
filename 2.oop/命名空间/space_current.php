<?php

  // ui 命名空间，后面的代码属于 ui 这个空间
  namespace design\ui;

  // class
  class Person{
    public function __construct(){
      echo 'design\ui __construct';
    }
  }

  /**
   * Person类前面没有任何空间修饰，就属于 非限定名称
   * 这种情况，就会在当前空间找 Person类
   */
  new Person();



?>