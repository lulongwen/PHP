<?php

  /**
   *  参数就是函数的名字
   */
  session_set_save_handler('open', 'close', 'read', 'write', 'destroy', 'gc');

?>