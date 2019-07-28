<?php
namespace app\models;

use yii\db\ActiveRecord;
use yii\db\Query;

/**
 * ActiveRecord 的增删查改
	findAll()
 	findOne()
 	find()

 \yii\db\Query 查询数据

 
 Yii::$app -> db  增删查改
*/

class Post extends ActiveRecord
{
  public static function tableName() { return '{{%post}}'; }
}

// findAll() 查询多条数据
Post::findAll(['status' => '1']);

Post::findOne(1);

Post::findOne(['status' => '1']);


Post::find() -> where(['id' => '1']) -> one();

Post::find() -> where('status=:status', ['status' => '1']);


Post::find() -> where(['status' => '1']) -> orderBy('date DESC') -> all();


Post::find() -> where(['status' => '1']) -> orderBy('date DESC') ->
	offset(5) -> limit(3) -> all();




// 更新数据
$data = Post::findOne(1);
$data -> title = 'change title';
$data -> save();

Post::updateAll(['title' => 'change title'], ['id' => '1']);


// 添加一条新数据
$data = new Post(); // new \app\models\Post();
$data -> title = 'new one of title';
$data -> content = 'this is new content';
$data -> save();


// delete One
Post::findOne(1) -> delete();


// delete id 删除指定的数据
Post::deleteAll(['id' => 2]);


/**
 * \yii\db\Query
 */
$db = new Query();
$db -> select('id') -> from('blog_post')
	-> where('id=:id', [':id' => 2]) -> one();

$db -> select('id') -> from('blog_post')
	-> where(['id' => 1]) -> one();


$db -> select('id') -> from('blog_post')
	-> where(['status' => '1']) -> all();

$db -> select('id') -> from('blog_post')
		-> where(['id' => [1,2] ]) -> all();


$db -> select('id') -> from('blog_post')
	-> orderBy('date DESC') -> offset(5) -> limit(3) -> all();

$db -> select('id') -> from('blog_post') -> count();



/**
 * Yii::$app -> db 增删查改
 */
$db = \Yii::$app -> db;
$db -> createCommand('select * from blog_post') -> queryOne();

$db ->createCommand('select * from blog_post where id =: id')
	-> bindValue(':id', 2) -> queryOne();
	
	
$db -> createCommand('select * from blog_post where id=: id and status =: status')
	-> bindValues([':id' => 1, 'status' => 1]) -> queryOne();
	
	
$db -> createCommand('select * from blog_post') -> queryAll();

$db -> createCommand('select count(*) from blog_post') -> queryScalar();


// update table	更新数据
$db = \Yii::$app -> db -> createCommand();
$db -> update('blog_post', ['status' => 0], 'id =: id', [':id' => 1])
	-> execute();




















