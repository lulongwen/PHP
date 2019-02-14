<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/12/1
   * Time: 9:54
   * description: exit 和 die的区别
   *  1. die() 是 exit()函数的别名，exit() 和 die() 都指向 exit()函数
   *  2. 遇到错误，退出程序时输出内容，用die()，给 die('string') 传入一个字符串作为提示信息
   *
   *
   *  3. 直接退出脚本，不输出内容，用 exit()
   *      exit(0) 提前退出程序
   *      exit(1) 非正常运行导致退出程序
   *
   *  4. die() & exit() 在PHP内部处理是完全一样的，只是名字不同，效果都是一样的，没有所谓的退出不退出内存
   *
   *  5. 在设计工具类和工具函数时，die()/exit() 应该严令禁止，因为它们无权决定整个程序的生死
   */

  echo 'hello world';

  // die('<br> 退出');
  // exit(0);

  exit(1);

  echo 'new line new text';


  // var_dump( token_get_all('<?php echo; ?>') );

