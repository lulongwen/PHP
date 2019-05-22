<?php
  /* 数据类型 - null
      空 null, 代表没有， null 不是false，不是 0， 也不是空格
      
      ## 会产生 null 的情况
      1. 一个变量没有给任何值
          $n = null;
  
      2. 通过变量赋值明确指定为 变量的值为 null
          $no;
  
      3. 使用函数 unset() 将变量销毁
  
  
      ## 知道了 null 产生的情况，学习 empty() & isset() 函数的区别
      empty()
          - 可以传参变量， 这个变量如果是 false 或 null 的话，返回 true
  
      isset()
          - 可以传参一个或多个变量，变量与变量之间用逗号 , 隔开，只要有一个变量为 null，
          就返回 false， 否则返回 true
          - unset()函数的功能就是销毁变量
              + unset() 传入想要销毁的变量，这个变量就会被销毁
  */
  
  
  // isset(var) 检测变量是否设置，并且不是 null, 只要不是 null都返回 true
  $n = null;
  var_dump( isset($n) ); // false
  
  $num = 0;
  var_dump( isset($num) );  // true
  
  $str = '';
  var_dump( isset($str) ); // true
  
  
  echo '<hr>';
  
  /** empty()
   * 如果设置过这个变量， 返回true 如果变量为空，返回 true
   * '', 0, '0', null, false, array(), var, $var 以及没有任何属性的对象都被认为是 空的；
   */
  $no;
  // echo $no; // 报错
  var_dump( empty($no) );  // true
  
  
  $number = 0;
  var_dump( empty($number) ); // true
  
  
  $arr = array();
  var_dump( empty($arr) );  // true
  
  
  $phone = '手机';
  var_dump(empty($phone)); // false
  
  unset($phone);
  var_dump( empty($phone) ); // true


?>