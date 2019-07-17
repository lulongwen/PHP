<?php
  namespace frontend\models; 

  use yii\db\ActiveRecord;
  use yii\data\ActiveDataProvider;
  use common\models\Life;


  class Life extends ActiveRecord {

    public function actionIndex() {
      $searchModel = new Life(['scenario' => Life::SCENARIO_SEARCH]);
      $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
 
      return $this->render('index', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider
      ]);
    }


    public function actionDeleteAll() {
      try {
        $ids = Yii::$app -> request -> post('ids');
        $res = Life::deleteAll("id in {$ids}");

        echo Json::encode(['success' => $res ? 1 : 0]);
      }
      catch(Exception $err) {
        echo Json::encode(['success' => false, 'message' => $err -> getMessage()]);
      }
    }

  }
?>