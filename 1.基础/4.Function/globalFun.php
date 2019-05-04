<?php
    header("content-type:text/html;charset=utf-8");

    // 函数的局部变量：就是在函数的内部定义，其作用域，就在函数内部
    function fun(){
        /**
         * 在函数内部先声明 global $a;
         *  - 就表示 函数内希望使用一个全局变量 $a;
         *  1. 如果存在这个全局变量 $a，就直接使用
         *  2. 如果不存在，就创建这个全局变量 $a, 默认是 0
         */
        global $a;
        $a = $a + 100;
    }
    fun(); // 不执行函数得不到全局变量

    echo "<h1> \$a: {$a} </h1>";
    echo '<br>';


    // global $b
    $b =200;
    function add(){

        // 表示在 function add 范围内，使用函数外面的 $b
        global $b;
        $b += 30;
    };
    add(); // 230

    echo "<h2> \$b: {$b} </h2>";
    echo '<br>';


    // global $c
    $c = 60;
    function summer($c){
        $c += 100;
    };
    summer($c); // 60

    echo '<h2> $c: '. $c . '</h2>';
    echo '<br>';


    function inside(){
        // 没有作用域，Undefined variable
        $c += 100;
        echo 'inside $c: '. $c;
    };
    inside();
?>




















