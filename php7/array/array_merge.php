<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/12/10
   * Time: 18:26
   * description: array_merge() 合并数组
   */

  $arr = array(
    'host' => 'localhost'
  );


  $arr2 = array(
    'host' => '127.0.0.1',
    'user' => 'lulongwen',
    'password' => '123456'
  );

  // 后面的数组优先级要比前面的高，后面会覆盖前面的
  $config = array_merge($arr, $arr2);

  echo '<pre>';
  var_dump($config);