<?php

  // 设置时区
  date_default_timezone_set('PRC');
  /**
   * 访问该 php页面的时候，就把访问的时间保存到 cookie中，便于以后访问能够获得这次访问的时间
   * 一般cookie有效期为 7天 7*24*3600
   *  24 一天 24小时
   *  3600 1小时 3600秒
   * 
   * cookie 使用细节：
   *  设置cookie，setCookie前面不能有任何输出，如 echo，var_dump()等
   */

  $time_format = 'Y-m-d H:i:s';
  if( !isset($_COOKIE['last_time']) )
    echo '第一次访问： '.date($time_format, time() );
  else
    echo '上一次访问的时间是： '. date($time_format, $_COOKIE['last_time'] );


  // 
  setCookie('last_time', time()+ 7*24*3600);

  

?>