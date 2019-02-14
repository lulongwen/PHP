<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/21
   * Time: 14:55
   * description: overload 方法的重载
   */
  
  
  // 传统的面向对象的重载
  class Person{
    public function getVal($val){
      echo '<br> getVal(val)';
    }
    
    // 报错， redeclare， 不能重新定义 getVal
    public function getVal($val,$val2){
      echo '<br> getVal(getVa1, getVal2)';
    }
  }
  
  $p1 = new Person();
  $p1->getVal(10);
  $p1->getVal(30,200);
  