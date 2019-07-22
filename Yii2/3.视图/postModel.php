<?php

class Post extends \yii\db\ActiveRecord
{
  private $_oldTags; // 声明一个私有变量

  public static function tableName()
  {
    return '{{%post}}';
  }

  // 获取表之间的关联关系
  public function getRelation() {
    // hasMany 一对多
    return $this-> hasMany(Relation::className(), ['post_id' => 'id']);
  }

  public function getExtend() {
    // hasOne 一对一
    return $this-> hasOne(PostStatus::className(), ['post_id' => 'id']);
  }

  // GridView调用 'category.name'
  public function getCategory() {
    return $this-> hasOne(Category::className(), ['post_id' => 'id']);
  }


}