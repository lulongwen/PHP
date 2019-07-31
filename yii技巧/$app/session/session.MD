# Session

* 通过 Yii::$app->session 进行操作


## 添加 session

```php
  $session = Yii::$app-> session;

  $session-> set('username', 'longwen');

  $session-> set('user_array', [3,5,8]);

```




## 读取 session

```php
  $session = Yii::$app-> session;

  // 获取 session
  $session-> get('username');

```




## 删除 session

```php
  $session = Yii::$app-> session;

  // 删除一个 session
  $session-> remove('usrenmae');

  // 删除所有
  $session-> removeAll();

```