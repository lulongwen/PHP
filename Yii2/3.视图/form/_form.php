<?php 

?>

<?= $form = ActiveForm::begin(); ?>

  <?= $form-> field($model, 'category')
    -> dropDownList(['1' => '前端', '2' => '后端'], ['prompt' => '请选择分类']); ?>

<?= ActiveForm::end() ?>