<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017年11月23日17:16:35
   * description: 类与对象相关的函数
   *
   *  class_exists() 类是否存在
   *
   *  method_exists() 方法是否存在
   *
   *  property_exists() 属性是否存在
   */

  class A{ }

  class Cat extends A{
    public $name ='小花猫';

    public function say(){
      echo '<p>喵喵叫...</p>';
    }
  }


  // class_exists(类名) 类是否存在
  if( !class_exists('Cat') ){
    echo '类名不存在';
    return;
  }

  $cat = new Cat();

  // method_exists(对象名, 方法名)
  if( method_exists($cat, 'say') ){
    $cat->say();
  }else
    echo '<br> 没有这个方法！';


  // property_exists(对象名, 属性名)
  if( property_exists($cat, 'name') ){
    echo '名字是： '. $cat->name;
  }else
    echo '没有这个属性！';


  // get_class 返回对象的类名
  echo '<br> get_class 的类名是： '. get_class($cat);

  // get_parent_class 获取 父类的类名
  echo '<br> get_parent_class 的类名是： '. get_parent_class($cat);




