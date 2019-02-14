<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/22
   * Time: 11:10
   * description: interface 接口和类的区别
   * 接口是类的补充
   *
   * 接口和类的相同点：
   *  1. 都可以继承，类可以继承类，接口可以继承接口
   *  2. 继承的关键字 都是 extends
   *
   * 接口和类的区别：
   *  使用接口的关键字是 implements
   *  接口中不能有方法体，就是那个花括号 {}
   *
   *  继承一个类，不需要去实现这些方法， 可以直接用
   *  实现接口，必须要重新去写这个方法，重新去实现一把
   *    - 继承的类，子类可以使用它的 public & protected 属性和方法
   *    - 实现的接口，类需要自己去编写和实现方法
   *
   * 一个接口不能继承其它的类，但是可以继承其它接口
   *
   *  1. 类只能继承一个父类，单继承，接口可以多继承
   *  2. 接口没有构造函数，抽象类可以有构造函数
   *  3. 接口中的方法都是 public类型，抽象类中的方法有 public & protected & private
   */


  // 把继承和接口实现
  class Monkey {
    public $name;

    public function __construct($name){
      $this->name = $name;
    }

    public function climb(){
      echo '<hr>'. $this->name .'<mark>可以爬树</mark>';
    }
  }

  interface iFly {
    public function flying();
  }
  interface iSwim {
    public function swing();
  }

  // 一个类可以实现多个接口，逗号隔开，
  //当一个类实现了多个接口后，则需要将所有的接口的方法都实现，否则报错（该类必须将所有的抽象方法都实现）
  class KidsMonkey extends Monkey implements iFly, iSwim{
    public function flying(){
      echo '<p>小猴子学会了飞翔</p>';
    }

    public function swing(){
      echo '<p>小猴子学会了游泳</p>';
    }
  }


  $kids = new KidsMonkey('石猴');
  $kids->climb();
  $kids->flying();
  $kids->swing();

  // extends
  class BigMonkey extends KidsMonkey{ }
  $big = new BigMonkey('空空');
  $big->climb();
  $big->flying();
  $big->swing();




