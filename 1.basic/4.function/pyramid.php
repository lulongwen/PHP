<style>
    body{
        padding: 50px;
        font-size: 50px;
        font-family: 'Fira Code Medium', '思源黑体';
        letter-spacing: 1.2px;
    }
</style>

<?php
    header('content-type: text/html; charset=utf-8');

    /** 打印金字塔 pyramid，假如是3层

           *    1层 打出 2 个空格 3-1 =2， 1个 * 2*0 +1
          ***   2层 打出 1 个空格 3-2 =1， 3个 * 2*1 +1
         *****  3层 打出 0 个空格 3-3 =0， 5个 * 2*2 +1

        思路 规律：先打空格，后打星号
     *  - 为什么乘以2 ，因为每层都比上次多2个
     */

    pyramid(9);
    function pyramid($n){

        for($i=0; $i < $n; $i++){ // 1 首先循环 $n

            for($j=0; $j< ($n-$i+1); $j++){ // 打空格
                // echo '-' ;
                echo '&nbsp;';
            }
            for($k=0; $k< (2*$i+1); $k++){ // 打 *
                echo '*';
            }

            echo '<br>';
        }
    };

?>





















