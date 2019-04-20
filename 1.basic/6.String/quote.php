
<?php
  
  /** 字符串的引用
   * & 值引用
   *
   */

  $str = 'Hello';
  
  $num = $str;
  
  $num = 500;
  
  echo '<br>'. $str;
  echo '<br>'. $num;
  
  
  $arr = &$str;
  
  $arr = array('no1'=> '标题', 'no2' => '内容');
  
  
  echo '<pre>';
  var_dump($str, $arr);
  var_dump( $str == $arr);
?>