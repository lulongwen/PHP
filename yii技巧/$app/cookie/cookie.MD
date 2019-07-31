# Cookie

* Yii的 cookie 通过 yii\web\Request 和 yii\web\Response 进行操作
* Cookie 进行增删改时调用的 response
* Cookie 读取时使用的是 request

```php

读取 cookie
  Yii::$app-> request-> cookies; 

设置 cookie
  Yii::$app-> response-> getCookies() -> add(); 

```



## 添加 cookie

```php
use yii\web\Cookie;

  $cookie = new Cookie();

  // cookie名称， expire 有效时间
  $cookie-> name = 'username';
  $cookit-> expire = time() + 3600;
  // 无法通过 js读取 cookie
  $cookie-> httpOnly = true;
  // cookie 的值
  $cookie-> value = 'longwen';

  // 添加 cookie
  Yii::$app-> response-> getCookies()-> add($cookie);


  // 常用的方法
  $ookie = new Cookie([
    'name' => 'username',
    'expire' => time() + 3600,
    'httpOnly' => true,
    'value' => 'longwen'
  ]);

  Yii::$app-> response-> getCookies()-> add($cookie);


```




## 读取 cookie

```php

  $cookie = Yii::$app-> request-> cookies;

  // 返回一个 yii\web\Cookie 对象
  $cookie-> get('username');

  // 返回 cookie的值
  $cookie-> getValue('username');
  $cookie['username'];

  // 判断一个 cookie是否存在
  $cookie-> has('username');

  // 获取 cookieDe数量
  $cookie-> count();
  $cookie-> getCount();

```



## 删除 cookie

```php
$cookie = Yii::$app-> request-> cookies-> get('username');

// 删除一个 cookie
Yii::$app-> response-> getCookies()-> remove($cookie);

// 删除所有 cookie，不太好用
Yii::$app-> response-> getCookies()-> removeAll();

```