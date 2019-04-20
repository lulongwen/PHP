<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/10
   * description: __destruct 析构函数的最佳实践，及时的释放数据库链接
   *
   * 析构函数释放资源说明：
   * 1. 如果对效率没有很高很特殊的要求：完全可以不适用析构函数
   * 2. 如果不确定代码后面是否还会使用资源，比如 数据库链接，那么最好不适用析构函数
   * 3. 项目有特殊和明确的要求时，我们可以使用析构函数，显式销毁对象，在析构函数中释放资源
   */
  
  // 定义一个类
  class DaoMysqli{
    public $mysqli;
    
    // 构造函数
    public function __construct($host, $user, $pwd, $dbname, $port){
      $this->mysqli = new Mysqli($host, $user, $pwd, $dbname, $port);
      $this->mysqli->set_charset('utf8');
      
      // 错误提示
      if($this->mysqli->connect_errno){
        die('链接错误，MyYsql返回的错误是： '. $this->mysqli->connect_error);
      }
    }
    
    // 析构函数
    public function __destruct(){
      echo '<mark>调用析构函数 __destruct 关闭链接:  </mark><br>';
      
      $this->mysqli->close();
    }
    
  }
  
  // 实例化一个对象
  $link = new DaoMysqli('localhost', 'root', '','message', 3306);
  var_dump($link->mysqli);
  
  $sql = "SELECT * FROM `mes_info`";
  $res = $link->mysqli->query($sql);
  
  $arr = array();
  while($row = $res->fetch_assoc()){
    $arr[] = $row;
  }
  
  $res->free();
  // $link->mysqli->close();
  
  $link = null;

  // 还可以请求资源
  /* echo '<br> ----------------- <br>';
  $sql = "SELECT * FROM `admin`";
  $res = $link->mysqli->query($sql);
  
  $arr1 = array();
  while($row = $res->fetch_assoc()){
    $arr1[] = $row;
  }
  var_dump($arr1); */
  
  echo '<br> END 正常关闭数据库';


?>














