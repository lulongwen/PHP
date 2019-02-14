<?php

interface DAOInterface{

  // 查询一条数据
  public function fetchOne($sql);

  // 查询所有数据
  public function fetchAll($sql);

  // 查询一个字段的值
  public function fetchColumn($sql);

  // dml 增删改的操作
  public function exec($sql);

  // 引号转义包裹
  public function quote($val);

  // 查询最后插入的数据的主键 id
  public function lastInsertId();
}

?>