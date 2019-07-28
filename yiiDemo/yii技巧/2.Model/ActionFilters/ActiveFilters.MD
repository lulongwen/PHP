# Active Filters 动作过滤器

* yii\base\ActionFilter 
```php
public function behaviors()
{
  return [
    'access' => [
      'class' => 'yii\filters\AccessControl',
      'rules' => [
          ['allow' => true, 'actions' => ['admin'], 'roles' => ['@']],
      ],
    ],
  ];
}

```