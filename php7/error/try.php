<?php

  try{
    echo '代码运行正常'; // 正常的代码
    // 如果遇到意外情况
    throw new Exception('<br> 这是个意外');

  }catch(Exception $error){
    // 捕获异常信息
    echo $error-> getMessage();

    // 提供备选方案
    echo '<br> 打个车去上班';
  }

?>