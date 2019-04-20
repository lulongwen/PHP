<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/21
   * Time: 16:29
   * description: 方法的重写
   *  子类继承父类的属性和方法，如果子类的方法名称，参数和属性与父类的方法名称，参数和属性相同，就会覆盖父类的方法，这种现象叫做方法的重写
   *
   *
   *  如果子类重写父类的方法，必须保证，子类的方法名字和参数的个数和父类相同，否则报错
   *    如果父类的方法参数使用了类型约束，还必须保证数据类型一致
   *    子类方法不能缩小父类方法的访问权限
   *
   *  parent:: 静态属性 不能访问普通属性，也不能访问父类的静态属性，且访问修饰符是 public & protected
   */
  
  class Person{
    public $name = '磊磊';
    public static $num = 100;
    
    public function say(){
      echo '<br> 都会说你好！';
    }
    
    public function fn(){
      echo '<br> fn()';
    }
  }
  
  class Child extends Person{
    // 方法的重写
    public function say(){
      
      // 希望被重写，可以这么写
      parent::say(); // 推荐
      // Person::say();
      
      // 如果子类没有重写，父类某个public & protected 方法，调用方法
      $this->fn();
      
      echo '<br> 不想说你好';
    }
    
    public function sayHello(){
      echo '<br> 静态属性值： $num = '. parent::$num;
      echo 'name = '. $this->name;
    }
  }
  
  $p1 = new Child();
  
  echo '<hr>';
  $p1->say();
  
  echo '<hr>';
  $p1->sayHello();