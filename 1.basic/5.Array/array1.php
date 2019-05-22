<style>
    body{
        font-family:'fira code meduim';
        font-size: 30px;
    }
</style>
<?php
    header('content-type:text/html;charset=utf-8');

    echo '<h1>PHP 数组的函数</mark></h1>';

    // print_r()  & var_dump(); 打印数组，同时显示数据类型

    /** count() 数组的长度
     * 空数组返回 0
     */
    $arr = array();
    echo count($arr) .'<hr>';


    // is_array()  // 判断是不是 数组
    $array = array('ok', 200);

    if( is_array($array) )
        echo '是数组';
    else
        echo '不是数组';

    echo '<hr>';



    /****************************************/

    echo '<h2>PHP 数组的特点： <mark>PHP数组是可以动态增长的</mark></h2>';

    for($i =0; $i < 100; $i++){
        // 如果没有指定数组的下标 key，默认从 0开始增长
        $arr[] = $i;
    }
    echo '<pre>';
    print_r($arr);



    // 数组如果指定下标， 就会从指定的值开始递增
    $myarr[2] = 200;
    $myarr[] ='ok';  // 3

    echo '<pre>';
    print_r($myarr);

    var_dump($myarr);



?>