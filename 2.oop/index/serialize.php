<?php
  header('content-type:text/html;charset=utf-8');
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017年11月24日22:09:33
   *
   * description: serialize 对象序列化
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

  $cat = new Cat('黑猫警长', 190, '抓老鼠');

  // 将 $cat 保存到文件中，在保存对象前，需要将 $cat 序列化
  file_put_contents('F:/cat.log', serialize($cat) );
  echo '<br> 保存成功';

  /** 序列化的数据如下，序列化的字符串中有数据和类型
   * O:3:"Cat":3:{s:4:"name";s:12:"黑猫警长";s:6:" * age";i:190;s:9:" Cat like";s:9:"抓老鼠";}
   * 
   */
    
    