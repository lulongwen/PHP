<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/12/4
   * Time: 17:29
   * description: 基类
   *  - 各个模型类中的公共代码
   */


  namespace framework\core;
  use framework\dao\DAOPDO;

  class Model {
    protected $pdo;
    protected $tableName;

    public function __construct() {
      $this->_initDAOPDO();
      $this->_initTableName();

      // 由于该构造方法会被具体的模型继承过去，所以 $this->logicTable 会获得
      // echo $this->logicTable;
    }

    // 初始化数据库链接
    private function _initDAOPDO(){
      $options= $GLOBALS['config'];
      $this->pdo = DAOPDO::getSingleton($options);
    }


    // 初始化 tableName
    private function _initTableName(){
      // 表的名字 = 表的前缀 + 表名
      $this->tableName = '`'.$GLOBALS['config']['tablePrefix'].$this->logicTable .'`';
      // echo $this->tableName;
    }


    // insert SQL
    public function insert($arr){
      /**
       * 1 整体思路： 根据传入的数组，拼接完整 sql语句
       * "INSERT INTO `tableName` (`goods_name`,`good_price`) VALUES('红苹果',888)";
       */
      $sql = "INSERT INTO $this->tableName";

      /** 2 拼接字段列表
       * - array_keys($data); 获取数组下标，返回值是 下标组成的数组
       * - array_map() 遍历数组
       */

      $filed_key = array_keys($arr);
      $keys = array_map(function($v){
        return '`'.$v.'`';
      }, $filed_key);
      $keys = '('. implode(',', $keys). ')';

      $sql .= $keys;

      /** 3 拼接 VALUES()
       * 安全过滤，插入数据前，将引号转义，调用 $this->pdo->quote()
       */
      $filed_val = array_values($arr);
      $values = array_map(array($this->pdo, 'quote'), $filed_val);
      $values = ' VALUES('. implode(',', $values) .')';

      $sql .= $values;
      // var_dump($sql);
      // 4 执行sql语句，并返回主键的值
      $this->pdo->exec($sql);
      return $this->pdo->lastInsertId();

    }
  }












