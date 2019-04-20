
<?php
/* 流程控制 switch
    多路分支， switch 用法，代码简洁，整体美观
    - break的意思是结束当前分支，没有break; 会执行下一个case的代码
    - case 常量信息，case的值可以是：
        + 整型， 字符串，浮点数
        + 不能是表达式，比如 $i > 7

    switch(判断的常量){
        case 配置的信息:
            // 分支代码
            break; // 一定要 break;

        case 配置的信息:
            // 分支代码
            break; // 一定要 break;
        
        default:
            // 分支代码
            break;
    }
*/
    $i =7;

    switch($i){
        case 1:
            echo 'Monday';
            break;
        case 2:
            echo 'Tuesday';
            break;
        case 3:
            echo 'Wednesday';
            break;
        case 4:
            echo 'Thuresday';
            break;
        case 5:
            echo 'Friday';
            break;
        case 6:
            echo 'Saturday';
            break;
        case 7:
            echo 'Sunday';
            break;
        default:
            echo 'today is freeday';
            break;
    }
?>