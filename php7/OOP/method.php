<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/10
   * description: 成员属性 成员方法
   */
  
  // 定义一个类
  class Person{
    public $name;
    public $age;
    
    public function say(){
      echo '<mark>Hello World</mark>';
    }
    
    public function result($no){
      return $no *3;
    }
    
    public function getMax($no1, $no2, $no3){
      return max($no1, $no2, $no3);
    }
  }
  
  // new 实例化一个对象
  $person = new Person;
  
  
  // 给对象赋值
  $person->name = '太白';
  $person->age = '1800';
  
  // 调用对象的成员方法
  $person->say();
  
  
  $result = $person->result(9);
  echo '<br>return 计算结果是：'. $result;
  
  $max = $person->getMax(1, 20, 100);
  echo '<br>最大值是：'. $max;
  
 
  
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














