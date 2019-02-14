<?php
    /** 函数说明
     * @author : longwen
     * @date ： 2017年10月28日10:20:16
     *
     * @param $num1 ： 输入的第一个数值
     * @param $num2 ： 输入的第二个数值
     * @param $oper ： 输入的运算符
     *
     * @return float|int ： 返回运算的结果
     */
    function operFun($num1, $num2, $oper){
        $result = 0; // 定义一个变量存放结果

        // 通过判断运算符来决定进行的操作
        if( $oper == '+' ){
            $result = $num1+ $num2;

        }else if( $oper == '-' ){
            $result = $num1 - $num2;

        }else if( $oper == '*' ){
            $result = $num1 * $num2;

        }else if( $oper == '/' ){
            $result = $num1 / $num2;
        }

        // 返回结果
        return $result;
    };

?>




















