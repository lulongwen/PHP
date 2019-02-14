<?php
  header('content-type:text/html;charset=utf-8');
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017年11月13日18:12:33
   *
   * description: static 静态属性
   * 请设计一个Person类, （有 名字， 年龄  和  蛋糕 三个属性）
   *  蛋糕一共1000块，是所有人共享的.
   *  创建唐僧师徒四人，他们每人都吃蛋糕,
   *  唐僧每天吃 3块，悟空吃5块，沙和尚吃9块，猪八戒吃 30块. (编写一个 eat方法来吃)
   *
   * 问两天后，还剩多少块蛋糕，(编写一个 showCake() 来显示)
   * 请计算，蛋糕一共可以吃多少天.
   */
  
  class Person{
    public $name;
    public $age;
    
    // static $total 静态属性，公有的
    public static $cake = 1000;
    
    public function __construct($name, $age){
      $this->name = $name;
      $this->age = $age;
    }
    
    // 传入吃蛋糕的数量
    public function eat($num){
      // 判断是否还有蛋糕，是否够吃
      if(self::$cake >= $num){
        self::$cake  -= $num;
        return true;
      }else{
        echo '<br>'. $this->name .'蛋糕不够吃了';
        return false;
      }
    }
    
    // 还剩多少蛋糕
    public function showCake(){
      echo '<br><mark>现在还有蛋糕： '. self::$cake .'</mark>';
    }
    
  }
  
  // 实例化一个对象
  $p1 = new Person('小唐', 30);
  $p2 = new Person('空空', 500);
  $p3 = new Person('悟净', 600);
  $p4 = new Person('猪猪', 900);
  
  // $p1->eat(3);
  // $p2->eat(5);
  // $p3->eat(9);
  // $p4->eat(30);
  
  
  // 2天后，蛋糕还有
  /*$num =0;
  while($num <2){
    $p1->eat(3);
    $p2->eat(5);
    $p3->eat(9);
    $p4->eat(30);
    $num++;
  }*/
  // 2天后的蛋糕还有，因为是静态属性所以，任何一个对象都可以调用
  echo $p1->showCake();
  // echo Person::$cake;
  
  
  
  // 蛋糕能吃多少天
  $day =0;
  while(true){
    // 如果不够吃, break 跳出
    if( !$p1->eat(3) ) break;
    if( !$p2->eat(5) ) break;
    if( !$p3->eat(9) ) break;
    if( !$p4->eat(30) ) break;
    
    $day++;
  }
  echo '<br>蛋糕能吃： '. $day ;
  
  
  


  
  