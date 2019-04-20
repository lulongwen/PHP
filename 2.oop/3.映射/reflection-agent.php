<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/24
   * Time: 9:59
   * description: 反射方法代理的调用
   */

  class Cat{
    public $name;
    protected $food;
    private $lover;

    public function __construct($name, $food, $lover){
      $this->name = $name;
      $this->food = $food;
      $this->lover = $lover;
    }

    public function say($sound){
      echo '<br>'. $this->name .' 喜欢吃： '. $this->food .', 叫声是： '. $sound;
    }

  }


  // 传统使用
  $cat = new Cat('花猫', '裴定鱼', '小灰灰');
  $cat->say('喵喵叫');


  /** 使用反射机制实现代理调用
   * 1. 创建 ReflectionClass
   * 2. 创建一个Cat对象实例，不能使用 new Cat();
   * 3. 得到反射方法 say
   * 4. 通过反射方法代理调用say
   */

  //1 创建 ReflectionClass('Cat') 对象
  $reflect_obj = new ReflectionClass('Cat');

  // 2 创建一个 Cat对象实例（不能用 new Cat ）
  $cat2 = $reflect_obj-> newInstance('白猫', '金金鱼', '小兔兔');

  // 3 得到反射方法 say
  $reflect_method_say = $reflect_obj->getMethod('say');

  var_dump($reflect_method_say);

  // 4 通过反射方法代理调用 say
  $reflect_method_say->invoke($cat2, '哈哈~O(∩_∩)O哈哈哈~');
