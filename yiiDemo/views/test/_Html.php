<?php
/**
 * Created by PhpStorm.
 * User: lulongwen
 * Date: 2019-07-29
 * Time: 22:20
 */

// Html 组件之直接生成 html标签
use yii\helpers\Html;

// beginForm('提交的URL', '类型post/get', '表单的属性 id/class', '');
// 标签必须闭合
?>


<?= Html ::beginForm() ?>
<?= Html ::endForm() ?>


<?= Html ::beginForm('', 'post', ['id' => 'addForm', 'class' => 'form', 'data' => 'fm']); ?>

<!-- input('类型 text/password/text', 'name名称', '默认值', '属性 class/id') -->
<?= Html ::input('text', 'name', 'longwen', ['class' => 'input']) ?>
<?= Html ::input('password', 'pwd', '', ['class' => 'input password']) ?>
<?= Html ::input('hidden', 'hide', '', ['class' => 'input hide']) ?>


<!-- 直接生成指定的类型 typeInput('name名称', '默认值', '属性 class/id') -->
<?= Html ::textInput('name', 'longwen', ['class' => 'input']) ?>
<?= Html ::passwordInput('pwd', '', ['class' => 'input password']) ?>
<?= Html ::hiddenInput('hide', '123', ['class' => 'input hide']) ?>

<!-- textarea('name名称', '默认值', '属性 class/id')-->
<?= Html ::textarea('intro', 'longwen', ['class' => 'textarea']) ?>


<!-- radio('name名称', '是否选中 true/false', '属性 class/id')
  radioList('name名称', '默认值', '数组的键值', '属性 class/id') -->
<?= Html ::radio('status', true, ['class' => 'radio']) ?>

<?= Html ::radioList('sex', 1, [0 => 'nv', 1 => 'nan'], ['class' => 'sex-list']) ?>


<!-- checkbox('name名称', '是否选中 true/false', '属性 class/id')
  checkboxList('name名称', '默认值', '数组的键值', '属性 class/id') -->
<?= Html ::checkbox('status', false, ['class' => 'radio']) ?>
<?= Html ::checkboxList('sex', 0, [0 => 'nv', 1 => 'nan'], ['class' => 'sex-list']) ?>


<!-- dropDownList('name名称', '默认值', '数组的键值', '属性 class/id') -->
<?= Html ::dropDownList('status', 1, [0 => 'no', 1 => 'yes'], ['class' => 'dropdown']) ?>


<!-- label('显示的名称', 'for字段', '属性 class/id') -->
<?= Html ::label('这里是我想显示的：', 'username', ['class' => 'label', 'style' => 'color:#000;']) ?>


<!-- fileinput('name的名称', '默认值', '属性 class/id/style') -->
<?= Html ::fileInput('image', null, ['class' => 'uploads']) ?>


<!-- 按钮 button('显示的文字', '属性 class/id') -->
<?= Html ::button('普通按钮', ['class' => 'btn']) ?>
<?= Html ::submitButton('提交按钮', ['class' => 'btn submit-btn']) ?>
<?= Html ::resetButton('重置按钮', ['class' => 'btn reset-btn']) ?>

<?= Html ::endForm(); ?>














