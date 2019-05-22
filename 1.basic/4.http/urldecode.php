<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2019-04-20
   * Time: 12:54
   * description:
   *  urlencode() 转码 转 unicode 编码
   *
   *  urldecode() 解码
   */

  header('content-type:text/html; charset=utf-8');

  $str = '月亮，你好';

  // 转 unicode 编码
  $str_encode = urlencode($str);

  echo '<pre>';
  var_dump($str_encode);


  // 解码
  echo '中文解码 => '. urldecode($str);

  $str_decode = urldecode('%E5%8C%97%E4%BA%AC%E4%BD%A0%E5%A5%BD');
  $str_decode = urldecode('%E6%9C%88%E4%BA%AE%EF%BC%8C%E4%BD%A0%E5%A5%BD');

  echo '<pre>';
  var_dump($str_decode);


  // rawurldecode 解码
  // $str_raw = rawurldecode($str_decode);
  $str_raw = rawurldecode('%E5%8C%97%E4%BA%AC%E4%BD%A0%E5%A5%BD');
  echo '$str_raw '. $str_raw;
