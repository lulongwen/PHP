<?php

  // php 空间
  namespace php\php7;

  // function
  function var_dump($var){
    echo $var;
  }

  // 使用的是当前空间的函数 var_dump();
  var_dump('current hello');

  // 使用的是全局空间的函数 \ 反斜杠代表全局空间
  \var_dump('fullSpace hello');
?>