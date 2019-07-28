# Model
* Controller 的代码都是很简单的，
* 所有任务都让 Model去做，然后调动 view
  * 比如去获取数据都在 Model里面，
  * 渲染视图的 HTML代码，都在 View里面，不要放在 Model里面

* 所有的数据处理都放到 Model里面，Post
  * 比如 common\models\Post.php

* 业务逻辑放到 Form里面 PostForm
  * 比如 backend\models\PostForm.php

```



```


## $model 设置默认值
```php
  1 先在控制器中设置 $model->items = 'a';
  2 视图中
  <?= $form-> field($model, 'items')->checkboxList(['a' => 'Item A', 'b' => 'Item B']);?>

```