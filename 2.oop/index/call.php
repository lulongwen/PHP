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
   *  3. __call() 魔术方法接收2个参数
   *  __call(函数名,参数)
   *  __call($method_name,$params)
   *
   * test：
   * 编写一个Cat类(有 年龄, 名字 二个属性)
   *  要求二个属性全部都是public
   *
   * Cat类有一个方法 plus($n1, $n2, $oper)
   *  $oper可以是 + - * / 是私有的
   *
   * 在类外部，$对象名->play('jiSuan', $n1, $n2, $oper)
   *  得到结果，注意play这个方法，在类中没有定义.
   * 要求 play 是固定的，如果没有按规则写，则给出相应的错误提示!
   */
  
  class Cat{
    public $name;
    public $age;
    
    // 构造函数
    public function __construct($name, $age){
      $this->name = $name;
      $this->age = $age;
    }
    
    // private
    private function getSum($num1, $num2, $oper){
      $result = 0; // 声明一个变量用以保存结果并返回
      
      // 判断 $oper 类型
      switch($oper){
        case '+':
          $result = $num1 + $num2;
          break;
          
        case '-':
          $result = $num1 - $num2;
          break;
          
        case '*':
          $result = $num1 * $num2;
          break;
          
        case '/':
          $result = $num1 / $num2;
          break;
          
        default:
          echo '输入的运算符错误！';
          break;
      }
      return $result;
    }
  
    
    // 调用方法前面是 protected，触发 __call()
    public function __call($method_name, $params){
      // 判断方法名 是否等于 plus
      echo $method_name;
      var_dump($params);
      
      if( $method_name !== 'getPlus'){
        return $method_name .'! 没有这个方法';
      }
      else{
        if( method_exists($this, $params[0]) ){
          return $this->getSum($params[1], $params[2], $params[3]);
          // return $this->$params[0]($params[1], $params[2], $params[3]);
        }else{
          return $method_name .'? 没有这个方法';
        }
      }
      
      /*if( method_exists($this, $method_name) ){
        return $this->$method_name($params[0], $params[1], $params[2]);
      }else{
        return $method_name .'? 没有这个方法';
      }*/
    }

    
  }
  
  
  // 实例化一个对象
  $p1 = new Cat('花花','3岁');
  
  echo '<pre>';
  var_dump($p1);
  
  echo '<hr>';
  // echo '计算结果是：'. $p1->getSum(20, 30, '*');
  
  echo '计算结果是：'. $p1->getPlus('getSum',20, 30, '*');
  
  
  
  
?>
  
