<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/20
   * Time: 15:41
   * description:
   */
  
  class Movie{
    public $name;
    public $director;
    protected $cost;
    private $sales;
    
    // 构造函数
    public function __construct($name, $director, $cost) {
      $this->name = $name;
      $this->director = $director;
      $this->cost = $cost;
    }
    
    // 显示电影信息
    public function showInfo(){
      echo '<br> 电影信息如下：';
      echo '<br> name = '. $this->name;
      echo '<br> director = '. $this->director;
      echo '<br> cost = '. $this->cost;
      echo '<br> sales = '. $this->sales;
    }
    
    
    // 更新电影信息，要传入更新的参数
    public function updateInfo($director, $cost, $sales){
      //简单方式，没有任何判断
      // $this->director = $director;
      // $this->cost = $cost;
      // $this->sales = $sales;
      
      // 结合 set*** & get*** 来完成
      $this->setDirector($director);
      $this->setCost($cost);
      $this->setSales($sales);
    }
    
    public function getDirector(){
      return $this->director;
    }
    public function setDirector($director){
      $this->director = $director;
    }
    
    
    public function getCost(){
      return $this->cost;
    }
    public function setCost($cost){
      // 加入数据的验证和判断
      if(is_numeric($cost) && $cost> 0.0){
        $this->cost = $cost;
      }else
        echo '<br> 输入成本格式错误！';
    }
    
    
    public function getSales(){
      return $this->sales;
    }
    public function setSales($sales){
      // 加入验证和判断
      if(is_numeric($sales) && $sales> 0.0){
        $this->sales = $sales;
      }else
        echo '<br><mark>输入票房有格式错误<mark>';
    }
  }
  
  $movie = new Movie('喜洋洋', '大灰狼', 60000);
  
  $movie->showInfo();
  
  
  echo '<hr>';
  $movie->updateInfo('大灰狼+村长', '80000', '120000');
  
  echo '<h1>更新后电影信息如下：</h1>';
  $movie->showInfo();
  
  