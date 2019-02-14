<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/12/6
   * Update: 2017年12月9日22:31:56
   * description:
   */

  namespace framework\core;


  class Framework{
    public function __construct(){
      // path
      $this->_getPath();

      /**
       * 一个函数的参数是回调函数，就直接写函数进去；
       * 函数的参数是一个对象的话，需要传递数组进去
       *  - 参数1 对象
       *  - 参数2 对象的方法
       */
      spl_autoload_register(array($this, '_initAutoload') );

      // 配置文件要先加载
      $cfgFramework = $this->_configFramework();
      $cfgCommon = $this->_configCommon();
      // 超全局的数组，使用不受作用域限制
      $GLOBALS['config'] = array_merge($cfgFramework, $cfgCommon);

      $this->_initMCA();

      // 因为 常量MODEL 是在 _initMCA 之后才有的，所以要放在 _initMCA后面
      $cfgPath = $this->_configPath();
      $GLOBALS['config'] = array_merge($GLOBALS['config'], $cfgPath);

      $this->_dispatch();
    }


    // 自动加载执行的函数
    private function _initAutoload($className){
      // echo '<br>需要 class：'. $className;
      /**
       * 根据提示的类名，解析出new 的类所在的路径
       * admin\controller\categoryController
       * \ 反斜线需要转义为 /，思路：
       * 1. 将带有命名空间的类分隔开， explode
       * 2. 根据分割的第一个元素，确定加载目录
       * 3. 确定 application，framework的子目录
       * 4. 确定文件名
       */

      // echo '需要 class: '. $className .'<br>';

      // 1. 将带有命名空间的类分隔开， explode
      $arr = explode('\\', $className);
      $spacePath = implode('/', $arr);

      // 2. 根据分割的第一个元素，确定加载目录
      if($arr[0] == 'framework')
        $basicPath = './';
      else
        $basicPath = './application/';

      /** 3. 确定文件名
       * - 类文件的后缀是 .class.php
       * - 接口文件的后缀是 .interface.php
       * - 如何判断？判断最后的元素是不是 i开头，接口都以 i开头
       *   framework\dao\iPDO;
       */
      $suffix = substr( $arr[count($arr)-1], 0, 1) == 'i';
      if($suffix)
        $postfix = '.interface.php';
      else
        $postfix = '.class.php';

      $classFile = $basicPath.$spacePath.$postfix;

      // load,如果不是按照我们命名空间规则定义的，说明不是我们需要加载的类，不用加载
      if(file_exists($classFile) )
        require_once $classFile;
    }


    // 确定 MCA
    private function _initMCA(){
      // ? 访问前台 & 后台
      $m = isset($_GET['m']) ? $_GET['m'] : $GLOBALS['config']['defaultModel'];
      // ？那个控制器
      $c = isset($_GET['c']) ? $_GET['c'] : $GLOBALS['config']['defaultController'];
      // ？访问控制器的哪个操作
      $a = isset($_GET['a']) ? $_GET['a'] : $GLOBALS['config']['defaultAction'];

      define('MODEL', $m);
      define('CONTROLLER', $c);
      define('ACTION', $a);
    }


    // 实例化对象，调用方法
    private function _dispatch(){
      $controller_name = MODEL.'\controller\\'.CONTROLLER. 'Controller'; // 控制器

      // 先加载控制器类，再实例化对象
      $controller = new $controller_name;

      // 调用控制器方法
      $action = ACTION;
      $controller->$action();
    }


    // 加载 framework的配置文件
    private function _configFramework(){
      $arrFramework = require_once './framework/config.php';
      return $arrFramework;
    }



    // 加载 application common 的配置文件
    private function _configCommon(){
      // 公共的配置项可能没有，没有就返回空数组，否则 merge会出错
      $arrCommon = './application/common/config.php';
      if(file_exists($arrCommon) )
        return require_once $arrCommon;
      else return array();
    }


    // 加载 admin & home的配置文件
    private function _configPath(){
      // admin & home配置项可能没有，没有就返回空数组，否则 merge会出错
      // 加载 admin & home 取决于 常量 MODEL
      $arrPath = './application/'.MODEL.'/config.php';

      if(file_exists($arrPath) )
        return require_once $arrPath;
      else return array();
    }


    // 获取路径常量
    private function _getPath(){
      // 项目的根目录
      $root = str_replace('\\', '/', getcwd() );
      define('ROOT_PATH',  $root);

      // application path
      define('APP_PATH',ROOT_PATH.'/application/');

      // framework path
      define('FRAMEWORK_PATH', ROOT_PATH.'/framework/');
    }
  }
























