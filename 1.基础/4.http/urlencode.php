<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/28
   * Time: 11:16
   * description: 中文编码 解码
   *
   * urlencode()  中文 转 unicode
   * urldecode()  unicode 转 中文
   */

  $str = '世界很大';

  // 转 unicode 编码
  $str_encode = urlencode( $str );
  echo '<br>'. $str_encode;

  // 转 中文 解码
  $str_decode = urldecode( $str_encode );
  echo '<br>'. $str_decode;


  // 解码
  $str_raw = rawurldecode( $str_encode );
  echo '<br>'. $str_raw;