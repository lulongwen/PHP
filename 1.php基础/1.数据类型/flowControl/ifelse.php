
<?php
/* 流程控制
    - 单分支 if(){} 
    if(true) // true，后面没有花括号，只能写一行代码

    - 双路分支 if(){} else{}

    - 多路分支
        if(){}
        else if(){}
        else if(){}
        else{}

    

    if(条件表达式){ // 如果表达式 为true， 进入分支
        // true，执行的代码
    }
*/
    $bool = 3;

    // 单分支
    if($bool > 2) echo '哈哈，这是true';

    // 双分支
    if($bool >3){
        // true 执行的代码
        echo '$bool 大于3';
    }else{
        // false 执行的代码
        echo '$bool 小于3';
    }
?>