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
   *
   * 属性 & 方法的重写
   *
   */

  class Animal{
    protected function say(){
      echo '<br>动物在说话';
    }
  }

  // 重写父类的方法
  class Cat extends Animal{
    public function say(){
      echo '<mark>猫猫叫</mark>';

      parent::say();
    }
  }

  $cat = new Cat();
  $cat->say();










  class Person{
    public $num = 100;
    protected $num2 =200;
    protected $num3 = 300;

    public function say(){
      echo '<h3> num = </h3>'. $this->num;
    }

    protected function say2(){
      echo '<br> num2 = '. $this->num2;
    }

    protected function say3(){
      echo '<pre>';
      var_dump($this);
      echo '<br> num3 = '. $this->num3;
    }
  }

  class Child extends Person{
    public $num= '壹';
    protected $num2 = '贰';
    public $num3 = '叁';

    public function say(){
      echo '<br> num ='. $this->num;
      parent::say();
    }

    public function say2(){
      echo '<br> num2 = '. $this->num2;
      parent::say2();
    }

    public function say3(){
      echo '<pre>';
      var_dump($this);
      echo '<br> num3 = '. $this->num3;
      parent::say3();
    }
  }


  $child = new Child();

  echo '<pre>';
  // var_dump($child);

  // $child->say(); // 覆盖了父类的属性和方法
  // $child->say2(); // 覆盖了父类的属性和方法
  // $child->say3(); // 覆盖了父类的属性和方法

