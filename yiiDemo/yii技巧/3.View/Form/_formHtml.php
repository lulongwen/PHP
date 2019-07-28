<?php 

/*
  Html::beginForm('提交的URL', 'post/get', '属性 id，class 等');
  Html::endForm(); 必须有 闭合标签 endForm

  Html组件直接生成 HTML标签
  Html::activeInput()
*/
?>

<?= Html::beginForm('', 'post', ['id' => 'form']) ?>
<?= Html::endForm() ?>


<?= Html::beginForm('', 'post', ['id' => 'form']) ?>
	<!--input类型 text/ password/ text-->
	<?= Html::input('text', 'name',['class' => 'name', 'id' => 'name']) ?>
	<?= Html::textInput('name2', 'name2',['class' => 'name2']) ?>

	<?= Html::passwordInput('pwd', 'pwd',['class' => 'password']) ?>
	<?= Html::textarea('desc',['class' => 'desc']) ?>

	<?= Html::hiddenInput('hidden', ['class' => 'hidden']) ?>

	<!--radio('name的名称', '是否选中 true/false', '属性，例如 id class')-->
	<?= Html::radio('status', false, ['class' => 'status']) ?>

	<!--radio('name的名称', '选中的值', '数组中选中的键值', '属性，例如 id class')-->
	<?= Html::radioList('sex',1, [1 => 'boy', 0 => 'girl'], ['class' => 'sex']) ?>


	<?= Html::checkbox('check', true, ['class' => 'check']) ?>
	<?= Html::checkboxList('check-list', [1 => 'frontend', 2 => 'backend'], ['class' => 'check-list']) ?>

	<!--select 下拉框-->
	<?= Html::dropDownList('select', [1 => 'Yes', 2 => 'NoNo'], ['class' => 'select']) ?>

	<!--label 显示的名称，for的字段， 属性，例如 id，class-->
	<?= Html::label('label', 'city', ['class' => 'label']) ?>

	<!--fileInput name名称，默认值，属性-->
	<?= Html::fileInput('image', null, ['class' => 'uploadimage']) ?>

	<?= Html::button('按钮', ['class' => 'btn btn-success']) ?>
	<?= Html::submitButton('提交按钮', ['class' => 'btn btn-success submit']) ?>
	<?= Html::resetButton('重置按钮', ['class' => 'btn btn-success reset']) ?>
<?= Html::endForm() ?>




<!--
  Html组件生成与 Model字段关联的 Html

  $model 是实例化一个 Model，title 是$model 的字段
  activeInput('input的类型 text/ password', '实例化 Model', 'Model的字段', '属性，例如 id class')
  参考资料
    https://www.yiiframework.com/doc/api/2.0/yii-helpers-html
-->
<?= Html::beginForm('', 'post', ['id' => 'form']) ?>
	<?= Html::activeInput('title', $model, 'title', ['class' => 'title']) ?>

	<!--直接生成指定的类型 TypeInput('实例化 Model', 'Model的字段', '属性，例如 id class') -->
	<?= Html::activeTextInput($model, 'title', ['class' => 'title']) ?>
	<?= Html::activePasswordInput( $model, 'pwd', ['class' => 'pwd']) ?>

	<?= Html::activeHiddenInput($model, 'title', ['class' => 'hidden']) ?>

	<?= Html::activeTextarea($model, 'content', ['class' => 'content']) ?>

	<?= Html::activeRadio($model, 'status', ['class' => 'status']) ?>
	<?= Html::activeRadioList($model, 'status', [1 => 'girl', 2 => 'boy'], ['class' => 'radio']) ?>
	<?= Html::activeCheckbox($model, 'status', ['class' => 'checkbox']) ?>
	<?= Html::activeCheckboxList($model, 'status',[1 => 'girl', 2 => 'boy'], ['class' => 'checkbox-list']) ?>

	<?= Html::activeDropDownList($model, 'status', [1 => 'boy', 2 => 'girl'], ['class' => 'sex']) ?>
<?= Html::endForm() ?>