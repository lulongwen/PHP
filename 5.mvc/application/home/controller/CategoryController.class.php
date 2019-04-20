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

  namespace home\controller;
  use framework\core\Controller;
  use framework\core\Factory;

  class CategoryController extends Controller{


    // 查询分类列表
    public function indexAction(){
      // 控制器方法名加上 Action后缀，目的是避免和模型类里面的方法重复

      // 命令 model查询数据
      $model = Factory::Models('home\model\CategoryModel');
        $arr = array(
          'id' => null,
          'name' => "齐国",
          'title' => "晏子使楚，王曰"
        );
      $model->insert($arr);
      $result = $model->user_select();

      // 命令视图显示数据
      $data = '元旦促销售出的商品';
      $this->assign('data', $data);
      $this->assign('list', $result);
      $this->display('index.php');


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