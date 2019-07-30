<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%post}}".
 *
 * @property int $id 自增 id
 * @property string $title 文章标题
 * @property string $summary 文章摘要
 * @property string $content 文章内容
 * @property string $thumbnail 缩略图片
 * @property int $userid 作者 ID
 * @property string $username 作者
 * @property int $categoryid 分类 ID
 * @property int $status 是否发布，0-草稿，1-已发布，2-已归档
 * @property int $created_at 创建时间
 * @property int $updated_at 更新时间
 * @property int $deleted_at 删除时间
 * @property string $tags
 */
class Post extends ActiveRecord
{
    // ActiveRecord 要关联数据库的表
    public static function tableName()
    {
        return '{{%post}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['summary', 'content'], 'string'],
            [['userid', 'categoryid', 'status', 'created_at', 'updated_at', 'deleted_at'], 'integer'],
            [['title'], 'string', 'max' => 200],
            [['thumbnail'], 'string', 'max' => 120],
            [['username'], 'string', 'max' => 80],
            [['tags'], 'string', 'max' => 60],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '自增 id',
            'title' => '文章标题',
            'summary' => '文章摘要',
            'content' => '文章内容',
            'thumbnail' => '缩略图片',
            'userid' => '作者 ID',
            'username' => '作者',
            'categoryid' => '分类 ID',
            'status' => '是否发布，0-草稿，1-已发布，2-已归档',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'deleted_at' => '删除时间',
            'tags' => 'Tags',
        ];
    }

    /**
     * {@inheritdoc}
     * @return PostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PostQuery(get_called_class());
    }
}
