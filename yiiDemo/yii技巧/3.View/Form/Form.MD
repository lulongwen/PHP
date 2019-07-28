# Form 表单栏

* 表单栏 field

* 一个表单栏是一个由标签、输入框、错误消息（可能还有提示文字）组成的容器， 
* 被表示为一个 ActiveField 对象。 使用表单栏建立表单的过程比以前更整洁利落

```php

<?php $form = yii\widgets\ActiveForm::begin(); ?>
  <?= $form->field($model, 'username') ?>
  <?= $form->field($model, 'password')->passwordInput() ?>
  <div class="form-group">
      <?= Html::submitButton('Login') ?>
  </div>
<?php yii\widgets\ActiveForm::end(); ?>

```