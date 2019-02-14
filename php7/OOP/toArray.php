<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/23
   * Time: 14:56
   * description: stdClass 标准类，可以让变量成为一个object
   *  对象转数组后，protected & private 修饰的属性和方法是不能访问的
   */

  // 对象转数组
  $obj = new stdClass;
  $obj->name = '姬禾司';
  $obj->age = '23';
  $obj->address = '裴定';

  // 标准类转数组 (array)$obj;
  echo '<h2> 标准类转数组 (array)$obj; </h2>';
  $arr = (array)$obj;

  echo '<pre>';
  var_dump($arr);
  echo $arr['name'];


  class Cat{
    public $name = '小花猫';
    public $age = 45;
    protected $price = 56.7;
    private $food = '小鱼';
  }

  $cat = new Cat;

  $cat_arr = (array)$cat;
  print_r($cat_arr);

  echo '<br> name = '. $cat_arr['name'];
  echo '<br> age = '. $cat_arr['age'];

  // 当对象转成数组后，私有属性仍然无法访问
  echo '<br> price = '. $cat_arr['*price'];
  echo '<br> food = '. $cat_arr['Catfood'];
  echo '</pre>';


  // 数组转对象
  echo '<h2> 数组转对象 (object)$arr;</h2>';
  $person = array(
    'name'=> 'Lucy',
    'age'=> 28,
    'skill'=> 'English',
    'address'=> array(
      'name'=> 'white house',
      'price'=> '8亿'
    )
  );

  $person_obj = (object)$person;

  echo '<pre>';
  var_dump($person_obj);

  // 访问对象下的属性：
  echo '<br> '. $person_obj->name;
  echo '<br> house-name：'. $person_obj->address['name'];
  echo '</pre>';



  echo '<h2> 基本数据类型转对象 (object)$var;</h2>';
  $num =200;
  $num_obj = (object)$num;

  var_dump($num_obj);
  echo 'num = '. $num_obj->scalar;



