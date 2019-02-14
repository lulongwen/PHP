<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/24
   * Time: 9:59
   * description: 反射代理
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

    public function showInfo(){
      echo '<br> showInfo()';
    }

    public function __toString(){
      echo '<br> __toString()';
      /** 返回该类名的相关信息，比如类名：所有成员方法和所有属性等
       * 初步接触下反射机制，可以获取到该类的所有信息
       * ReflectionClass
       * 1 创建一个反射对象，也就是一个类本身，也可以看作是一个对象
       *  - 通过反射对象获取该类的相关信息
       *  - 你是一个面向对象的程序员，对象肯定有它的属性和方法，找啊
       */
      $reflection_obj = new ReflectionClass($this);
      echo '<pre>';
      var_dump($reflection_obj);
      echo '</pre>';

      // 类名 getName()
      echo '<h3>类名是：</h3>'. $reflection_obj->getName();

      // 成员方法 getMethods()
      echo '<h3>成员方法：</h3><pre>';
      var_dump( $reflection_obj->getMethods() );

      // 所有属性 getProperties()
      echo '</pre><h3>成员属性：</h3><pre>';
      var_dump( $reflection_obj->getProperties() );

      return '';
    }
  }

  $cat = new Cat('花猫', '裴定鱼', '小灰灰');

  echo $cat;