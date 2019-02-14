<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/12/6
   * Update: 2017年12月8日22:31:16
   * description: 基础控制器，用来封装控制器类的公共方法
   */

  class Controller{
    protected $smarty;

    public function __construct(){
      require './framework/vendor/smarty/Smarty.class.php';

      $this->smarty = new Smarty();
      $this->smarty -> left_delimiter = '<{';
      $this->smarty -> right_delimiter = '}>';
      $this->smarty -> setTemplateDir('view/tpl');
      $this->smarty -> setCompileDir('view/tpl_c');
    }
  }