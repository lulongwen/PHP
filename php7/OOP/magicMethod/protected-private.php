<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017年11月13日18:12:07
   *
   * description: 访问修饰符 public & protected & private
   * 访问各个属性
   * 1. 访问修饰符是 public，可以直接访问
   *
   * 2. 访问修饰符是 protected，不可以直接访问，
   *  自定义一个 public 成员方法，来操作 protected属性
   *
   * 3. 访问修饰符是 private， 不可以直接访问，
   *  自定义一个 public 成员方法，来操作 private属性
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
    
    
    // 访问 protected 属性
    public function getAge(){
      return $this->age;
    }
    
    // 访问 private 属性
    public function getLover(){
      return $this->lover;
    }
  }
  
  
  // 实例化一个对象
  $p1 = new Person('小明', 300, '小花');
  
  /** 访问各个属性
   * 1. 访问修饰符是 public，可以直接访问
   *
   * 2. 访问修饰符是 protected，不可以直接访问，自定义一个 public 成员方法，来操作 protected属性
   *
   * 3. 访问修饰符是 private， 不可以直接访问，自定义一个 public 成员方法，来操作 private属性
   */
  echo '<br>名字是： '. $p1->name;
  
  
  // echo '年龄是： '. $p1->age;
  echo '<br>年龄是： '. $p1->getAge();
  
  
  // echo '情人是： '. $p1->lover;
  echo '<br>情人是： '. $p1->getLover();
  
  
?>
  
