<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * startDate: 2017年11月16日11:30:07
   * endTime:
   * description: instanceof 运算符
   */
  
  
  class Cat{
    public $name;
  }
  
  
  class Pig{
    public $name;
    public $age;
  }
  
  
  $cat = new Cat();
  
  $pig = new Pig();
  
  // $cat instanceof Cat 判断 $cat 是不是 Cat类的对象实例
  if( $cat instanceof Cat ){
    echo '<br> $cat 是 Cat的对象实例';
  }
  
  if( $cat instanceof Pig ){
    echo '<br> $cat 是 Cat的对象实例';
  }else
    echo '<br> $cat 不是 Pig的对象实例';
  
