<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * startDate: 2017年11月16日10:39:36
   * endTime:
   * description: singleton 单例模式
   */
  
  // final 禁止继承，不然继承可以破解单例模式
  final class DaoMysqli {
    // 定义mysqli的链接
    private $mysqli_link;
    // $instance是一个静态属性，表示 DaoMysqli的一个对象实例
    private static $instance = null;
    
    // 构造函数
    private function __construct($host, $username, $password, $dbname, $prot){
      // 这里只链接一次数据库，节省资源
      $this->mysqli_link = new Mysqli($host, $username, $password, $dbname, $prot);
    }
    
    // 写一个静态方法来创建对象的实例，通过 singleton来创建对象
    public static function singleton($host, $username, $password, $dbname, $prot){
  
      /** 判断$instance 是否存在，如果没有就创建，否则返回 $instance;
       * 确保类只有一个实例化的对象
       *  instanceof 类型运算符，用以判断某个变量是不是某个类的对象实例
       *  $instance instanceof DaoMysqli
       */
      if(!self::$instance instanceof self){
        self::$instance = new DaoMysqli($host, $username, $password, $dbname, $prot);
      }
      
      // 直接返回 类的静态属性
      return self::$instance;
    }
    
    // 阻止 clone
    private function __clone(){}
  }
  
  $link = DaoMysqli::singleton('localhost','root', '','message', 3306);
  $link2 = DaoMysqli::singleton('localhost','root', '','message', 3306);
  
  echo '<pre>';
  var_dump($link, $link2);