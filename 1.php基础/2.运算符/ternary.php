
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


  $a = 'ok';

  $a = $a ? $a : 1; // a ? b: c, $a $a为true,返回 $a, 否则返回 1

  $a = $a ?: 1; // $a为true，返回 $a 否则返回 1，上面的简写

  $a = $a ?? 1; // 等价于 ?:, 区别 当  $a未定义时，?: 会报一个 未定义变量 的 notice错误级别
    




    
?>