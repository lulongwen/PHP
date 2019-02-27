<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/30
   * Time: 17:33
   * description: PHP 安全
   *
   * 第一个参数： 要加密的字符串
   * 第二个参数：加密的算法
   *  default becreade算法
   *  password_hash();
   */

  $hash = password_hash('password', PASSWORD_DEFAULT);
  /**
   * 加密的深度，默认是 10，
   * password_hash('password', PASSWORD_DEFAULT, ['cost' => 12]);
   *
   * 其他加密算法
   * password_hash('password', PASSWORD_BCRYPT, ['cost' => 12])
   *
   */

  echo '<pre>';
  var_dump( $hash );


  // 判断字符串和 加密的是否一样
  if( password_verify('password', $hash) )
    echo '密码一致，通过验证';
