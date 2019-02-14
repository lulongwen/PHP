
<?php
    header('content-type:text/html; charset=utf-8');
/* PHP 运算符

   三元运算符
   a ? b : c   a 为真返回b，否则 返回 c 

   `` 反引号中间出入命令，执行系统命令，等价于 shell_exec 函数

   @ 单行抑制错误，不让这一行的错误显示出来
        - 效率低，不建议使用

   => 数组下标访问符

   -> 对象访问符

   instanceof 判断某个对象是否来自某个类，是返回 true，不是返回false
   
*/

    $x = true;

    $x ? $y = 7 : $y = 20;
        echo $y . '<br>';

    echo `ipconfig`;

    echo '<hr>';

    $arr = array('baidu' => '百度', 'sohu' => '搜狐');
        echo $arr['baidu'];
   



    




    
?>