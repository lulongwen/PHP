<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/21
   * Time: 16:29
   * description: 类型约束
   * 1. 子类方法的参数个数，方法名称要和父类方法的参数个数，方法名称一样
   * 2. 如果父类的方法参数使用了类型约束，还必须保证数据类型一致
   * 3. 子类方法不能缩小父类方法的访问权限
   */
  
  class Person{
    public $name = '磊磊';
    public static $num = 100;
    
    protected function getSum(array $arr, $arr2){
      echo '<br> 都会说你好！';
    }
  }
  
  class Child extends Person{
    public function getSum(array $arr, $arr2){
      echo '<br> Hello';
    }
  }
  
  