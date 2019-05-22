
<?php
/* PHP 变量引用 &
   
  

*/

    $num =10;

    $bar = &$num; // 注意 &
    /*
        加上 & 后，把变量都指向了 一个存值空间
        不论是 $num 还是 $bar 任何一个值发生变化，
        $num 和 $bar 都会发生变化，因为指向的空间相同
    */


    echo $num .'<br>';
    echo $bar .'<br>';

    // 修改 $bar
    $bar = 'new 100';

    echo $num .'<br>';
    echo $bar .'<br>';
    
?>