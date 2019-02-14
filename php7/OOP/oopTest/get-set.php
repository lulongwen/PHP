<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * startTime: 2017年11月14日11:24:10
   * endTime:
   * description:
   */
  
  class Car{
    public $price;
    public $brand;
    public $speed;
    
    private $user;
    
    // 构造函数
    public function __construct($price, $brand, $speed, $user){
      $this->price = $price;
      $this->brand = $brand;
      $this->speed = $speed;
      $this->user = $user;
    }
    
    public function __get($attr){
      if( property_exists($this, $attr) ){
        return $this->$attr;
      }else{
        return '<mark>不存在的属性</mark>';
      }
    }
  
  
    public function __set($key, $val){
      if(property_exists($this, $key) ){
        return $this->$key = $val;
      }else{
        return '<mark>不能设置不存在的属性</mark>';
      }
    }
  }
  
  
  $car = new Car('18000', '吉安', '300Km', '小名');
  
  
  
  // 更改车主
  echo '<br>更改后车主是： '. $car->user = '小花';
  echo '<br>新增的颜色是： '. $car->color;
  
  // 输出车主
  echo '<br>原来的车主是：'. $car->user;
  echo '<br>新增的颜色是： '. $car->color = '红色';
  
  var_dump($car);