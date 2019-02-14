<style>
    body{
        font-family:'fira code meduim';
        font-size: 30px;
    }
</style>
<?php
    header('content-type:text/html;charset=utf-8');

    /** 遍历数组的方法
     * foreach()
     * while() 循环
     * for() 循环
     *
     * foreach() 语法
     * foreach( $arr as $key => $val){ }
     * foreach( $arr as $val){ }
     */

    /** 为加强大家对数组的理解，我们再给大家出一个题，我们一起完成.
     * 在运动会上，五个小孩比赛滑轮，他们的滑完100米,分别用了10s、12s、5.7s、9s、14s,
     * 请编写一个程序,计算他们的平均时间?
     * 时间保留到小数点后两位
     *
     * 分析：平均时间 = 总时间/多少个人
     */
    $arr = array(10, 12, 5, 3.8056, 5.585, 9, 200);

    echo 'foreach: ';
    $total = 0;
    $arr_size = count($arr);

    foreach($arr as $val){
        $total += $val;
    };
    echo 'foreach 平均时间是：'. round($total/$arr_size, 2);
    echo '<hr>';



    echo 'while 循环: ';
    $time =0;
    $i =0;

    // 如果 i 小于数组的长度，进入 while循环
    while($i < $arr_size){
        $time += $arr[$i];
        $i++;
        echo $i;
    }
    echo 'while 平均时间是：'. round($time/$arr_size, 2);
    echo '<hr>';


    # HTML中 强烈推荐的 foreach写法
    /**
     * <?php foreach($arr as $key=>$val):?>
     *   // 优点：endforeach; 直观展示
     * <?php endforeach;?>
     * 
     * 
     * # 不太推荐的写法
     * <?php foreach($arr as $key=>$val){?>
     *   // 缺点：花括号不好找结束的标签
     * <?php }?>
     */
    


?>