<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/12/4
   * Time: 17:29
   * description: 工厂类
   *  - 功能是根据用户传递的模型类，返回单例模型对象
   */

  class Factory {
    /**
     * 定义公共的静态方法
     * $name 传入类名 class
     */
    public static function Models($modelName){
      /**
       * 每次调用 Models就会先创建一个空数组，实例化之后就销毁了数组；
       * 第二次调用的时候，不知道已经实例化对象了，所以，还会创建新的空数组进行实例化；
       * 所以我们需要将数组定义为 静态变量
       * 这样再脚本周期内会将数组的值保存在内存中
       */
      static $model_array = array();
      if( !isset($model_array[$modelName]) ){
        $model_array[$modelName] = new $modelName;
      }
      return $model_array[$modelName];
    }
  }


  // 测试工厂模式是否生成单例对象
  /*class UserModel{}

  $m1 = Factory::Models('UserModel');
  $m2 = Factory::Models('UserModel');
  $m3 = Factory::Models('UserModel');

  echo '<pre>';
  var_dump($m1, $m2, $m3);*/








