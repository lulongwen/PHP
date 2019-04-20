<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/20 17:36
   * endTime： 2017年11月21日14:22:45
   * description: extends 子类调用父类的方法
   * 1. 在创建某个子类对象时，默认情况下会自动调用其父类的构造函数
   *    前提是： 子类自己没有定义构造函数
   *
   * 2. 如果子类没有构造函数，则子类会继承父类的构造函数
   *    如果子类有构造函数，则子类的构造函数函数就会重写 父类的构造函数，这种现象叫做方法的重写
   */

  class Person{
    public $name;
    
    // 构造函数
    public function __construct($name){
      $this->name = $name;
      echo '<br> Person __construct()';
    }
    
    public function say(){
      echo '<h3> Person sayHello3</h3>';
    }
  }
  
  class Child extends Person{
    public $age;
  
    // 方法的重写
    public function __construct($age, $name){
      $this->age = $age;
      $this->name = $name;
      
      echo '<br> Child 的构造函数 __construct';
  
      /** 调用父类的方法 public & protected
       *  如果调用父类普通的成员方法，使用 $this->方法名();
       */
      
      $this->say(); // 推荐
        // Person::say(); 可以用，但不推荐的写法
        // parent::say();
      
      
      // 调用父类的构造函数，推荐使用 parent::__construct();
      parent::__construct($name);
    }
  }
  
  $p1 = new Person('Lucy');
  $c1 = new Child(18, '花花');
  
  echo '<pre>';
  var_dump($p1, $c1);