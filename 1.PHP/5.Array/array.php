
<?php
    /* 数据类型 - 数组 array
        数组是一个 复合类型
        - 数组声明是向 array() 里面插入一个或多个值，多个值的话，用逗号隔开 ,
        - 数组名 可以理解为 指向数组首地址的引用


        数组的特点：
        1. 数组可以存放任意类型的数据，除了资源类型
        2. 数组大小不必事先指定，可以动态增长
        3. 数组中的元素以 key => value 的形式存在
        4. 如果没有给数组指定 key，则取当前最大的整数索引值，而新的键名 就是将该值 +1

        为什么要用数组?
        - 如果变量很多，不利于数据的管理，使用新的数据类型-数组（就是多个数据的集合），把各个数据放在一起进行管理
    */
    $arr = array(10, 20.56, 'haha');
    
    var_dump($arr);

    echo '<br>'. $arr[2] .'<hr>';


    // 养鸡场求和
    $chicken = array(3,5, 12, 35, 200, 90 ,20);

    $number = count($chicken); // count() 数组的长度
    $res = 0;

    for($i=0; $i < $number; $i++){ // 遍历数组

        echo $chicken[$i] .'<br>';
        $res += $chicken[$i];
    }
    echo '<b>'. $res .'</b><br>'; // 求和
    echo '平均重量是：'. $res/$number; // 求平均

?>