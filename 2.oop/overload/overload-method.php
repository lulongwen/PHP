<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/21
   * Time: 14:55
   * description: overload 方法的重载
   *  方法的重载 就是动态的创建属性和方法
   *  简单理解：多个同名函数，传递不同的参数，可以自动调用对应的方法，实现不同的方法
   *
   *  方法重载 通过魔术函数 __call() 实现
   *  静态方法重载 __callStatic()
   *  属性重载  __set() & __get()
   */
  
  
  
  class Person{
    public $name;
    
    public function __construct($name){
      $this->name = $name;
    }
  
    // 重载举例，2个参数求和
    public function getSum($val,$val2){
      return $val + $val2;
    }
  
    // 重载举例，3个参数求最大值
    public function getMax($val,$val2, $val3){
      return max($val, $val2, $val3);
    }
    
    // 静态方法重载，2个参数求和
    private static function getSum2($val,$val2){
      return $val + $val2;
    }
  
    // 静态方法重载，3个参数求最大值
    private static function getMax2($val,$val2, $val3){
      return max($val, $val2, $val3);
    }
    
    
    // __call() 是方法重载的重点
    public function __call($method_name, $args){
      $length = count($args);
      // var_dump($method_name, $args);
      /** 首先判断调用的是不是 getVal
       * $method_name 是 函数名
       * $args 是个数组
       */
      if($method_name !== 'getSum'){
        echo '<mark>调用的方法错误</mark>';
        return;
      }
      if( $length == 2 ){
        return $this->getSum($args[0], $args[1]);
      }else if($length ==3){
        return $this->getMax($args[0], $args[1], $args[2]);
      }
      
    }
    
    
    // __callStatic 实现对静态方法的重载
    public static function __callStatic($method_name, $args){
      $length = count($args);
      if( $method_name !== 'getSum2' ){
        echo '<mark>调用的静态方法错误</mark>';
        return;
      }
      if($length ==2){
        return self::getSum2($args[0], $args[1]);
      }else if($length ==3){
        return self::getMax2($args[0], $args[1], $args[2]);
      }else
        echo '<p>输入的参数不正确</p>';
    }
  }
  
  $p1 = new Person('画画');
  
  // 成员方法的重载
  echo '<br>2个参数求和： '. $p1->getSum(20, 300);
  echo '<br>3个参数求最大值： '.$p1->getSum(20, 300, 68);
  echo '<hr>';
  
  
  // 静态方法的重载
  echo '<br>2个参数求和： '. Person::getSum2(200, 300);
  echo '<br>3个参数求最大值： '. Person::getSum2(20, 300, 999);
  