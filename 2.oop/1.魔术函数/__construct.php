<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/10
   * description: __construct 构造函数
   *
   * 构造函数就是完成对成员属性的初始化，而不是创建对象本身
   * 没有返回值，不要有 return，有return也没有作用
   * 一个类中，构造函数有且只能有一个，如果定义多个就会报错
   *    PHP4 & PHP5 中构造函数可以和类名相同，不推荐使用类名定义构造函数
   *
   * 如果没有给类定义构造方法，该类会使用系统默认的构造函数，如果定义了构造函数，默认的构造函数会被覆盖
   * 构造函数的默认修饰符是 public
   */
  
  // 定义一个类
  class Person{
    public $name;
    public $age;
    
    public function __construct($name, $age){
      // null， 函数内的 $name & $age 没有定义，如何优化
      // echo '<br> '. $name .' '. $age;
      
      $this->name = $name;
      $this->age = $age;
      
      // this 的值是
      echo '<pre> 构造函数内的 this';
      var_dump($this);
    }
    

  }
  
  // new 实例化一个对象
  $person = new Person('葫芦娃', 600);
  
  echo '<hr> 实例化对象后 系统自动调用构造函数';
  var_dump($person);
  
  
  /**
   * class 是一个关键字，不能修改，首字母要大写
   *  - 类名不区分大小写
   * 访问修饰符可以是 public & protected & private, 默认 public
   *
   * 构造函数用的时候要注意的细节：
   *  没有返回值，不要有 return，有return也没有作用
   *  一个类中，构造函数有且只能有一个，如果定义多个就会报错
   * __construct 是关键字，不能修改， __ 是2个下划线
   * 如果没有定义构造函数，那么就会有一个默认构造函数
   *
   * PHP4 & PHP5中，可以使用类名作为构造函数，不推荐，因为类名改变后还要去修改
   * 所以，直接使用 __construct 来定义构造函数
   */
  
  
?>














