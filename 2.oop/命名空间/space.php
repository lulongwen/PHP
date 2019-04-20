<?php

  // php 空间，后面的代码属于 php7这个空间
  namespace php\php7;

  require_once 'space2.php';

  // class
  class Person{
    public function __construct(){
      echo 'space.php __construct';
    }
  }

  // function
  function myfn(){
    echo 'space.php myfn 函数<br>';
  }

  /** const 定义常量效率比 define快很多
   *  php5.3之后使用 const在类外面定义常量
   */
  const ROOT = 'CONSTspace.php';


  // 当前空间 php7
  $p1 = new Person();
  var_dump($p1);

  myfn();

  echo ROOT;


  // web空间，后面的代码都属于 web空空间
  $p1 = new \web\Person();
  var_dump($p1);

  \web\myfn();

  echo \web\ROOT;

?>