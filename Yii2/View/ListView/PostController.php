<?php
  namespace frontend\models; 

  use yii\db\ActiveRecord;
  use yii\data\ActiveDataProvider;
  use common\models\Post;


  class Post extends ActiveRecord {

    public function actionIndex() {
      $options = [
        // 数据
        'query' => Post::find() -> orderBy('created_at');

        // 分页
        'pagination' => [
          'pagesize' => 10
        ],
      ];

      $dataProvider = new ActiveDataProvider($options);

      return $this -> render('index', [
        'dataProvider' => $dataProvider
      ]);
    }


  }
?>