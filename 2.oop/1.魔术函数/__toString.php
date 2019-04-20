<?php
  header('content-type:text/html;charset=utf-8');
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017年11月13日18:12:33
   *
   * description: __toString()
   *
   * 魔术方法，名字是固定的，由系统提供
   * __toString() 没有参数，必须返回一个字符串
   *
   * 项目开发，需要 debug，可以通过 __toString() 输出对象信息
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
    
    
    // 访问 protected & private，echo 输出对象，触发 __toString()
    public function __toString(){
      return '名字是：'. $this->name .'；年龄是：'. $this->age .'； 爱好是: '. $this -> lover;
    }
    
  }
  
  
  // 实例化一个对象
  $p1 = new Person('小明', 300, '花花');
  
  
  /** 将一个对象直接输出，就会触发魔术函数 __toString()
   * 如果没有写 ，就报错
   */
  echo '<br>输出对象： '. $p1;
  
?>
  
