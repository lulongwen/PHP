<?php
  header('content-type:text/html;charset=utf-8');
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017年11月13日18:12:33
   *
   * description: __isset() & __unset()
   *
   * 魔术方法，名字是固定的，由系统提供
   * 对不可访问的属性进行了 isset()  empty() 操作时， __isset() 函数就会被系统调用
   *
   *
   *
   */
  
  class Person{
    public $name;
    protected $age;
    private $lover;
    
    // 构造函数
    public function __construct($name, $age, $lover){
      $this->name = $name;
      $this->age = $age;
      $this->lover = $lover;
    }
    
    
    // 访问 protected & private，判断 isset() empty()
    public function __isset($attr){
      
      // 判断是不是自己的属性
      if( property_exists($this, $attr) ){
        return true;
      }else{
        return false;
      }
    }
    
    
    
    // 销毁 unset() 触发 __unset() ，unset只是销毁变量，没有销毁数据空间
    public function __unset($attr){
      // 如果是自己的属性就销毁，否则提醒
      if(  property_exists($this, $attr) ){
        unset($this->$attr);
      }else{
        echo '<mark>不能 usnet() 不存在的属性</mark>';
      }
    }
    
  }
  
  
  // 实例化一个对象
  $p1 = new Person('小明', 300, '花花');
  
  
  echo '<br>名字是： '. $p1->name;
  
  // 判断属性是否存在
  if( isset($p1->name) ){
    echo '<br> 属性是存在的';
  }else{
    echo '<br> 属性不存在';
  }
  
  
  if( isset($p1->age1) ){
    echo '<br> 属性是存在的';
  }else
    echo '<br>属性不存在';
  
  
  if( isset($p1->lover) ){
    echo '<br> 属性是存在的';
  }else
    echo '<br>属性不存在';
  
  if( empty($p1->sub) ){
    echo '<br> 属性是存在的 empty';
  }else
    echo '<br><mark>属性不存在</mark>';
  
  
  echo '<br>------------------------<br>';
  
  
  unset($p1->name); // 属性是 public，可以直接 unset()
  
  // unset属性 是 protected & private 就不可以直接 unset
  // 这时，就会触发 __unset() 魔术方法
  unset($p1->age);
  unset($p1->lover);
  
  unset($p1->abc); // unset 不存在的属性，也触发 __unset()
  var_dump($p1);
?>
  
