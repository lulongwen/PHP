<?php
  header('content-type:text/html;charset=utf-8');
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017年11月24日22:09:33
   *
   * description: serialize 对象的 反序列化
   *  - 就是把字符串类型的对象转成对象
   */
  
  class Cat{
    public $name;
    protected $age;
    private $like;
    
    public static $num = 10;

    public function __construct($name, $age, $like) {
      $this->name = $name;
      $this->age = $age;
      $this->like = $like;
    }
  
    // 静态方法，受到访问修饰符的限制，protected & private
    public static function getTotal(){
      // 类中，访问 静态变量的方式是 self:: 静态变量名
      self::$num++;
    }

  }


  /** 序列化的数据如下，序列化的字符串中有数据和类型
   * O:3:"Cat":3:{s:4:"name";s:12:"黑猫警长";s:6:" * age";i:190;s:9:" Cat like";s:9:"抓老鼠";}
   */

    // unserialize(string) 获取要反序列化的数据
    $cat_obj_str = file_get_contents('F:/cat.log');

    $cat_obj = unserialize( $cat_obj_str );

    // 如果我们想正确操作反序列化的对象，就需要引入该对象的类定义
    echo '<br> name = '. $cat_obj->name;

    echo '<pre>';
    var_dump( $cat_obj );
    
    