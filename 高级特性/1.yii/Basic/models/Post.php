<?php
namespace app\models;

use yii\db\ActiveRecord;

class Post extends ActiveRecord
{
  public static function tableName { return '{{%post}}'; }
}
