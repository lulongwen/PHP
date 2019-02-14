<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/12/10
   * Time: 18:18
   * description: framework 配置
   *  - 数据库链接信息
   *  - 默认前后台信息
   *  - 常量信息
   *
   */


  return array(
    // 默认数据库配置
    'host' => 'localhost',
    'user' => 'root',
    'password' => 'root',
    'dbname' => 'db2',
    'port' => 3306,
    'charset' => 'utf8',
    'tablePrefix' => '',

    // 默认前后台配置
    'defaultModel' => 'home',
    'defaultController' => 'index',
    'defaultAction' => 'IndexAction'


  );