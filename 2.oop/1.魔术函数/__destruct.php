<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/10
   * description: __destruct 析构函数
   *
   * 某个对象的所有引用都被删除时，或 当对象显式销毁时，会调用 析构函数
   * PHP5 引入的 析构函数
   * 某个对象的所有引用都被删除
   *  1. 使用 unset($obj) 将对象名销毁
   *  2. $obj =null
   *  3. $obj = 'abc';
   *
   * 析构函数最重要的作用就是 释放对象创建的资源，比如
   *  1. 数据库链接
   *  2. 文件句柄
   *  3. 绘图句柄
   *
   * 显式销毁
   *  上面的3种方法都是显式销毁，显式销毁就是程序员主动删除对象的引用
   *  如果我们不去显式销毁对象，那么程序执行完毕后，这个对象就会被系统自动销毁，这个就是系统销毁
   *
   *
   * 析构函数使用时要注意的：
   *  1. 析构函数都是 publi
   *  2. __destruct 是关键字，不要修改
   *  3. 析构函数没有参数，不要穿参数
   *  4. 析构函数是系统调用，在以下情况下会被系统调用
   *    4.1 php文件执行完毕
   *    4.2 某个对象的所有引用都被删除之后，马上就会调用析构函数
   */
  
  // 定义一个类
  class Person{
    public $name;
    public $age;
    
    // 构造函数
    public function __construct($name, $age){
      $this->name = $name;
      $this->age = $age;
    }
    
    // 析构函数
    public function __destruct(){
      echo '<br> 析构函数 __destruct 被调用: '. $this->name;
    }
    

  }
  
  // 栈，先进后出
  $person = new Person('葫芦娃', 600);
  
  $p1 = $person;
  // $person = 'ac'; // 销毁的会先调用 析构函数
  $p1 = null; // $p1 =null，并没有影响到 $person
  
  
  $person2 = new Person('小娃娃', 500);
  unset($person2);
  
  $person3 = new Person('金刚怪', 100);
  
  echo '<hr>';
  
 
?>














