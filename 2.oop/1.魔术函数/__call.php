<?php
  header('content-type:text/html;charset=utf-8');
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017年11月13日18:12:33
   *
   * description: __call()
   * 访问不可访问的成员方法时，就会触发 __call()
   * 不可访问的成员方法是：
   *  1. 该成员方法不存在
   *  2. 成员方法是 protected & private
   *  3. __call() 魔术方法接收2个参数，第二个参数是数组
   *  __call(函数名,参数)
   *  __call($method_name,$params)
   */
  
  class Person{
    public $name;
    protected $like;
    private $lover;
    
    // 构造函数
    public function __construct($name, $like, $lover){
      $this->name = $name;
      $this->like = $like;
      $this->lover = $lover;
    }
    
    // public 输出对象的信息
    public function showInfo(){
      echo '<br> 名字是： '. $this->name;
      foreach($this->like as $val){
        echo '<br> 喜欢的事： '. $val;
      }
    }
    
    // protected
    protected function getSum($num1, $num2){
      return $num1 + $num2;
    }
    
    // private
    private function plus($num1, $num2){
      return $num1 * $num2;
    }
  
    
    // 调用方法前面是 protected，触发 __call()
    public function __call($method_name, $params){
      // 判断 $this中 是否有这个方法，有，返回 true，没有 false
      if( method_exists($this, $method_name) ){
        return $this->$method_name($params[0], $params[1]);
      }else{
        return '没有这个方法';
      }
      
    }

    
  }
  
  
  // 实例化一个对象
  $p1 = new Person('小明', array('drink'=> '喝酒', 'eat'=> '吃鸡腿','todo'=>'做好事'), '花花');
  
  echo '<pre>';
  var_dump($p1);
  
  echo '<pre> -------------------<br>';
  echo '能做的事：2个数求和 '. $p1->getSum(20, 12);
  
  echo '<pre> -------------------<br>';
  echo '能做的事：2个数乘法 '. $p1->getSum(20, 100);
  
  
  
  
?>
  
