<?php

  /**
   * 命名空间前面不能有任何代码
   */
  namespace php\php7;

  function var_dump($val){
    echo $val;
  }

  // use ;
  var_dump('hello'); // 当前空间的函数


  // 使用的是全局空间，使用 \ 表示全局空间
  \var_dump('world welcomeback');

?>