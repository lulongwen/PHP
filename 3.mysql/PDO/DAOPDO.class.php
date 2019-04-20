
<?php
    /**
     * PDO 类实例化 PDO对象
     * 参数1：数据源
     * 参数2：用户名
     * 参数3：密码
     */

    final class DAOPDO{
      // 1 定义成员属性， new Mysqli的参数
      private $_host;
      private $_user;
      private $_password;
      private $_dbname;
      private $_port;
      private $_charset;

      private static $_instance; // PDO单例对象
      private $_pdo; // PDO 对象

      private function __construct(array $options){
        $this->_initOptions($options);
        $this->_initPDO();
      }

      // 阻止 clone
      private function __clone(){}

      private function _initOptions(array $options){
        // 初始化数据库
        $this->_host = isset( $options['host'] ) ? $options['host'] : '';
        $this->_user = isset( $options['user'] ) ? $options['user'] : '';
        $this->_password = isset( $options['password'] ) ? $options['password'] : '';
        $this->_dbname = isset( $options['dbname'] ) ? $options['dbname'] : '';
        $this->_port = isset( $options['port'] ) ? $options['port'] : 3306;
        $this->_charset = isset( $options['charset'] ) ? $options['charset'] : '';

        if( !$this->_host ) die('host 参数错误');
        else if( !$this->_user ) die('user 参数错误');
        else if( !$this->_password ) die('password 参数错误');
        else if( !$this->_dbname ) die('dbname 参数错误');
        else if( !$this->_port ) die('port 参数错误');
        else if( !$this->_charset ) die('charset 参数错误');
      }

      private function _initPDO(){
        $_dsn = "mysql:host=$this->_host;dbname=$this->_dbname;port=$this->_port;charset=$this->_charset";
        try{
          $this->_pdo = new PDO($_dsn, $this->_user, $this->_password);
        }catch(PDOException $error){
          echo $error->getMessage();
        }

      }

      // 单例模式
      public static function getSingleton($options){
        if(!self::$_instance instanceof self)
          self::$_instance= new self($options);
        return self::$_instance;
      }

      public function fetchOne($sql){
        $_pdo_statement = $this->_pdo ->query($sql);
          if($_pdo_statement === false)
            return $this->_errorInfo();

        // 执行到这里，说明sql语句没有问题
        $_result = $_pdo_statement-> fetch( PDO::FETCH_ASSOC );
        // 关闭游标指针，便于下次查询
        $_pdo_statement->closeCursor();
        return $_result;
      }


      public function fetchAll($sql){
        $_pdo_statement = $this->_pdo ->query($sql);
        if($_pdo_statement === false)
          return $this->_errorInfo();

        $_result = $_pdo_statement->fetchAll(PDO::FETCH_ASSOC);
        // 关闭游标指针，便于下次查询
        $_pdo_statement->closeCursor();
        return $_result;
      }

      public function fetchColumn($sql){
        $_pdo_statement = $this->_pdo ->query($sql);
        if($_pdo_statement === false)
          return $this->_errorInfo();
        $_result = $_pdo_statement->fetchColumn();
      }

      // 执行增删改 dml操作，返回受影响的记录数
      public function exec($sql){
        return $this->_pdo ->exec($sql);
      }

      // 引号转义包裹，返回转义包裹后的数据
      public function quote($val){
        return $this->_pdo ->quote($val);
      }

      // 获取最后插入的数据的主键，一般是 id
      public function lastInsertId(){
        return $this->_pdo ->lastInsertId();
      }

      private function _errorInfo(){
        // 说明 sql语句错误，输出错误信息
        $_error = $this->_pdo->errorInfo();
        $_error_info = 'SQL语句错误，错误信息如下：<br>'. $_error[2];
        echo $_error_info;
        return false;
      }
    }

?>