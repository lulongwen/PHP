<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/12/4
   * Time: 17:29
   * description: 基类
   *  - 各个模型类中的公共代码
   */

  class Model {
    protected $dao;

    public function __construct() {
      require_once 'DAOPDO.class.php';

      $options= array(
        'host' => '127.0.0.1',
        'user' => 'root',
        'password' => 'root',
        'dbname' => 'db2',
        'port' => '3306',
        'charset' => 'utf8'
      );
      $this->dao = DAOPDO::getSingleton($options);
    }
  }