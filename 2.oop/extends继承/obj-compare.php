<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/21
   * Time: 9:42
   * description: 对象的比较
   *
   * 比较运算符 ==  & === 比较2个对象变量时的原则：
   * 1.== 相等
   *  如果2个对象的属性和属性值都相等，而且2个对象都是同一个类的实例，那么这2个对象变量相等
   *
   * 2. === 全等
   *  这哥对象变量一定要指向某一个类的同一个实例（即同一个对象）
   */
  
  class Person{
    public $name;
    public function __construct($name){
      $this->name = $name;
    }
  }
  
  class Lead{
    public $name;
    public function __construct($name){
      $this->name = $name;
    }
  }
  
  $p1 = new Person('Lucy');
  $p2 = new Person('Lucy');
  $p3 = &$p1;
  
  $lead = new Lead('Lucy');
  
  if($p1 == $p2)
    echo '<br> $p1 == $p2';
  
  
  echo '<hr>';
  if($p1 == $lead)
    echo '<br> $p1 == $lead';
  else
    echo '<br> $p1 != $lead';
  
  
  echo '<hr>';
  if($p1 === $p2)
    echo '<br> $p1 === $p2';
  else
    echo '<br> $p1 !== $p2';
  
  
  echo '<hr>';
  // 这两个对象变量一定要指向某个类的同一个实例（即同一个对象）
  if($p1 === $p3)
    echo '<br> $p1 === $p3';
  else
    echo '<br> $p1 !== $p3';
  
  
  echo '<hr><pre>';
  var_dump($p1, $p2, $p3, $lead);