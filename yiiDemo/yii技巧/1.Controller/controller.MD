# Controller

* yii\web\Controller 作为控制器的基类
* 用 yii\base\Action 作为操作类的基类

* 控制器和动作的驼峰命名会被转换成小写字母， 
* 其中每个单词由一个专有的连字号分隔，例如，CamelCaseController 将为 camel-case

* 当你在写控制器操作的代码时， 应该返回 return要渲染的内容而不是输出 echo它
```php
public function actionView($id)
{
  $model = \app\models\Post::findOne($id);
  if ($model) {
    return $this->render('view', ['model' => $model]);
  } 
  else {
    throw new \yii\web\NotFoundHttpException;
  }
}

```