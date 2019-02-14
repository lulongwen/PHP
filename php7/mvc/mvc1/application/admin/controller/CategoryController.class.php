<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/12/6
   * Update: 2017年12月8日22:31:16
   * description: 分类控制器，主要负责分类管理这个功能
   * 控制器的作用
   * 1 命令模型 model查询数据
   * 2 命令视图 view显示数据
   */

  require_once './framework/core/Controller.class.php';
  class CategoryController extends Controller{

    // 查询分类列表
    public function indexAction(){
      // 控制器方法名加上 Action后缀，目的是避免和模型类里面的方法重复

      die('美好的一天');
      // 命令 model查询数据
      require_once './framework/core/Factory.class.php';
      $model = Factory::Models('CategoryModel');


      // 命令视图显示数据


    }

    // 删除分类列表
    public function deleteAction(){

    }

    // 修改分类列表
    public function editAction(){

    }

    // 增加分类列表
    public function addAction(){

    }

  }