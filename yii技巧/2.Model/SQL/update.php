<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

use common\models\User;

class Post extends ActiveRecord {

  public function getUser {}


// 修改操作：
  $User = User::findOne($id);
  $User->name = 'zhangsan';

  $User->save(); // 等同于 $User->update();



  // 新增
  $admin= new Admin();  

  $admin->username =$username;
  $admin->password =$password;

  if($admin->save() > 0){
    echo "添加成功";
  }
  else{echo "添加失败"; }



}

?>
