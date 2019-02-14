<?php
  header('content-type:text/html;charset=utf-8');
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017年11月13日18:12:33
   *
   * description: static 静态方法
   *
   * public static function sum(){  }
   *
   * 静态方法是专门用来操作静态属性的
   * 静态方法可以直接通过类名调用
   */
  
  class Person{
    public $name;
    
    public static $num = 10;
  
    // static $total 静态属性，公有的
    public static $total = 200;
  
    public function __construct($name) {
      $this->name = $name;
    }
  
    // 静态方法，受到访问修饰符的限制，protected & private
    public static function getTotal(){
      // 类中，访问 静态变量的方式是 self:: 静态变量名
      self::$total++;
      
      echo '<br> 苹果一共有'. self::$total;
      
      // 静态方法内，不能访问非静态属性，即不能静态方法只能访问 静态属性
      // echo '<br> name是: '. self::name; // 错误的写法，报错
      // echo '<br> name是: '. $this->name; // 错误的写法，报错
    }
    
    
    // 内部调用静态方法
    public function show(){
      // 推荐
      self::getTotal();
      
      
      // 类名调用，缺点，如果类名改变，还要改类名
      Person::getTotal();
      
      // $this 调用，体现不出静态的特点
      $this->getTotal();
  
      // 普通成员方法可以访问 静态属性和普通属性，也可以访问静态方法
      echo '<br><br> name非静态属性 ' . $this->name;
      echo '<br> total静态属性： '. self::$total;
    }
  }
  
  

  
  
  /** 使用静态属性，直接用 类名::静态属性;
   * 不用实例化也可以使用静态属性
   * 静态属性可以赋值
   */
  echo Person::$num .'<br>';
  echo Person::$num = 6000;
  
  
  // 通过类名在外部调用 静态方法，推荐的用法
  Person::getTotal();
  
  $p1 =new Person('画画');
  $p1->show();
  
  // 其他方法，实例化后使用，不推荐
  $cat = new Person('花花');
  $cat->getTotal();
  $cat::getTotal();
