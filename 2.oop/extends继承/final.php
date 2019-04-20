<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/23
   * Time: 13:59
   * description: final 用于类， 方法前
   *
   * final class 禁止继承类
   *
   * final 方法不可被覆盖
   * final 不能修饰 属性
   *  - final public $name = 'hello'; 错误的
   *
   * final 类可以被实例化
   *
   */

  // final class
  // 如果不希望子类来继承 Person，类名前加 final 即可
  final class Person{
    public $name;

    // final不能修饰属性，否则报错
    // final public $name;

    public function __construct($name){
      $this->name = $name;
    }

    public function skill(){
      echo '杀手锏技能是： 飞翔';
    }
  }

  // class Child extends Person{ } // 报错


  // final 方法禁止覆盖
  class Person2{
    public $name;

    public function __construct($name){
      $this->name = $name;
    }

    // 如果不希望子类重写父类的方法，前面加 final即可
    final public function skill(){
      echo '<br>杀手锏技能是： 飞翔';
    }
  }

  class Child extends Person2{

    // 子类不能重写 final方法，但是可以继承 父类的 final方法
    /*public function skill(){ // 报错
      echo '鱼儿喜欢游泳';
    }*/

    public function skill2(){ // 报错
      echo '<br>鱼儿喜欢游泳';
    }
  }

  $p = new Child('小名');
  $p->skill();
  $p->skill2();