<?php
    header("content-type:text/html;charset=utf-8");

    $num1 = 10;
    $num2 = 20;
    $oper = '*'; // 定义一个运算符
    $result = 0 ; // 定义一个变量 $res寸放计算结果

    // 通过判断运算符来决定进行怎样的操作
    // 单个的 if 效率很低，所以不要 用很多单独的 if语句
    if( $oper == '+' ){
        $result = $num1+ $num2;

    }else if( $oper == '-' ){
        $result = $num1 - $num2;

    }else if( $oper == '*' ){
        $result = $num1 * $num2;

    }else if( $oper == '/' ){
        $result = $num1 / $num2;
    }

    echo "<h1>计算结果是= $result </h1>";
?>




















