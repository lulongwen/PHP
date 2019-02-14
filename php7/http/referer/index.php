<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/28
   * Time: 15:54
   * description: referer 防盗链
   */

  $attr = strtoupper('http_referer');
  $referer = isset($_SERVER[$attr]) ? $_SERVER[$attr] : '';

  if( $referer && strpos($referer, 'http://www.blog.com') ===0 ){
    echo '<a href="index.html">想盗链，重新玩</a>';
    exit;
  }

  // 不是盗链
  echo 'OK 啦！';
