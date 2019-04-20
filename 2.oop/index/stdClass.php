<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/23
   * Time: 14:56
   * description: stdClass 标准类，可以让变量成为一个object
   */

    $obj = new stdClass;
    $obj->name = '姬禾司';
    $obj->age = '23';
    $obj->address = '裴定';

    echo '<pre>';
    var_dump($obj);
