<?php
/* 变量就是把右边的值赋给左边
  PHP变量的特点：
    变量没有 var 关键词
    变量必须以 $ 开头，如变量x 必须要写成 $x

  变量命名规范：
    变量名要有语义化
    变量有字母，数字，下划线组成 _
    首字母不能以数字开头，但是数字可以夹在变量名中间和结尾
    变量名严格区分大小写
    变量不要使用特殊符号，中文，不能用中划线

  PHP 变量命名的方法
    驼峰 Camel
      $tbName = 'user';
      printEmployee();

    下划线
      $tb_name = 'user2';

    帕斯卡命名，大驼峰命名
      DisplayInfo();
      $UserName = 'lucy';

    匈牙利命名
      i_mysqli.class.php
      $g_name = 'lily';
 */
  
  $x = 5;
  $y = 6;
  $x = 20;

  $result = $x + $y;

  // echo 输出的意思
  echo $result;


  // 单行注释
  # 单行注释，用的少

  /*
    多行注释
    PHP注释和JS注释一样，注释通常写在代码上面
   */

?>