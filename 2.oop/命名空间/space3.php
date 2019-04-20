<?php

  // php 空间
  namespace php\php6;

  // class
  class Person{
    public function __construct(){
      echo 'php\php6.php Person <br>';
    }
  }

  // function
  function var_dump($var){
    echo $var .'<br>';
  }

  const ROOT = 'www.lulongwen.com';


  class Person2{
    public function __construct(){
      echo 'php\php6-Person2.php Person';
    }
  }

  function var_dump2($var){
    echo $var;
  }

  // 使用的是当前空间的函数 var_dump();
  var_dump2('php6 hello');

  // 使用的是全局空间的函数 \ 反斜杠代表全局空间
  \var_dump('fullSpace hello');
?>