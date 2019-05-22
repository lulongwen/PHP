
<?php
/* PHP 查看和判断数据类型

    ## 查看数据类型
        var_dump() 显示类型，输出变量类型和值

        gettype() 得到类型，传入一个变量能获得变量的类型

    ## is_* 判断数据类型
    - 来判断某个东西是不是某个了类型
    - 如果是这个函数的类型，返回 true
    - 如果不是这个函数的类型，返回 false

        is_int() 是不是 整型
        is_bool() 布尔值
        is_float() 浮点型
        is_string() 字符串

        is_array() 数组  // 混合类型： 数组和对象
        is_object() 对象

        is_null() 是不是为空 // 特殊类型 null， resource ，回调 callback
        is_resource() 资源

        is_numeric() 数值类型
            参数是 数字和数字字符串 返回 true， 否则 false

        is_scalar() 标量
            参数是 标量，返回true， 否则 false
            标量包含 integer、float、string、boolean
            array、object、resource 不是标量

        is_callable() 函数

*/
    $float = 88.8;
    $str = 'lalala';
    $fn = function(){};
    // $type = gettype($float);
    $type = gettype($fn);
        echo $type .'<hr>';

    $me = is_string($str);
        echo $me .'<hr>';
   
    $p = 100;
    $n = is_null($p);
        echo $n .' $p'. '<br>';

    $str1 = '玩儿维吾尔无9234';
    $num = is_numeric($str1);
        echo $num .'$numeric';
    
    
    

?>