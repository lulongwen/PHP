<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/22
   * Time: 11:10
   * description: const 常量
   *
   * interface中，可以有属性，但只能是常量，默认是public，但是不能用public显式修饰
   */

  interface iPerson{
    /** 接口中可以有常量，默认就是 public，但是不要用 public修饰
     * 定义常量时，必须给初始值
     */
    const My_PI = 3.14;

    // 接口不能包含普通的成员属性
    // public $name = 'hello'; // 错误的
  }

  // 输出常量
  echo 'π = '. iPerson::My_PI;


  // 类常量
  class Bank{
    // 税率， 定义常量时，必须给初始值
    const TAX_RATE = 0.08;

    const MY_ARR = array('rate' => '0.08', 'copyright' => 'PHP');

    public function getTax($salary){
      $pay = $salary * self::TAX_RATE;

      echo '<br> 税额是： '. $pay .'元';
    }
  }

  $pay = new Bank;
  $pay->getTax(8000);

  // 常量不能修改
  // Bank::TAX_RATE = 1; // 报错

  class Shop extends Bank{ }

  // 可以访问常量，但不能修改
  echo '<br>'.Shop::TAX_RATE;
  echo '<br>'.Shop::MY_ARR['copyright'];


