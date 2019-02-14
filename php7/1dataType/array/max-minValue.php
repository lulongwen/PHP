<style>
    body{
        font-family:'fira code meduim';
        font-size: 30px;
    }
</style>
<?php
    header('content-type:text/html;charset=utf-8');

    echo '<h1>数组找最大值和最小值以及下标</h1>';
    /** 思路：
     *
     * 1. 我认为第一个数就是最大的值，最大值的下标就是 0；
     * 2. 遍历数组
     * 3. 如果有的值比第一个值大，第一个值就等于这个最大值
     *
     */

    $arr = array(20, 50, 600, -100, 0, 99);

    // 最大值
    $max_val = $arr[0];
    $max_index = 0;

    // 最小值
    $min_val = $arr[0];
    $min_index = 0;

    foreach($arr as $key => $val){

        // 如果有一个数比我认为的这个数还大，最大数就等于这个数
        if($max_val < $val){
            $max_val = $val;
            $max_index = $key;

        }else if($min_val > $val){
            $min_val = $val;
            $min_index = $key;
        }
    };

    echo '最大值是： <mark>' .$max_val. '</mark><br>';
    echo '最大值的下标是： <mark>' .$max_index. '</mark><br>';
    echo '<hr>';

    echo '最小值是： <mark>' .$min_val. '</mark><br>';
    echo '最小值的下标是： <mark>' .$min_index. '</mark><br>';
    echo '<hr>';


    // 求 奇数的平均值
    $even = array(19, 3, 5, 6, 8 ,12 ,15);
    $num =0;
    $size = 0;
    // 首先判断这个数是不是奇数

    foreach($even as $val){
        if( $val %2 ){
            $size ++; // 看看有几个奇数

            $num += $val; // 求奇数的和

            echo '<br>不是基数'. $val;
        }
    };
    echo '<br>奇数的平均数是： <mark>' .$num/$size. '</mark><br>';





?>