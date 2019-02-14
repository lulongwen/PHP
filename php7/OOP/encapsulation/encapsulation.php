<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/20
   * Time: 15:41
   * description: 面向对象 - 封装
   * 封装的细节
      - 普通属性定义为 public & protected & private
      - 如果用 var定义，则视为公有，public类型
      - 静态属性可以不指定访问修饰符，默认 public
   */
  
  class Movie{
    // 对应的普通属性前面需要有 访问修饰符，否则报错
    // php4版本中，var $director  等价于 public $director
    public $name;
    var $director;
    protected $cost;
    private $sales;
    
    // 静态属性前面可以有访问修饰符 public & protected & private
    // 如果不写，默认 public
    static $total = 100;
    
    // 构造函数
    public function __construct($name, $director, $cost, $sales) {
      $this->name = $name;
      $this->director = $director;
      $this->cost = $cost;
      $this->sales = $sales;
    }
    
    // 显示电影信息
    public function showInfo(){
      echo '<br> 电影信息如下：';
      echo '<br> name = '. $this->name;
      echo '<br> director = '. $this->director;
    }
  
    // 静态方法只能访问静态变量
    public static function showTotal(){
      echo '<br> 电影票房如下：';
      echo '<br> sales = '. self::$total * 100;
    }
  }
  
  echo Movie:: $total;
  echo Movie::showTotal();
  
  $movie = new Movie('喜洋洋', '大灰狼', 60000, 90000);
  // $movie->showInfo();

  