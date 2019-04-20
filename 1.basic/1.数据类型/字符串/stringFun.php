
<?php
    header('content-type:text/html; charset=utf-8');
    // 字符串输出函数

    // echo 输出字符串的结构，不能返回值， echo后面可以跟多个参数，之间用 , 逗号隔开
    $str = 'abcde神度ghr <br>';
    echo $str;
    echo 12, true, 'abc', '<h1>PHP高手都是从"Hello World"开始的</h1>';




    // print 返回值：总是返回 1， 只能有一个参数
    $res = print 'abc hello';
    echo $res .'<br>';
    var_dump($res); // 1

    echo '<br>';



    // printf 格式化输出内容，直接换变量就行了
    $name = 'longwen';
    $age = 90000;

    printf('my name is %s, age %d', $name, $age);
    echo '<hr>';



    // sprintf 格式化字符串，但是不输出
    $people = '宋江';
    $num = 108;
    $sal = 2000;
    $des = '<h1> 梁山有 %d 个人，老大是 %s, 工资是 %f</h1>';

    sprintf($des, $num, $people, $sal);

    $result = sprintf($des, $num, $people, $sal); //没有输出
    echo 'sprintf' .$result;
?>