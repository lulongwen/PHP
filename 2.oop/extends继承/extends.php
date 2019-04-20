<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/20
   * Time: 17:36
   * description: extends 继承
   */
  
  // 考试系统
  class Example{
    public $name;
    public $age;
    private $greade;
    
    // 构造函数
    public function __construct($name, $age){
      $this->name = $name;
      $this->age = $age;
    }
    
    // 评分
    public function setGrade($grade){
      $this->grade = $grade;
    }
    
    // 显示成绩
    public function showGrade(){
      echo '<h1><mark> 名字是： '. $this->name .'， 成绩是： '.  $this->grade .'</mark></h1>';
    }
  }
  
  // 小学生继承 考试系统
  class Student extends Example{
    // 自己的函数
    public function test(){
      echo '小学生在数学考试...';
    }
  }
  
  // 大学生考试
  class University extends Example{
    // 自己的函数
    public function test(){
      echo 'University 微积分考试...';
    }
  }
  
  
  // 1 实例化小学生
  $student = new Student('小明',9);
  $student->test(); // 自己的方法
  
  $student->setGrade(98); // 设置成绩
  $student->showGrade(); // 显示成绩
  
  
  // 2 实例化大学生
  $big = new University('花花', 18);
  $big->test(); // 自己的方法

  $big->setGrade(278);
  $big->showGrade();
  
