<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/12/4
   * Time: 17:29
   * description: 用户模型类
   *  - 主要操作用户表
   */

  namespace home\model;
  use framework\core\Model;

  class CategoryModel extends Model {
    protected $logicTable = 'job';

    // 增加一个用户
    public function user_add(){


    }

    // 删除一个用户
    public function user_delete(){

    }


    // 修改一个用户
    public function user_update(){

    }

    // 查询一个用户
    public function user_select(){
      $sql = "select * from `goods`";
      $result = $this->pdo -> fetchAll($sql);
      return $result;
    }
  }