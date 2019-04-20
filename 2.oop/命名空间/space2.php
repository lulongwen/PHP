<?php

  // web空间
  namespace web;

  // class
  class Person{
    public function __construct(){
      echo '<hr><mark>space2.php __construct</mark>';
    }
  }

  class Person2{
    public function __construct(){
      echo '<hr><mark>space222.php __construct</mark>';
    }
  }

  // function
  function myfn(){
    echo 'space2.php myfun<br>';
  }

  /** const 定义常量效率比 define快很多
   *  php5.3之后使用 const在类外面定义常量
   */
  const ROOT = 'CONST2.php';

?>