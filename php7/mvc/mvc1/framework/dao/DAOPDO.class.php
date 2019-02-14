<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/12/8
   * Time: 9:49
   * description:
   */


  namespace framework\dao;

  use framework\dao\iDAOInterface;
  use \PDO;
  use \PDOException;

  require_once 'DAOPDO.interface.php';
  // 首先，类要实现，完成接口规定的内容
  class DAOPDO implements iDAOInterface{
    private $_host;
    private $_user;
    private $_password;
    private $_dbname;
    private $_port;
    private $_charset;
    private $_dsn;
    private $_pdo; // PDO链接对象

    // DAOPDO类的单例对象，实例化的对象保存到该类上
    private static $_instance;

    // 私有构造函数，参数就是数据库的链接
    private function __construct(array $options){
      $this->_initOptions($options);
      $this->_initPDO();
    }

    // 初始化数据库链接
    private function _initOptions(array $options){
      // 验证数据
      $this->_host = isset( $options['host'] ) ? $options['host']: '';
      $this->_user = isset( $options['user'] ) ? $options['user']: '';
      $this->_password = isset( $options['password'] ) ? $options['password'] : '';
      $this->_dbname = isset( $options['dbname'] ) ? $options['dbname'] : '';
      $this->_port = isset( $options['port'] ) ? $options['port']: 3306;
      $this->_charset = isset( $options['charset'] ) ? $options['charset'] : '';

      if( !$this->_host) die('host 参数错误');
      else if( !$this->_user) die('user 参数错误');
      else if( !$this->_password) die('password 参数错误');
      else if( !$this->_dbname) die('dbname 参数错误');
      else if( !$this->_port) die('port 参数错误');
      else if( !$this->_charset) die('charset 参数错误');
    }

    private function _initPDO(){
      $this->_dsn = "mysql:host={$this->_host};dbname={$this->_dbname};port={$this->_port};charset={$this->_charset}";
      try{
        $this->_pdo = new PDO($this->_dsn, $this->_user, $this->_password);
      }catch(PDOException $error){
        die($error->getMessage());
      }
    }

    // 阻止 clone
    private function __clone(){}

    // 生成单例模式，先判断$pdo属性是否是当前类的实例
    public static function getSingleton($options){
      if(!self::$_instance instanceof self)
        self::$_instance = new self($options);
      return self::$_instance;
    }

    // 查询一条记录
    public function fetchOne($sql) {
      // TODO: Implement fetchOne() method.
      $pdo_statement = $this->_pdo->query($sql);
      if( $pdo_statement === false ){
        //说明 sql语句有错，输出错误信息
        $error = $this->_pdo->errorInfo();
        echo '<mark>SQL语句错误，错误是：</mark>'.$error[2] .'<br>';
        return false;
      }

      // 执行到这里说明 sql没有错
      $result = $pdo_statement->fetch(PDO::FETCH_ASSOC);
      // 关闭游标指针，便于下次查询
      $pdo_statement->closeCursor();
      return $result;
    }

    // 查询所有记录
    public function fetchAll($sql) {
      // TODO: Implement fetchAll() method.
      $pdo_statement = $this->_pdo->query($sql);
      if($pdo_statement === false){
        $error = $this->_pdo->errorInfo();
        echo '<mark>SQL语句错误，错误是：</mark>'.$error[2].'<br>';
        return false;
      }

      $result = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
      $pdo_statement->closeCursor();
      return $result;
    }

    public function fetchColumn($sql) {
      // TODO: Implement fetchColumn() method.
      $pdo_statement = $this->_pdo->query($sql);
      if($pdo_statement === false){
        $error = $this->_pdo->errorInfo();
        echo '<mark>SQL语句错误，错误是：</mark>'.$error[2].'<br>';
        return false;
      }
      /**
       * 因为查询的sql语句如下：
       * select goods_name from goods where goods_id =2;
       * 已经告诉数据库查询的是 goods_name这个字段，所以 fetchColumn不需要传递字段的索引
       */
      $result = $pdo_statement->fetchColumn();
      $pdo_statement->closeCursor();
      return $result;
    }

    // 执行增删改操作
    public function exec($sql) {
      // TODO: Implement exec() method.
      $result = $this->_pdo->exec($sql);
      if($result === false){
        $error =  $this->_pdo->errorInfo();
        echo '<mark>SQL语句错误，错误是：</mark>'.$error[2];
        return false;
      }
      // 执行到这里说明没错出错，返回受影响的行数
      return $result;
    }

    // 引号转义，返回转义后的数据
    public function quote($val) {
      // TODO: Implement quote() method.
      return $this->_pdo->quote($val);
    }

    // 查询刚刚插入的数据的主键
    public function lastInsertId() {
      // TODO: Implement lastInsertId() method.
      return $this->_pdo->lastInsertId();
    }
  }


  $array = array(
    'host' => 'localhost',
    'user' => 'root',
    'password' => 'root',
    'dbname' => 'db2',
    'port' => 3306,
    'charset' => 'utf8'
  );

  $pdo = DAOPDO::getSingleton($array);


  $sql = "SELECT * FROM `employee`";
  $result = $pdo -> fetchAll($sql);

  $sql = "INSERT INTO `employee` VALUES(19,'梁玉','女', '722-03-20', '梨园春', '13123', '日啖荔枝三百颗')";
  $row = $pdo -> exec($sql);
  $id = $pdo -> lastInsertId();
  var_dump($id, $row);

  $data = "hello '1 or 1' world";
  $pre = $pdo -> quote($data);







