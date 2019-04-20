<?php
  header('content-type:text/html;charset=utf-8');
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017年11月13日18:12:33
   *
   * description: static 静态属性
   */
  
  class Person{
    public $name;
    
    // static $total 静态属性，公有的
    public static $total = 0;
    
    public static $home = '长安';
    
    public function __construct($name){
      $this->name = $name;
      
      // 类中，访问 静态变量的方式是 self:: 静态变量名
      self::$total++;
    }
    
    public function joinGame(){
      echo '<br>'. $this->name .'加入游戏';
    }
    
    public function showTotal(){
      echo '<hr> 现在有'. self::$total .'个小朋友在玩游戏';
    }
    
    
    // 内部访问静态变量
    public function showHome(){
      echo '<br> 地址： '. self::$home; // 推荐使用 self::
      echo '<br> 地址： '. Person::$home;
    }
  }
  
  
  $p1 = new Person('小明'); // 实例化一个对象
  $p1->joinGame();
  $p1->showTotal();
  
  
  $p2 = new Person('花花');
  $p2->joinGame();
  $p2->showTotal();
  
  $p3 = new Person('了了');
  $p3->joinGame();
  $p3->showTotal();
  
  
  $p4 = new Person('大米');
  $p4->joinGame();
  $p4->showTotal();
  
  $p3->showHome();
  
  // 外部访问静态属性，必须是 public 才能访问
  echo '<br><mark>住的地方是： '. Person::$home .'</mark>';
  
  
  echo '<hr>*********************************<br>';
  class Cat{
    public static $num = '3只小猫';
    
    public function __construct(){
      echo 'Big Cat';
    }
  }
  
  /** 使用静态属性，直接用 类名::静态属性;
   * 不用实例化也可以使用静态属性
   * 静态属性可以赋值
   */
  echo Cat::$num ;
  echo Cat::$num = 6000;
