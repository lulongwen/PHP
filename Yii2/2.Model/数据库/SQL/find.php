<?php
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

use common\models\User;

class Post extends ActiveRecord {

  public function getUser {}


// 查询所有数据
  User::find()->all(); // 返回所有数据，类似 select *
  User::findAll('username = :name', [':name' => $username]);

  User::findAll("status = '3' ORDER BY id DESC limit 10");

  // findAllByPk() 根据主键查询一个集合，可以使用多个主键
  $user = new User();
  $user-> findAllByPk($id, 'name like:name and age=:age', [':name' => $name, ':age' => $age]);
  $user-> findAllByPk([1,5]);

  // 只返回第一行数据
  $user -> find('username = :name', [':name' => 'admin']);



  // findAllByAttributes 根据条件查询一组数据, 可以是多个条件,把条件放到数组里面,查询的也是第一条数据
  $user = new User();
  $user-> findAllByAttributes(['username' => 'admin']);


  // findAllBySql 根据SQL语句查询一个数组
  $user = new User();
  $user-> findAllBySql('select * from adminuser where username = :name', [':name' => 'admin']);
  $user-> findAllBySql('select * from adminuser where username like :name', [':name' => '%ad']);

  $user-> findBySql('SELECT * FROM user')->all(); // sql语句查询 user 表里面的所有数据
  $user-> findBySql('SELECT * FROM user')->one(); // sql语句查询 user 表里面的一条数据

  // 查询返回多行：
  $command = $connection->createCommand('SELECT * FROM post');
  $posts = $command->queryAll();

  // 返回单行：
  $command = $connection->createCommand('SELECT * FROM post WHERE id=1');
  $post = $command->queryOne();

  // 查询多行单值：
  $command = $connection->createCommand('SELECT title FROM post');
  $titles = $command->queryColumn();

  // 查询标量值/计算值：
  $command = $connection->createCommand('SELECT COUNT(*) FROM post');
  $postCount = $command->queryScalar();



// 查询一条数据
  User::findOne($id); // 返回 主键 id=1 的一条数据(举个例子)；
  User::find()->one(); // 返回一条数据；

  User::find()->where(['name' => 'lucy'])->one(); // 返回 ['name' => 'lucy'] 的一条数据；
  User::find()->where(['name' => 'lucy'])->all(); // 返回 ['name' => 'lucy'] 的所有数据；



  User::find()->orderBy('id DESC')->all(); // 是排序查询；

  User::find()->andWhere(['sex' => '男', 'age' => '24'])->count('id'); // 统计符合条件的总条数；

  User::find()->andFilterWhere(['like', 'name', '小伙儿']); // 是用 like 查询 name 等于 小伙儿的 数据


  $usr = new User();
  // 要查询的字段，默认select='*'
  $user -> select = 'id, username, title, nickname';  

  $user -> join = 'tableName'; // 链接表

  $user -> with = 'tableName'; // 调用 relations

  $user -> limit = 10; // 取1条数据，如果小于0，则不作处理

  $user -> offset = 1; // 两条合并起来，则表示 limit 10 offset 1,或者代表了。limit 1,10 

  $user -> group = 条件;

  $user -> having = 条件;

  $user -> distinct = false; // 是否唯一查询

  // 根据你的参数自动处理成addCondition或者addInCondition
  $user -> compare('id', 3);
  // 第二个参数是数组就会调用addInCondition
  $user -> compare('id', [1,2,3]);




  User::find()->count(); // 返回记录的数量；

  User::find()->average(); // 返回指定列的平均值；

  User::find()->min(); // 返回指定列的最小值 ；

  User::find()->max(); // 返回指定列的最大值 ；

  User::find()->scalar(); // 返回值的第一行第一列的查询结果；

  User::find()->column(); // 返回查询结果中的第一列的值；

  User::find()->exists(); // 返回一个值，指示是否包含查询结果的数据行；

  User::find()->batch(10); // 每次取 10 条数据

  User::find()->each(10); // 每次取 10 条数据， 迭代查询

  User::find()->select(['a','b','c']); // select a,b,c from XXXX;查询多个字段


// 条件查询
  // 返回 ['name' => 'username'] 的一条数据
  User::find()->where(['name' => 'username'])->one()

  // 返回 ['name' => 'username'] 的所有数据
  User::find()->where(['name' => 'username'])->all();
  
  // 统计符合条件的总条数
  User::find()->andWhere(['sex' => '男', 'age' => '24'])->count('id');

}

?>
