# Html 组件

* \yii\helpers\Html 组件，提供了封装好的 Html 代码
* 直接调用 Html 的相对方法，就可以生成相对应的 Html 代码 



## 转码

* Html 转义和反转义 html 代码

```php
	$html = ‘<b>test</b>’;
	//转义 html 代码
	$thtml = \yii\helpers\Html::encode($html);
	
	//反转义 html 代码
	$html = \yii\helpers\Html::decode($thtml);

```


## 打印关联数据库错误

```php
  use app\mdoels\Post;

  <?= Html::error(Post::findOne(3), 'title', ['class' => 'err']); ?>

```