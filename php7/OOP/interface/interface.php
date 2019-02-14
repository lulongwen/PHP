<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/22
   * Time: 11:10
   * description: interface 接口
   *
   * 接口不能被实例化
   */


  // 接口的初步使用，接口案例
  interface iPerson {
    // 写上方法
    public function say();
  }


  // 2 使用接口
  class Child implements iPerson {
    public function say() {
      echo '我上三年级了';
    }
  }

  $p1 = new Child();
  $p1->say();