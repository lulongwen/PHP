<?php

  /**
   * Class DAOMysqli
   * 开发类：
   *  1. 定义类名
   *  2. 定义成员属性 new Mysqli() 的参数
   *    - 成员属性以 _ 开头是一种命名风格
   *
   *  3. 定义成员方法
   *    - dml语句 update & delete & insert into
   *    - dql语句 select语句
   */

  // final 禁止继承 破解单例模式
  final class DAOMysqli{
    // 1 定义成员属性， new Mysqli的参数
    private $_host;
    private $_user;
    private $_password;
    private $_dbname;
    private $_port;

    private $_mysqli; // mysqli 链接对象
    private $_charset;

    // 做成一个单例模式，表示 DAOMysqli的一个对象实例
    private static $_instance;

    // 阻止 clone 破解单例模式
    private function __clone(){}


    // 2 定义构造函数
    private function __construct(array $options){
      $this->_initOptions($options);
      $this->_initMysqli();
    }
    // 初始化数据库链接 option属性
    private function _initOptions(array $options){
      // 验证数据
      $this->_host = isset( $options['host'] ) ? $options['host'] : '';
      $this->_user = isset( $options['user'] ) ? $options['user'] : '';
      $this->_password = isset( $options['password'] ) ? $options['password'] : '';
      $this->_dbname = isset( $options['dbname'] ) ? $options['dbname'] : '';
      $this->_port = isset( $options['port'] ) ? $options['port'] : '3306';
      $this->_charset = isset( $options['charset'] ) ? $options['charset'] : '';

      if( !$this->_host ) die('host 参数错误');
      else if( !$this->_user ) die('user 参数错误');
      else if( !$this->_password ) die('password 参数错误');
      else if( !$this->_dbname ) die('dbname 参数错误');
      else if( !$this->_port ) die('port 参数错误');
      else if( !$this->_charset ) die('charset 参数错误');
    }
    // 初始化 mysqli
    private function _initMysqli(){
      $this->_mysqli = new Mysqli(
        $this->_host,
        $this->_user,
        $this->_password,
        $this->_dbname,
        $this->_port
      );

      // 判断是否链接成功
      if( $this->_mysqli->connect_errno )
        die('<mark>数据库链接失败，错误是：</mark>'. $this->_mysqli->connect_error );

      // 设置字符集
      $this->_mysqli->set_charset($this->_charset);
    }



    // 3 单例模式的 静态方法
    public static function getSingleton(array $options){
      // 判断是否有对象实例
      if(!self::$_instance instanceof self){
        // 如果没有，就实例化对象
        self::$_instance = new self($options);
      }
      return self::$_instance;
    }


    // dml语句操作
    public function query($sql){
      // dml语句，成功返回 true，失败返回 false
      if (!$this->_mysqli->query($sql)) {
        echo '<br>执行失败, SQL语句是<mark>'. $sql .'</mark>';
        die('<br>失败的原因是：'. $this->_mysqli->error);
      }
      if ($this->_mysqli->affected_rows > 0)
        echo '<br>执行成功,真正影响到了数据库的表';
      else
        echo '<br><mark>操作对数据表没有任何影响</mark>';
    }


    // dql语句 select查询，返回资源集
    public function fetchAll($sql){
      $arr = array();
      $res = $this->_mysqli->query($sql);
      if( !$res ){
        echo '<br>执行失败 sql语句是' . $sql;
        die('<br> 失败的原因: '. $this->_mysqli->error);
      }

      while( $row = $res->fetch_assoc() ){
        $arr[] = $row;
      }
      $res->free();
      return $arr;
    }

    //dql语句 fetchOne,只查询一条
    public function fetchOne($sql){
      $res = $this->_mysqli->query($sql);
      if( !$res ){
        echo '执行失败，SQL语句是： '. $sql;
        die('，错误是：'. $this->_mysqli->error);
      }
      $row = $res->fetch_assoc();
      $res->free();
      return $row;
    }
  }