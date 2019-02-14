
<?php
/* PHP 数据类型转换
    
    ## 布尔值的自动类型转换
        0  false
        0.00  false
        ''  false
        '0'  false
        array()  false
        null  false
        未声明成功的资源也为 false

    - 整型的 0  false， 其它整型值都为 true，-20也是true
    - 浮点的 0.0  false，小数点后面只要有一个不是 0 就为 true
    - 空字符串  false， 只要里面有一个空格，就为 true
    - 字符串0  false， 其它都为真
    - 空数组  false， 只要里面只有一个值，就为true
    - 布尔值 false也是 false


    ### 自动转换和强制转换

*/
    $bool = 0;
    $bool = 0.001;

    $str = '';
    $str1 = ' ';
    $str2 = '0';
    $str3 = '0.00';

    $arr = array();

    $n = null;

    $false = false;

    $true = true;
    $result = $true + 20; // 布尔变整型参与运算

    echo $result;
    
    
    
    

?>