<?php
  header('content-type:text/html;charset=utf-8');
  /**
   * spl_autoload_register();
   *  - spl 标准的PHP标准库 Standard PHP Library
   *  - 可以重复执行多次
   *
   * 触发类的自动加载
      * new 类
      * 类::静态方法
      * 类 extends 类2，类2 不存在（继承了一个不存在的类）
   *    类 implements接口，接口不存在
   */

  spl_autoload_register('autoload');

  function autoload($className){
    echo '<br>需要： '. $className;
  }

  // new Person();

  // Cat::getTotal();

  // class Handsom extends Person{ }


  class DAOPDO implements DAO{ }


  /* 加载对象的方法
  class Framewrok
  {

    function __construct(argument)
    {
      $this->initAutoload();
    }

    public function initAutoload(){
      // 调用对象的方法 array( $this, 'autoload' )
      spl_autoload_register( array($this, 'autoload') );
    }

    public function autoload($className){

    }
  }
  */

