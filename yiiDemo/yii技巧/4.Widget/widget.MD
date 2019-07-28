# Widget

* yii\base\Widget

* 包含 begin()，end() 和 widget() 三个静态方法，用法如下：

```php
  use yii\widgets\Menu;
  use yii\widgets\ActiveForm;

  // 注意必须 **"echo"** 结果以显示内容
  echo Menu::widget(['items' => $items]);

  // 传递一个用于初始化对象属性的数组
  $form = ActiveForm::begin([
      'options' => ['class' => 'form-horizontal'],
      'fieldConfig' => ['inputOptions' => ['class' => 'input-xlarge']],
  ]);

  // 表单输入栏都在这里 ...
  ActiveForm::end();

```