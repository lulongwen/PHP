<?php
/**
*数据库连接类
*单例模式
*/
class MySQLDB {
	private $host;		//主机
	private $port;		//端口
	private $user;		//用户名
	private $pwd;		//密码
	private $charset;	//字符编码
	private $dbname;	//数据库名称;
	private static $instance;	//MySQLDB的实例
	//私有的构造函数，防止实例化
	private function __construct($config) {
		$this->host=isset($config['host'])?$config['host']:'127.0.0.1';
		$this->port=isset($config['port'])?$config['port']:'3306';
		$this->user=isset($config['user'])?$config['user']:'root';
		$this->pwd=isset($config['pwd'])?$config['pwd']:'';
		$this->charset=isset($config['charset'])?$config['charset']:'utf8';
		$this->dbname=isset($config['dbname'])?$config['dbname']:'data';
		
		$this->connect();
		$this->selectDB();
		$this->setCharset();
	}
	//私有的__clone,放在克隆对象
	private function __clone() {
		
	}
	//共有的获得单例的方法
	public static function getInstance($config=array()) {
		if(!self::$instance instanceof self)
			self::$instance=new self($config);
		return self::$instance;
	}
	//数据库连接
	private function connect() {
		mysql_connect("{$this->host}:{$this->port}",$this->user,$this->pwd) or die(mysql_error());
	}
	//选择数据库
	private function selectDB() {
		mysql_select_db($this->dbname);
	}
	//设置字符编码
	private function setCharset() {
		$this->query("set names {$this->charset}");
	}
	//查询SQL语句
	public function query($sql) {
		if(!$result=mysql_query($sql)){
			echo 'SQL语句执行失败<br>';
			echo '错误编号：'.mysql_errno.'<br>';
			echo '错误信息：'.mysql_error.'<br>';
			echo '错误的SQL语句：'.$sql.'<br>';
			exit;
		}
		return $result;
	}
	/**
	*从数据库中获取所有数据
	*@param $sql string SQL语句
	*@param $fetch_type 匹配类型，assoc|row|array
	*/
	public function fetchAll($sql,$fetch_type='assoc') {
		if(!in_array($fetch_type,array('assoc','row','array')))
			$fetch_type='assoc';
		$fun='mysql_fetch_'.$fetch_type;	//可变变量，保存的是匹配字符串的名字
		$result=$this->query($sql);			//执行SQL语句
		$rs=array();						//声明一个空数组，用来保存匹配的字符串
		while($rows=$fun($result)){
			$rs[]=$rows;
		}
		return $rs;
	}
	/**
	*匹配数据库中一条数据
	*/
	public function fetchRow($sql,$fetch_type='assoc') {
		$result=$this->fetchAll($sql,$fetch_type);
		return isset($result[0])?$result[0]:null;
	}
	/**
	*获取一行一列的数据
	*/
	public function fetchColumn($sql) {
		$result=$this->fetchRow($sql,'row');
		return $result[0];
	}
}

	//测试
	$config=array(
		'pwd'=>'123456',
	);
	$db=MySQLDB::getInstance($config);
	$result=$db->fetchColumn('select count(*) from products');
	echo '<pre>';
	var_dump($result);
	?>