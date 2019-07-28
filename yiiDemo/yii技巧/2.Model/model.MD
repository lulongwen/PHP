# Model

* yii\base\Model 作为模型基类

* Controller 的代码都是很简单的，
* 所有任务都让 Model去做，然后调动 view
  * 比如去获取数据都在 Model里面，
  * 渲染视图的 HTML代码，都在 View里面，不要放在 Model里面

* 所有的数据处理都放到 Model里面，Post
  * 比如 common\models\Post.php

* 业务逻辑放到 Form里面 PostForm
  * 比如 backend\models\PostForm.php



## scenarios 场景 

* scenarios() 的新方法来声明支持的场景， 并指明在哪个场景下某属性必须经过验证，可否被视为安全值等

```php
public function scenarios()
{
  return [
    'backend' => ['email', 'role'],
    'frontend' => ['email', '!role'],
  ];
}

```

* 上面的代码声明了两个场景：backend 和 frontend 。
* 对于 backend 场景，email 和 role 属性值都是安全的， 且能进行批量赋值
* 对于 frontend 场景，email 能批量赋值而 role 不能。 email 和 role 都必须通过规则验证

* rules() 方法仍用于声明验证规则，由于引入了 scenarios()，现在已经没有 unsafe 验证器了
* 如果 rules() 方法内已经完整地指定场景了， 那就不必覆写 scenarios()
  * 也不必声明 unsafe 属性值




## ActiveRecord 活动记录
* 返回大量记录的查询时，可以链式书写 asArray() 方法， 这样会以数组的形式返回查询结果，
* 而不必返回 ActiveRecord 对象，这能显著降低因大量记录读取所消耗的 CPU 时间和内存
```php

  $customers = Customer::find()->asArray()->all();

```



## Active Record Behaviors 活动行为记录




## QueryBuild 查询生成器

```php
  $query = new \yii\db\Query();
  $query->select('id, name')
        ->from('user')
        ->limit(10);

  $command = $query->createCommand();
  $sql = $command->sql;
  $rows = $command->queryAll();

```


## 用户及身份验证接口 IdentityInterface
* 继承并实现 yii\web\IdentityInterface 接口，
* 使用起来更直观。 在高级应用模版里提供了一个这样的一个例子




## $model 设置默认值
```php
  1 先在控制器中设置 $model->items = 'a';
  2 视图中
  <?= $form-> field($model, 'items')->checkboxList(['a' => 'Item A', 'b' => 'Item B']);?>

```