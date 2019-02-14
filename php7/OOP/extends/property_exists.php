<?php
  header('content-type:text/html;charset=utf-8');
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017年11月13日18:12:33
   *
   * description: property_exists() 判断属性是否存在
   *
   */
  
  class Person{
    public $name;
    protected $age;
    private $lover;
    
    // 构造函数
    public function __construct($name, $age, $lover){
      $this->name = $name;
      $this->age = $age;
      $this->lover = $lover;
    }
  }
  
  
  // 实例化一个对象
  $p1 = new Person('小明', 300, '花花');
  
  
  /** property_exists(对象名, 属性)
   * 1. 先判断 该对象是否有这个属性，如果有 返回真
   * 2. 如果该对象没有这个属性，就会再继续判断该对象对应的类是否定义过这个属性，
   *  + 如果对应的类定义过这个属性，仍然返回 true
   *  + 否则，才返回 false
   */
  unset($p1->name);
  echo '<pre>';
  var_dump($p1);
  
  // 虽然 unset() 了name属性，但是 Person类定义了 name属性，所以仍然返回 true
  if(property_exists($p1, 'name') ){
    echo '<br> name属性存在';
  }
  
  $p1->number  = 200;
  echo '<pre> -----------------';
  var_dump($p1);
  
  if(property_exists($p1, 'number') ){
    echo '<br> number 属性存在';
  }else{
    echo '<br> number不属性存在';
  }
  
  
  unset($p1->number);
  echo '<pre> -----------------';
  var_dump($p1);
  
  // 因为 unset() 了 number属性，就会去 Person类中去查找 number 属性，结果没找到，所以就返回 false
  if(property_exists($p1, 'number') ){
    echo '<br> number 属性存在';
  }else{
    echo '<br> number不属性存在';
  }
?>
  
