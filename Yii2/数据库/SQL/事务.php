<?php
namespace common\models;

/**
	Yii 数据库操作参考
	http://www.kuitao8.com/20150115/3471.shtml
*/

use Yii;
use yii\db\ActiveRecord;

use common\models\User;

class Post extends ActiveRecord {

  public function getUser {}


  //事务的基本结构(多表更新插入操作请使用事务处理)
$dbTrans= Yii::app()->db->beginTransaction();
try{
    $post= new Post;
    $post->'title'= 'Hello dodobook!!!';
    if(!$post->save())throw newException("Error Processing Request", 1);
    $dbTrans->commit();
//  $this->_end(0,'添加成功!!!');
}catch(Exception$e){
    $dbTrans->rollback();
//  $this->_end($e->getCode(),$e->getMessage());

}

?>
