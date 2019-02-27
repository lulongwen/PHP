<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/12/8
   * Time: 9:52
   * description: 接口规范
   */

  namespace framework\dao;


  interface iPDO{
    // 查询一条记录
    public function fetchOne($sql);

    // 查询所有记录
    public function fetchAll($sql);

    // 查询字段的值
    public function fetchColumn($sql);

    // 执行增删改操作
    public function exec($sql);

    // 引号转义包裹
    public function quote($val);

    // 查询刚刚插入的数据的主键，一般是 ID
    public function lastInsertId();
  }