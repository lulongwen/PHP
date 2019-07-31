<?php

# command 对象查询数据

use Yii;

//查询一条数据
Yii::$app->db-> createCommand("SELECT * FROM mrs_article")->queryOne();


//绑定单个防注入参数
Yii::$app->db-> createCommand("SELECT * FROM mrs_article where id=:id")
  -> bindValue(":id" , 2)->queryOne();


//绑定多个防注入参数
Yii::$app->db
  -> createCommand("SELECT * FROM mrs_article where id=:id AND status=:status") 
  -> bindValues([':id' => 1 , ':status' => '1'])->queryOne();


//查询多条数据
Yii::$app->db->createCommand("SELECT * FROM mrs_article")->queryAll();



// 查询指定数据的字段的数据
$db =Yii::$app->db;
$db->createCommand("SELECT COUNT(*) FROM mrs_article")->queryScalar();



// 更新数据
$db = Yii::$app->db ->createCommand();
$db->update('mrs_article' , ['status'=>0] , 'id=:id' , [':id' => 1])->execute();


// 插入数据
$db = Yii::$app->db ->createCommand();
$db-> insert('mrs_article' , ['title'=>'new Record'] )->execute();


// 删除数据
$db = Yii::$app->db->createCommand();
$db-> delete('mrs_article' , 'id=:id' , [':id' => 1] )->execute();

?>