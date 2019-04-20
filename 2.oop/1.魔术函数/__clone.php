<?php
  header('content-type:text/html;charset=utf-8');
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017年11月13日18:12:33
   *
   * description: __clone()
   *  将一个对象完全的赋值一份，保证2个对象的属性和属性值一样，但是他们的数据库空间独立
   *  就可以使用对象克隆
   *
   * 阻止 clone ，就将 __clone() 声明为 private 即可
   *  在很多设计模式中，就会使用到这个特点，比如单利模式，就要阻止 clone
   *  对象的 clone ，触发 __clone() 魔术方法
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
    
    
    // 对象的 clone ，触发 __clone() 魔术方法，单例模式 ，用 private 修饰符
    public function __clone(){
      // 在克隆一个对象前，可以在 __clone() 函数内去修改某个属性，比如
      $this->name ='裴定';
      echo '<mark>__clone 被触发</mark>';
    }
    
  }
  
  
  // 实例化一个对象
  $p1 = new Person('小明', 300, '花花');
  
  
  /** 将一个对象直接输出，就会触发魔术函数 __toString()
   * 如果没有写 ，就报错
   */
  $p2 = $p1;
  
  
  /** 对象的比较
   * == 比较2个变量时：原则是： 如果2个对象的属性和属性值都相等，并且2个对象都是同一个类的实例，那么就相等
   *
   * === 比较2个变量时：原则：这2个对象的变量一定要指向某一个类的同一个实例，即同一个对象
   */
  if($p2 == $p1){
    echo '<br> $p2 == $p1';
  }
  
  if($p2 === $p1){
    echo '<br> $p2 === $p1';
  }
  echo '<pre> --------------------';
  var_dump($p2, $p1);
  
  
  // 对象的 clone ，触发 __clone() 魔术方法
  $p3 = clone $p1;
  
  if($p3 == $p1){
    echo '<br> $p3 == $p1';
  }
  
  // 没有指向同一个对象，所以不是全等
  if($p3 === $p1){
    echo '<br> $p3 === $p1';
  }
  echo '<pre> --------------------';
  var_dump($p3, $p1);
  
?>
  
