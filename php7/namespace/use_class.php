<?php

  // ui 命名空间，后面的代码属于 ui 这个空间
  namespace design\ui;
  require_once 'space3.php';


  // 导入类
  use php\php6\Person;

  // 导入函数
  use function php\php6\var_dump;

  // 导入常量
  use const php\php6\ROOT;


  // 使用导入的类
  new Person();

  // 使用导入的函数
  var_dump('use function');

  // 使用导入的常量
  echo ROOT;

  echo '<hr><br>';


  // 将空间保存到变量里面，是动态语言的特性，例如
  // $isPerson = 'php\php6\Person'; // 限定名称，同目录下限定名称

  $isPerson = '\php\php6\Person'; // 完全限定名称

  // 使用
  new $isPerson;

?>