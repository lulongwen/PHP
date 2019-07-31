<?php
// 以 Post 文章表

use app\models\Post;


// findAll 查询多条数据,查询 Post表，status=1 的所有数据
Post::findAll(['status' => '1']);


// findOne('条件')
Post::findOne(1); // 根据 id查询
Post::findOne(['status' => '1']); // 指定条件查询


// find() find 可以链式查询，查询 id=1的数据
Post::find()-> where(['id' => '1'])-> all();

// 查询 status=1的所有数据
Post::find()-> where(['status' => '1'])-> all();
// 安全的写法，一般过滤变量
Post::find()-> where('status= :status', [':status' => '1'])-> all();

// 查询 status=1 的所有数据，根据 date 降序排序，ASC升序
Post::find()-> where(['status' => '1'])
  -> orderBy('date DESC')-> all();

// 查询 status=1的数据，根据 date排序，从第 5条开始，读取 3条
Post::find()-> where(['status' => '1'])
  -> orderBy('date DESC')-> offset(5)-> limit(3)-> all();



// 更新数据
$model = Post::findOne(3);
$model-> title = '更新后的数据';
$model-> content = '这是一条新数据';

$model-> save();

// save() 函数默认 true,就是更新或插入要验证数据
// $model-> save(false); 不验证数据

// 更新指定属性的 updateAll('更新的数据', '条件')
Post::updateAll(['title' => '更新后的数据'], ['id' => 1]);



// 删除 id=3 的一条数据
Post::findOne(3) -> delete();

// 删除指定条件的数据
Post::deleteAll(['id' => '2']);
?>