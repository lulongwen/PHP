
<?php
/* PHP 运算 - 逻辑运算

    and  逻辑与，$x and $y , $x和$y 都为真，返回 true，

    &&  逻辑与，$x or $y , $x和$y 都为真，返回 true，2个必须都为true，返回 true

    or  逻辑或，$x or $y , $x和$y 都为 false，返回 false，有一个为真，返回 true

    ||  逻辑或，$x || $y , $x和$y 都为 false，返回 false，有一个为真，返回 true

    | or

    !   逻辑非 ，取反，即 true变为 false，false变为 true

    xor  逻辑异或，$x xor $y , 相同为 false， 相异为 true
        - 如果 $x 和 $y 相同，返回 false， 不相同 返回 true
   
*/

    $x= 8;
    $y = '8';

    if( $x== $y) echo '$x 等于 $y' .'<br>'; // 1 PHP里面 true返回 1

        
    if($x === $y){
        echo '$x 全等于 $y';  // 1 PHP里面 true返回 1
    }else{
         echo '$x 不全等于 $y';  
    }


    $foo = false;
    $bar = true;
    //逻辑或，有一个为真则为真
    if($foo || $bar){
        echo '这是对的';
    }else{
        echo '这是不对的';
    }
    
    echo '<hr>';
    if($foo xor $bar ){
        echo " xor 两个不相同返回 true";
    }else{
        echo "xor 2个相同返回 false";
    }

    echo '<hr>';
    if($x xor $y ){
        echo " xor 两个不相同返回 true";
    }else{
        echo "xor 2个相同返回 false";
    }


    // && 与 & 的区别




    // || 与 | 的区别
    echo '<br>';
    $x = false;
    $y = 2;
    // if($x | $y++){
    //     echo '真';
    // }else{
    //     echo '假';
    // }
    //自己运行对比结果
    // echo $y .'<br>';

    if($x || $y++){
        echo '真';
    }else{
        echo '假';
    }
    echo $y .'<br>';


    /*
        如果 defined('AUTH') 存在常量，就为 true
        不访问后面的 exit()，如果为 false 就执行 exit() 

        defined('AUTH') or exit('存在安全因素禁止访问');
            - exit() 停止执行，退出，后面的PHP代码不再执行了，用法
                + 直接 exit() 就是直接退出
                + exit('提示内容') 退出时给出提示
    */  




    
?>