<?php
    header("content-type:text/html;charset=utf-8");

    // 1 引入 operFun.php 公共函数
    require './operFun.php';

    // 2 定义运算方式
    $num1 = 20;
    $num2 = 30;
    $oper = '/';

    // 3 调用函数
    $res = operFun($num1, $num2, $oper);

    echo "<h1>计算结果是= $res </h1>";
?>




















