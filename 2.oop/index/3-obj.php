<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Time: 2017年11月10日11:51:28
   * description: 对象的传递： 值传递 和引用传递 &
   */
  
  // 定义一个类
  class Person{
    public $name;
    public $age;
    public $hobby;
  }
  
  // new 实例化一个对象
  $people1 = new Person;
  
  // 给对象赋值
  $people1->name = '金角大王';
  $people1->age = '700';
  
  
  /** & 值的引用，直接指向同一个对象
   *
   */
  $people2 = &$people1;
  $people2->name = '太上老君';
  
  unset($people2); // unset销毁了 $people2 变量本身, $people1没有影响
    
  echo '<br> $people1.name: '. $people1->name;
  echo '<br> $people2.name: '. $people2;
  
  echo '<pre>';
  var_dump($people1, $people2);
  
  
  
  
?>














