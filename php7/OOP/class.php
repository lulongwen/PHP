<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/10
   * Time: 9:33
   * description: 类定义的完善
   */
  
  // 定义一个类
  class Person{
    // 成员属性
    public $name;
    public $age;
    public $hobby;
    
    // 构造函数
    public function __construct($name, $age, $hobby){
      $this->name = $name;
      $this->age = $age;
      $this->hobby = $hobby;
    }
    
    // 析构函数
    public function __destruct(){
    
    }
    
    // 成员函数
    public function say(){
    
    }
  }
  
  // new 实例化一个对象
  $person = new Person;
  
  
  // 给对象赋值
  $person->name = '太白';
  $person->age = '1800';
  $person->hobby = array('no1'=>'吃饭', 'no2'=>'睡觉');
  
  // 输出对象
  var_dump($person);
  
  
  // echo 输出对象的属性
  echo '<h1>人的信息如下:</h1>';
  echo '<br>名字是：'. $person->name;
  echo '<br>年龄是：'. $person->age;
  echo '<br>爱好是：'. $person->hobby['no2'];
  
  class Dog{}
  
  $dog = new Dog();
  var_dump($dog);
  
  /**
   * class 是一个关键字，不能修改，首字母要大写
   *  - 类名不区分大小写
   *
   * public 是访问修饰符，用户控制成员属性的访问范围
   *  - 访问修饰符有3个：
   *  - public 公共的
   *  - protected 受保护的
   *  - private 私有的
   *
   * public $name 是一个成员属性，是我们定义的 {} 中定义的变量
   *
   * new 是一个关键字，表示创建一个对象
   * -> 对象运算符 $person->name = '太白'; 给对象赋值
   */
  
  
?>














