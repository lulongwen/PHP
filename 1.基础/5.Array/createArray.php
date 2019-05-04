<style>
    body{
        font-family:'fira code meduim';
        font-size: 30px;
    }
</style>
<?php
    header('content-type:text/html;charset=utf-8');

    /** 数组的三种创建方式 一 [] 下标指定值
     * PHP中数组是一组关键字key 和值value 的集合,
     * - 值可以是 除了 resource资源以外的其它值
     * - 数组是存放在内存中的
     *
     */
    $arr[0] = 3.6;
    $arr[1] = 'ok';
    $arr[2] = true;
    $arr[3] = 'good';

    var_dump($arr);
    echo '<hr>';


    // 对于数组下标不关联的数组用 forEach遍历， 不能用 for 循环
    echo '数组的陷阱: 索引数组的缺点 <br> <mark>下标不关联的数组可以打印出来，但不能for循环，要用 forEach</mark><br>';
    $arr1[0] =3.6;
    $arr1[1] = 'ok';
    $arr1[2] = true;
    $arr1[5] = 'today is sunny';
    var_dump($arr1);

    $arr1_size = count($arr1);
    for ($i =0; $i< $arr1_size; $i++){
        echo $arr1[$i];
    }

    foreach($arr1 as $key => $value){
        echo $key .' : '. $value .'<br>';
    };


    /** 数组的三种创建方式 二 直接赋值
     * 语法格式：array(2,3,5)
     *
     */
    $array = array(2,50, true, 'ok');
    var_dump($array);
    echo '<hr>';



    /** 3 数组的三种创建方式 key: value 指定 key值
     * array( key => value, key => value)
     *
     * - 如果指定 key键，那访问数组，就通过 key键访问
     * - 如果没有 指定 key键，那就从最大的那个键继续分配
     *
     * - key 是 整数 integer，称为 索引数组
     * - key 是 字符串 stirng， 称为 关联数组
     * - value 可以是 任意类型的值
     */
    $hero = array(
        'no1' => '宋江',
        'no2' => '岱宗',
        'no3' => '梁中书',
        300,
        '鲁智深',
        'no4' => '晁盖'
    );

    var_dump($hero);

    // 访问数组要用指定的 key
    echo $hero['no1']; // 宋江



























?>