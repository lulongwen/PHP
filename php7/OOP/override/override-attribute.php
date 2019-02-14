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
    protected $age = 100;
    private $address = '裴定';
  }
  
  class Child extends Person{
    // 属性的重写
    public $name = '姬禾司';
    protected $age = 160;
    private $address = '大同';
   
  }
  
  $p1 = new Child();
  
  echo '<pre>';
  var_dump($p1);