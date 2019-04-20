<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/12/4
   * Time: 17:29
   * description: 用户模型类
   *  - 主要操作用户表
   */

  require_once 'Model.class.php';

  /**
   * 不能单独在每个方法里 require_once 'DAOPDO.class.php';
   *  - 会导致代码冗余，不要每次都去写重复的代码，把公共的代码提取到公共的类中，然后继承
   *
   * 因为不只是增加用户需要用到 PDO类，删除用户，修改用户，查询用户都要用到 DAOPDO 这个类，
   * 所以，我们将公共的代码封装到构造方法中
   *
   * - 上面的代码还有问题：
   * 因为，将来的项目会有很多的模型类，每个模型类都要用到 DAOPDO 类去链接数据库对数据库进行操作
   * 所以，我们就将公共的代码，提取到父类中，使用 extends继承来达到公用性
   * - 将代码再提取简化，
   */
  class UserModel extends Model {

    // 增加一个用户
    public function user_add(){
      $sql = "insert into `job` values(null, '李煜', '南唐后主')";
      $result = $this->dao ->exec($sql);
      return $result;
    }

    // 删除一个用户
    public function user_delete(){
      $sql = "";
    }


    // 修改一个用户
    public function user_update(){

    }

    // 查询一个用户
    public function user_select(){

    }
  }