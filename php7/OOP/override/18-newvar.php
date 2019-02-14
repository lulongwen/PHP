<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/21
   * Time: 16:29
   * description: 变量名也可以实例化
   */
  
  class Person{
    public $name = 'abc';
    protected $age = 100;
    
    public function say(){
      echo '<br> 都会说你好！';
    }
  }
  
  $p1 = new Person;
  
  $is_name = 'Person';
  $child = new $is_name();
  
  echo '<pre>';
  var_dump($child);
