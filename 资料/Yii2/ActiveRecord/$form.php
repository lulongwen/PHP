<?php

<?= $form->field($model, 'access_token')->textInput(['maxlength' => true]) ?>
     
<?= $form->field($model, 'login_at')->textInput() ?>


<div class="form-group">
      <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
      </div>

?>