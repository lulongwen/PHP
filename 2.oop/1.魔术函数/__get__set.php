<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017年11月13日18:12:33
   *
   * description: __get() & __set()
   *
   * 魔术方法，名字是固定的，由系统提供，
   */

  class Person{
    public $name;
    protected $age;
    private $lover;
    private $salary;

    // 构造函数
    public function __construct($name, $age, $lover){
      $this->name = $name;
      $this->age = $age;
      $this->lover = $lover;
    }


    // 访问 protected & private 属性
    public function __get($attr){
      // if($age instanceof Person ){ // 如果当前对象有这个属性
      if( property_exists($this, $attr) ){
        return $this->$attr;
      }else{
        return $attr .'<mark>这个属性不存在</mark>';
      }
    }


    // 设置 protected & private
    public function __set($attr, $val){
      if( property_exists($this, $attr) ){
        return $this->$attr = $val;
      }else{
        echo $attr .'<mark>这个属性不存在，不能设置</mark>';
      }
    }

    /** 属性的重载, 直接设置一个空的 __set()
     * 这里有一个奇怪的语法现象： 属性的重载
     */
    // public function __set($attr, $val){}

  }


  // 实例化一个对象
  $p1 = new Person('小明', 300, '花花');


  echo '<br>名字是： '. $p1->name;

  // 访问 protected & private 触发 __get() 魔术函数
  echo '<br>年龄是： '. $p1->age;
  echo '<br>情人是： '. $p1->lover;
  echo '<br>地址是： '. $p1->address; // 不存在的属性， else

  var_dump($p1);

  echo '<br> ---------------------------------- <br>';



  echo '<br>更改后名字是： '. $p1->name = '姬禾司';

  // 直接给 protected & private 赋值， 触发 __set() 魔术函数
  echo '<br>更改后年龄是： '. $p1->age = 500;
  echo '<br>更改后情人是： '. $p1->lover = '太子';


  /** 属性的重载, 直接设置一个空的 __set()
   * 这里有一个奇怪的语法现象： 属性的重载
   * 因为这个 abc属性是不存在的，因此会触发 __set() 魔术函数
   * 但是如果程序员没有写 __set() 魔术函数，就会有以下情况：
   *  1. 这样就会 动态的给 类增加一个 属性 $abc,并且是 public
   *  2. 如果不希望属性动态增加，写一个空的 __set() 魔术方法，但是不做任何处理
   *  public function __set($attr, $val){ }
   */
  // 给一个不存在的属性赋值时，会动态增加一个属性，并且是 public
  echo '<br>新增的属性是： '. $p1->abc = '哈哈哈新增属性'; // 给不存在的属性赋值，可以设置，但是没有添加到对象里面


  echo '<br>年龄是： '. $p1->age;
  var_dump($p1);

?>
