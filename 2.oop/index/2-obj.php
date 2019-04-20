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
  $people1->hobby = array('no1'=>'吃饭', 'no2'=>'睡觉');
  
  
  /** 值拷贝，拷贝的是对象标识符，不是对数据本身拷贝
   * 一个改变了，会导致另外一个也改变，一下重点理解：
   *
   * 1 所有的代码必须加载到内存（内存中的代码区）才能执行
   * 2 当我们把一个对象赋给另外一个变量时，也是值拷贝，但拷贝的不是数据本身，而是对象标识符的拷贝
   */
  $people2 = $people1;
  
  
  $people2->name = '太上老君';
  
  
  $people2 = 'abc'; // 报错，字符串没有属性，只有对象才能用 对象运算符 ->；
  
    
  echo '<br> $people1.name: '. $people1->name;
  echo '<br> $people2.name: '. $people2->name;
  
  echo '<pre>';
  var_dump($people2, $people1);
  
  
  
  
?>














