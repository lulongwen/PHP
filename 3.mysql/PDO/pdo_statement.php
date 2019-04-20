<?php

  // 实例化 PDO对象，; 分号中间不要有空格
  $dsn = "mysql:host=127.0.0.1;dbname=db2;port=3306;charset=utf8";
  $user = 'root';
  $password = 'root';
  $pdo = new PDO($dsn, $user, $password);


  // use表不存在，看 pdo如何处理错误
  $sql = "SELECT * FROM `use`";

  $pdo_statement = $pdo-> prepare($sql);
  // 一定要执行，才能获得 sql语句的错误提示
  $pdo_statement-> execute();

  $error = $pdo_statement-> errorInfo();

  echo '<pre>';
  var_dump($error);
?>