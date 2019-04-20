<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/23
   * Time: 14:56
   * description: 对象遍历
   */

  class Cat{
    public $name;
    public $age;
    protected $food;
    protected $grade;
    private $lover;

    public function __construct($name, $age, $food, $lover){
      $this->name = $name;
      $this->age = $age;
      $this->food = $food;
      $this->lover = $lover;
    }

    public function getGrade(){
      return $this->grade;
    }

    public function setGrade($val){
      $this->grade = $val;
    }


    // 以遍历的形式显示属性信息
    public function showInfo(){
      echo '<hr> 属性是：';
      foreach($this as $key => $val){
        echo '<br> $key: '. $key .', $val: '.$val;
      }
    }
  }

  $cat = new Cat('小花猫', 3, '凯文鱼', '小黑猫');
  $cat->setGrade = 'AAA';


  // 类的外面遍历，只能遍历 public属性
  foreach($cat as $key => $val){
    echo '<br> $key: '. $key .', $val: '. $val;
  };

  // 类的内部遍历
  $cat->showInfo();
