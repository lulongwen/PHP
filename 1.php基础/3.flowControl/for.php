
<?php
/* 流程控制 for循环
    for(初始表达式; 条件; 增量表达式){
        // 循环体代码
    }

    - break; // 结束 当前层 的循环
    - continue; 跳过本次循环，直接进入下一个循环

    - break n; n 是数值，表示针对外面第 n层循环都有起作用
    - continue n;
   
*/
    for ($i=0; $i < 10; $i++) { 
        # code...
        if( $i == 3 ) continue; // 跳过 3
        if( $i == 6) break; // 到这里结束循环
        echo $i .'<br>';
    }

    echo '<hr>';

    // break n; continue n;
    for($i =100; $i>=95; $i--){
        echo '<br><mark>'. $i .'</mark>';
        
        for ($j=1; $j<= 5; $j++) {
            // 当 $j ===3的时候，就停止 现在和外面的for循环
            // if($j ===3) break 2;
            if($j ===3) continue 2;
            echo '<br> '. $j;
        }
    }
?>