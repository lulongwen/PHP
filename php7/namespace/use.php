<?php

  // ui 命名空间，后面的代码属于 ui 这个空间
  namespace design\ui;
  require_once 'space3.php';


  // use php\php6; // 没有取别名，默认就是 php6
  // 想导入空间，就要先把 space3.php 文件加载到当前文件，再导入
  // new php6\Person();



  // as 别名
  use php\php6 as php;
  new php\Person();

?>