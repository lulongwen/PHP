<?php
  header('content-type:text/html;charset=utf-8');
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017年11月13日18:12:33
   * description: 
   *  
   *  __sleep()
   * 
   *  __wakeup()
   */


  class Cat{
    public $name;
    protected $age;
    private $like;

    public function __construct($name, $age, $like) {
      $this->name = $name;
      $this->age = $age;
      $this->like = $like;
    }


    /** __sleep serialize 触发
     * 如果没有写 __sleep() ，默认会将所有的属性都序列化
     * 可以在 return的数组里，决定哪些属性被序列化
     * @return array
     */
    public function __sleep(){
      echo 'serialize __sleep() <br> ';

      // 必须要return 一个数组，否则报错
      return array('name', 'age');
    }


    // __wakeup unserialize() 触发
    public function __wakeup(){
      echo '<br> unserialize __wakeup';

      // 在这里决定对那些属性序列化，或这个改变属性值
      $this->name = '小花猫';
      $this->age = 681;
    }

  }

  $cat = new Cat('黑猫警长', 190, '抓老鼠');

  // serialize 序列化
  $cat_str = serialize( $cat );
  var_dump($cat_str);

  // unserialize 反序列化
  $cat_obj = unserialize( $cat_str );
  var_dump( $cat_obj );

  
  