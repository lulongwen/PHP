<?php
use yii\helpers\Html;
use yii\captcha\Captcha;

?>


<?= Html::beginForm('', 'post', ['class' => 'form']);?>
  <?= Captcha::widget([
    'model' => $model,
    'attribute' => 'verifyCode',
    // 验证码的 action 与 model是对应的
    'captchaAction' => 'test/captcha',
    // 自定义模板
    'template' => '{input} {image}',

    // input 的 HTML属性
    'options' => [
      'class' => 'input verifycode',
      'id' => 'verifyCode'
    ],

    // image 的 HTML 属性配置
    'imageOptions' => [
      'class' => 'imagecode',
      'alt' => '点击图片刷新'
    ]
  ]) ?>


  <?= Html::submitButton('保存', ['class' => 'btn btn-success'])?>

<?= Html::endForm() ?>