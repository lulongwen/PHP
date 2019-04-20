<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/24
   * Time: 9:59
   * description: php 任务调度
   */

  class IndexAction{
    public function index(){
      echo 'index() <br>';
    }

    public function test($year=2016, $month=10, $day=12){
      echo $year. '***'. $month .'***'. $day. '<br>';
    }

    // 前置处理
    public function _before_index(){
      echo '<br> 前期处理。。。'. __FUNCTION__ .'<br>';
    }

    // 后置处理
    public function _after_index(){
      echo '<br> After后面的处理...'. __FUNCTION__ .'<hr>';
    }
  }


  /** 调度
   * IndexAction 中的方法和访问控制修饰符是不确定的
   *  - 如果 index方法是 public，可以执行 _before_index
   *  - 如果存在 _before_index 方法，并且是 public的，执行该方法
   *  - 执行 test 方法
   *  - 最后判断有没有 _after_index 方法，并且是public的，执行该方法
   */

  if( !class_exists('IndexAction') ){
    die('<mark>类不存在，无法执行调度</mark><br>');
  }
  /** 调度思路
   * 1. 创建一个 reflectionClass() 对象
   * 2. 判断是否有 index() 方法
   * 3. 创建一个 index() 方法
   *    - 判断是否有 _before_index
   *    - 调用 test() 方法
   *    - 判断是否有 _before_index
   */

  // 1 创建一个 ReflectionClass() 对象
  $reflect_obj = new ReflectionClass('IndexAction');

  // 2 判断是否有 index 方法
  if( !$reflect_obj->hasMethod('index') )
    die('<mark>没有index无法调用</mark>');

  // 有 index 方法的话，创建一个index 方法对象
  $reflect_method_index= $reflect_obj->getMethod('index');

  // 如果 index 方法不是 public，退出
  if( !$reflect_method_index->isPublic() )
    die('<mark>index 不是共有的，无法调用</mark>');
  else if( !$reflect_obj->hasMethod('_before_index') )
    die('<mark>_before_index, 没有这个方法</mark>');

  // 判断 _before_index 是不是 public
  $reflect_method_before = $reflect_obj->getMethod('_before_index');
  if( !$reflect_method_before->isPublic() )
    die('<mark>_before_index 不是共有的，无法调用</mark>');

  $reflect_method_before->invoke( $reflect_obj->newInstance() );


  // 调用 test方法
  $reflect_obj->getMethod('test')->invoke( $reflect_obj->newInstance(), 2016, 06, 29 );


  // 判断是否有 _after_index
  if( !$reflect_obj->hasMethod('_after_index') )
    die('<mark>_after_index, 没有这个方法</mark>');

  // 判断 _after_index 是不是 public
  $reflect_method_after = $reflect_obj->getMethod('_after_index');
  if( !$reflect_method_after->isPublic() )
    die('<mark>_after_index 不是共有的，无法调用</mark>');

  $reflect_method_after->invoke( $reflect_obj->newInstance() );














