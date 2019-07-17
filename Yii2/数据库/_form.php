<?php

// 第一种查询方法
$obj = PostStatus::find()-> all();
$status = ArrayHelper::map($obj, 'id', 'name');


// 第二种查询方法
$arr = Yii::$app-> db-> createCommand('select id, name from post_status');
$status = ArrayHelper::map($arr, 'id', 'name');


// 第三种查询方法
$status = (new \yii\db\Query())
  -> select(['name', 'id'])
  -> from('post_status')
  -> indexBy('id')
  -> column();


// 第四种查询方法，推荐
$status = PostStatus::find()