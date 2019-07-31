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

    if (!Yii::$app-> request-> isPost) return

    // 实例化一个验证码对象
    $code = new yii\captcha\CaptchaValidator();

    // 设置 action为当前的
    $code-> captchaAction = 'test/captcha';

    // 创建一个验证码对象
    $action = $code-> createCaptchaAction();
    
    // 读取验证码
    $code = $action-> getVerifyCode();

    // 验证验证码
    if ($code == Yii::$app-> request-> post('verifyCode')) {
      // 通过验证
    }
    else {
      // var_dump($code-> getErrors());
    }

    $this-> render('index');
  }




}

?>