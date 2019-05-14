<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/28
   * Time: 11:16
   * description: $_SERVER 所有的 http请求消息都会封装到 $_SERVER 里面
   *
   */

  echo '<pre>';
  var_dump( $_SERVER );
  echo '</pre>';


  // 禁止 192.168 访问
  $attr = strtoupper('remote_addr');
  $remote_addr = $_SERVER[$attr];

  echo '<br> URL是： '. $remote_addr;

  /** strpos() 查找字符串首次出现的位置
   * strpos($remote_addr, '192.168');
   * 该函数判断 $remote_addr中是否含有 192.168
   *  - 如果有，就返回一个值，表示在 $remote_addr中的第几个位置
   *  - 返回 0，表示，开头就出现
   *
   * 扩展：
   *  - 可以通过这个封杀 IP
   *  - 如果有人在1分钟内，连续访问该页面10次，就封杀该 IP
   *  - 思路：使用数据库，变量，时间限制
   */

  if( !$remote_addr ) die('你的地址有问题，拒绝访问');
  else if( strpos($remote_addr, '192.168') ===0 )
    die('非法访问，已禁止');

  echo '<mark> 通过验证 </mark>';