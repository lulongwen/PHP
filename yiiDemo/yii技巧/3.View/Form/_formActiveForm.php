<?php
  use yii\widgets\ActiveForm;

/*
  文本框:textInput()
  密码框:passwordInput()

  单选框:radio(),radioList()
  复选框:checkbox(),checkboxList()
`
  下拉框:dropDownList()
  隐藏域:hiddenInput()

  文本域:textarea(['rows'=>3])
  文件上传:fileInput()

  提交按钮:submitButton()
  重置按钮:resetButtun()
*/

  $edu = ['1'=>'大学','2'=>'高中','3'=>'初中'];
  $hobby = ['0'=>'篮球','1'=>'足球','2'=>'羽毛球','3'=>'乒乓球'];
?>

<?php $form = ActiveForm::begin() ?>
<?php ActiveForm::end() ?>


<?php $form = ActiveForm::begin([
  'action' => ['post/create'],
  'method' => 'post'
]) ?>

  <?= $form -> field($model, 'username') -> textInput(['maxlength' => 20]) ?>


  <?= $form -> field($model, 'password') -> passwordInput(['maxlength' => 20]) ?>


  <?= $form -> field($model, 'sex') -> radioList(['0' => '女', '1' => '男']) ?>


  <?= $form -> field($model, 'edu')
    -> dropDownList($edu, ['prompt' => '请选择学校', 'style' => 'width: 100px']) ?>


  <?= $form -> field($model, 'hobby') -> checkboxList($hobby) ?>

  <?= $form-> field($model, 'category')
      -> dropDownList(['1' => '前端', '2' => '后端'], ['prompt' => '请选择分类']); ?>


  <?= $form -> field($model, 'file') -> fileInput() ?>


  <?= $form -> field($model, 'info') -> textarea(['rows' => 5]) ?>


  <?= $form -> field($model, 'userid') -> hiddenInput(['value' => 3]) ?>


  <?= Html::submitButton('提交', 
    ['class' => 'btn btn-success', 'name' => 'submit-name']) ?>


  <?= Html::resetButton('重置',
    ['class' => 'btn btn-warning', 'name' => 'reset-name']) ?>

<?php ActiveForm::end() ?>

