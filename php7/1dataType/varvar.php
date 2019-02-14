
<?php
/* PHP 可变变量
    - 可变变量是： 已声明的变量前，再加上变量符
        $title = 'header';
        $header = '这是标题';
        $$title; // $$title 就是可变变量，在已声明的变量 $title前加上一个变量符

*/

    $title = 'header';
    $header = 'myFirst';
    $myFirst = 'onlyvariable';

    echo $$title .'<br>';

    echo $$header;


    /* 可变变量的演变过程
        $$title =>
        ${$title} =>
        ${'header'} =>
        $header =>
    */ 
    
    

?>