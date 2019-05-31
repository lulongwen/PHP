<?php

  // php 空间，后面的代码属于 php7这个空间
  namespace php\php7;

  // class
  class Person{
    public function __construct(){
      echo 'space.php __construct';
    }
  }

  // function
  function myfn(){
    echo 'php7 myfn 函数<br>';
  }

  /** const 定义常量效率比 define快很多
   *  php5.3之后使用 const在类外面定义常量
   */
  const ROOT = 'space.php';


  // 当前空间 php7
  $p1 = new Person();
  var_dump($p1);

  \var_dump('php7下面的全局空间');

  myfn();



  // web空间，后面的代码都属于 web空间
  namespace web;

  function var_dump($val){
    echo $val;
  }

  var_dump('web namespace');

  \var_dump('全局空间');

  const ROOT = 'web CONST ROOT';
  echo ROOT;

?>