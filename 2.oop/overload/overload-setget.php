<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/21
   * Time: 14:55
   * description: overload 方法的重载
   *  方法的重载 就是动态的创建属性和方法
   *  简单理解：多个同名函数，传递不同的参数，可以自动调用对应的方法，实现不同的方法
   *
   *  方法重载 通过魔术函数 __call() 实现
   *  静态方法重载 __callStatic()
   *  属性重载  __set() & __get()
   */
  
  
  // 属性重载
  class Person{
    public $like;
    private $arr = array();
    
    public function __construct($like){
      $this->like = $like;
    }
  
    /** 属性重载 __get & __set
     * 禁止 php的属性重载
     * private function __set(){ }
     */
    public function __set($attr, $val){
      // 保留php本身的动态增加属性，把自动增加的属性都放到一个数组里面
      return $this->arr[$attr] = $val;
    }

    public function __get($attr){
      
      if( isset($this->arr[$attr]) ){
        return $this->arr[$attr];
      }else
        echo '<p><mark>没有这个属性</mark></p>';
    }
  }
  
  $p1 = new Person('flower');
  $p1->name = '慕白';
  $p1->age = 19;
  $p1->address = '和林';
  
  echo '<br>'. $p1->name;
  
  echo '<pre>';
  var_dump($p1);
