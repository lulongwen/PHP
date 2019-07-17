<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

use common\models\User;

class Post extends ActiveRecord {

  public function getUser {}


// 删除操作：
  User::deleteAll('name = username');    删除 name = username 的数据；
  User::findOne($id)->delete(); 删除主键为 $id变量 值的数据库；

  // 删除符合条件的数据
  User::deleteAll('age > :age AND sex = :sex', [':age' => '20', ':sex' => '1']);

  // insert 一条数据
  $connection->createCommand()->insert('user', [
    'name' => 'Sam',
    'age' => 30,  
  ])->execute();


  // insert 一次插入多行数据
  $connection->createCommand()->batchInsert('user', ['name', 'age'], [
    ['Tom', 30],
    ['Jane', 20],
    ['Linda', 25],
  ])->execute();

  // update
  $connection->createCommand()->update('user', ['status' => 1], 'age > 30')->execute();

  // delete
  $connection-> createCommand()->delete('user', 'status = 0')->execute();

}

?>
