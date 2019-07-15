<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2019-04-20
   * Time: 13:13
   * description:
   * 获取所有的http请求的消息头(拒绝对192.168 服务)
   *  http的消息头，都会被封装到 $_SERVER (预定义超全局数组)
   *  拒绝对192.168 服务
   *  $remote_addr = $_SERVER['REMOTE_ADDR']
   *
   * IP ::1
   *  说明你的电脑开启了ipv6支持,这是ipv6下的本地回环地址的表示。
   *  因为你访问的时候用的是localhost访问的，是正常情况。
   *  使用【ip地址访问】或者【关闭ipv6支持】都可以不显示这个
   */

  header('content-type:text/html; charset=utf-8');


  // 获取 IP地址 $_SERVER['REMOTE_ADDR']
  // 拒绝对192.168 服务
  $remote_addr = $_SERVER['REMOTE_ADDR'];
  echo '<br> 地址是： '. $remote_addr .'<br>';


  /**
   * strpos — 查找字符串首次出现的位置
   *
   * strpos($remote_addr, '192.168')
   * 该函数可以判断 $remote_addr 中是否含有'192.168'
   *  有就会返回一个值，表示在 $remote_addr串的第几个位置,
   *  0表示，开头【就出现 .】
   *
   */
  // 屏蔽本地的IP
  // if ($remote_addr == '' || strpos($remote_addr, '127.0') === 0) {
  if ($remote_addr == '' || strpos($remote_addr, '192.168') === 0) {
    exit('你的IP地址有问题，拒绝服务！');
  }

  echo '正常显示的页面';











