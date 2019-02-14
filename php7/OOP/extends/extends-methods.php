<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/20
   * Time: 17:36
   * description: extends 继承细节
   * 继承是建立了 子类的查找关系，而不是父类的拷贝，继承的查找关系：
   * 1. 当一个对象去操作一个属性或方法时，先到子类的定义去看，
   *    如果有这个属性或者方法，然后判断是否可以操作，如果可以操作，就操作，如果不能操作就报错
   *
   * 2. 当一个对象去操作一个属性或方法时，先到子类的定义去看，如果没有这个属性或方法，
   *    就到父类去查找有没有这个属性或方法，
   *    如果父类有这个属性和方法，然后判断是否可以操作，如果可以操作，就操作，如果不能操作就报错
   *
   * 3. 如果父类也没有这个属性和方法，就到父类的父类去看，一次类推（直到最顶级类）
   *
   * 继承的细节：
   * 1. 父类的 public & protected 属性和方法可以被继承和访问
   *    父类的 private 属性和方法不能被继承和访问
   *
   * 2. 子类最多只能继承一个父类
   *  class B extends A{ }
   *  class C extends B{ } // C 继承 A ，B
   * 错误的继承
   *  class C extends A,B{ }
   *
   *
   * 1. 在创建某个子类对象时，默认情况下会自动调用其父类的构造函数
   *    * 前提是： 子类没有定义构造函数的情况下
   */
  
  class Person{
    public $name = 'PHP';
    protected $sex = 'girl';
    private $age = 100;
    
    public function fn1(){
      echo '<br> fn1()';
    }
  
    protected function fn2(){
      echo '<br> f2()';
    }
  
    private function fn3(){
      echo '<br> fn3()';
    }
  }
  
  
  // extends
  class Student extends Person{
    public $address = '和林';
    
    public function showInfo(){
      // 父类的 public & protected 修饰符的属性和方法被子类继承并可以访问
      echo '<h3>可访问的信息如下：</h3>name = '. $this->name .', sex '. $this->sex;
      
      // 父类的 private属性和方法不能被继承和访问，报错
      // echo '<h3>private的信息如下：</h3>age = '. $this->age;
    }
  
    // 父类的 public & protected 可以被访问
    public function showMethod(){
      $this->fn1();
      $this->fn2();
      
      // 父类的 private不能被继承和访问，报错
      $this->fn3();
    }
  }
  
  $student = new Student;
  
  echo '<pre>';
  var_dump($student);
  
  echo '<hr>';
  $student->showInfo();
  $student->showMethod();
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  