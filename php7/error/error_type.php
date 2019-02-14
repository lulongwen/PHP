<?php

  // 设置 php.ini的错误日志保存地址
  ini_set('error_log', 'D:/temp/errors/error.log');
  ini_set('display_errors','off');

  // 屏蔽那些错误
  error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED);
  ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED);


  // notice 错误
  echo $name;
  echo 'aaa <br>';


  error_log('这是测试信息');


  //warning 警告
  gettype();
  echo 'bbb <br>';


  // fatal 致命错误
  var_dump('hello');

  mysql_connect('localhost', 'root', 'root');

?>