<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2019-04-20
   * Time: 13:09
   * description:
   */
  header('content-type:text/html; charset=utf-8');

  // 演示 http的状态码

  // 200
  echo '<br> hello, moon';

  // 告诉浏览器，重新定向到abc.html, 会返回302码
  // header('location: http.html');

  // 缓存文件
  header('refresh: 5; url=http.html');