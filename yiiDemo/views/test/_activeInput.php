<?php
/**
 * Created by PhpStorm.
 * User: lulongwen
 * Date: 2019-07-29
 * Time: 22:20
 */

use yii\helpers\Html;

// activeInput() 关联数据库表的字段
// $model 是实例化的 Model，title是 表的字段

?>



<?= Html ::beginForm('', 'post', ['id' => 'addForm']) ?>
  
  <!-- activeInput('input的类型 text/password', '$model 实例化的model', '数据库字段', '属性 class/id') -->
<?= Html ::activeInput('text', $model, 'title', ['class' => 'input']) ?>
<?= Html ::activeInput('password', $model, 'password', ['class' => 'input']) ?>
<?= Html ::activeInput('hidden', $model, 'title', ['class' => 'input']) ?>
  
  <!--生成指定类型的 typeInput activeTextInput() activeTextArea() -->
<?= Html ::activeTextInput($model, 'title', ['class' => 'input']) ?>
<?= Html ::activePasswordInput($model, 'password', ['class' => 'input']) ?>
<?= Html ::activeHiddenInput($model, 'title', ['class' => 'input']) ?>

<!-- activeTextArea('$model 实例化的model', '数据库字段', '属性class/id') -->
<?= Html ::activeTextArea($model, 'content', ['class' => 'textarea']) ?>

<!-- activeRadio('$model 实例化的model', '数据库字段', '属性 class/id')
  activeRadioList('$model 实例化的model', '数据库字段', '[] 数组', '属性 class/id')  -->
<?= Html ::activeRadio($model, 'status', ['class' => 'status']) ?>
<?= Html ::activeRadioList($model, 'status', ['2' => '不显示', '1' => '显示'], ['class' => 'st']) ?>


<!-- activeCheckbox('$model 实例化的model', '数据库字段', '属性 class/id')
  activeCheckboxList('$model 实例化的model', '数据库字段', '[] 数组', '属性 class/id')  -->
<?= Html ::activeCheckbox($model, 'status', ['class' => 'status']) ?>
<?= Html ::activeCheckboxList($model, 'status', ['2' => '不显示', '1' => '显示'], ['class' => 'st']) ?>


<!-- activeDropDownList('$model 实例化的model', '数据库字段', '[] 数组', '属性 class/id') -->
<?= Html ::activeDropDownList($model, 'status', [2 => 'm', '1' => 'f'], ['class' => 'sx']) ?>

<?= Html ::submitButton("提交", ['class' => 'btn']) ?>


<?= Html ::endForm(); ?>