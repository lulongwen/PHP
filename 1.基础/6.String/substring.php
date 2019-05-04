
<?php
    header('content-type:text/html; charset=utf-8');
    /** 字符串截取
     * utf-8里面
     *  PHP一个汉字 3个字节
     *  JS 是按 2个字符
     */

    $str = 'abcde神度ghr';

    echo $str[0] .'<br>'; // a
    echo $str[6] .'<br>'; // 乱码, php中，下标是按照字节截取字符串的
    echo $str[12] .'<br>'; // h

?>