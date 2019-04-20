<?php
  header('content-type:text/html;charset=utf-8');
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017年11月13日18:12:33
   *
   * description: 面向对象：封装
   */
  
  class Person{
    public $name;
    protected $job;
    private $salary;
    
    // 构造函数
    public function __construct($name, $job, $salary){
      $this->name = $name;
      $this->job = $job;
      $this->salary = $salary;
    }
    
    // 三个不同的访问修饰符 public & protected & private
    public function isName(){
      echo '<br> name= '. $this->name;
    }
    
    protected function isJob(){
      return '<br><mark>工作是： '. $this->job .'</mark>';
    }
    
    private function isSalary(){
      echo '<br><mark>薪水是： '. $this->salary .'</mark>';
    }
    
    
    // 类的内部，访问 protected & private
    public function getJob(){
      echo '<hr>'.$this->job;
      echo $this->isJob();
    }
    
    public function getSalary(){
      echo '<hr>'.$this->salary;
      echo $this->isSalary();
    }
  }

  
  $p1 = new Person('小花', 'UI设计', '80000');
  
  echo $p1->name;
  echo $p1->isName();
  
  /** protected & private 的属性和方法在外部不能访问
   * 可以在内部用普通方法访问
   */
  // echo $p1->job; 报错
  // echo $p1->salary;
  
  // 不能直接访问受保护的属性，要去访问普通方法
  echo $p1->getJob();
  
  echo $p1->getSalary();