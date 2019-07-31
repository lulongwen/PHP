<?php
namespace app\controllers;

use app\models\Test;


class TestController extends yii\web\Controller {
  public function actions() {
    return [
      'captcha' => [
        //验证码类
        'class' => 'yii\captcha\CaptchaAction',
        'maxLength' => 4, //生成验证码最大个数
        'minLength' => 4, //生成验证码最小个数
        'width' => 80, //验证码的宽度
        'height' => 40, //验证码的高度
        ],
    ];
  }


  public function actionIndex() {
    $test = new Test();

    // 验证验证码
    if (Yii::$app-> request-> isPost) {
      $test-> load(Yii::$app-> request);
      
      if ($test-> validate()) {
        // 通过验证
        return
      }

      var_dump($test-> getErrors());
    }

    $this-> render('index', ['model' => $test]);
  }




}

?>