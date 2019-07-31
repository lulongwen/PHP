<?php
# QueryBuild

use yii\db\Query;


$db = new Query();

//查询一条 id 等于 2 的数据
$db->select('id')->from('mrs_article')->where("id=:id " , [':id' => 2])->one();
$db->select('id')->from('mrs_article')->where([‘id’ => 1])->one();


//查询多条
$db->select('id')->from('mrs_article')->where([‘status’ => ‘1’])->all();


//in 查询多条
$db->select('id')->from('mrs_article')->where([‘id’ =>[1,2]])->all();


//根据时间排序 ,并且从第 5 条开始获取 3 条
$db->select(‘id’)->from(‘mrs_article’)->orderBy(‘date DESC’)->offset(5)->limit(3)->all();


//查询数据总个数
$db->select('id')->from('mrs_article')->count();
?>

