<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/28
   * Time: 15:54
   * description: referer 防盗链
   *
   * Date: 2019-04-20
   * Time: 13:13
   */

  $attr = strtoupper('http_referer');

  $referer = isset($_SERVER[$attr]) ? $_SERVER[$attr] : '';

  if ($referer && strpos($referer, '127.0') === 0) {
    exit('<a href="index.html">想盗链，重新玩</a>');
  }

  // 不是盗链
  echo '可以访问';