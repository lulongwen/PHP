<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/12/6
   * Update: 2017年12月8日22:31:16
   * description: 基础控制器，用来封装控制器类的公共方法
   */

  namespace framework\core;


  class Controller{
    protected $assign;

    public function __construct(){
      $this->_initTimezone();
    }


    protected function assign($attr, $val){
      return $this->assign[$attr] = $val;
    }


    protected function display($file){
      // echo APP_PATH;
      $file = APP_PATH.MODEL.'/view/'.$file;
      if(file_exists($file) ){  // if(is_file($file))
        extract($this->assign);
        include $file;
      }
    }


    // 初始化时区
    private function _initTimezone(){
      date_default_timezone_set('PRC');
    }
  }