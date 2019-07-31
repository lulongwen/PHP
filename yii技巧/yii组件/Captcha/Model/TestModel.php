<?php
namespace app\models;

class Test extends yii\base\Model {
  // 添加的验证码字段
  public $verifyCode;

  public function rules() {
    // captchaAction 是生成验证码的控制器
    return [
      ['verifyCode' , 'captcha' , 
        'captchaAction' => 'test/captcha' , 'message'=>'验证码不正确']
    ];
  }
}

?>