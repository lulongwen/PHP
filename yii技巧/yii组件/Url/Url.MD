# UrlManager 美化

* 支持可选参数了，比如，如果你在 2.0 中定义了一个下面这样的规则，
* 那么它可以同时匹配 post/popular 和 post/1/popular 两种 URL
```php
  [
    'pattern' => 'post/<page:\d+>/<tag>',
    'route' => 'post/index',
    'defaults' => ['page' => 1],
  ]
```


## URL美化

* 把冗厂的URL美化成有意义的地址
* 更新内容比较频繁的列表最好采用伪静态的方式
* Yii伪静态 urlManager 需要 .htaccess 文件配合

```php
'urlManager' => [
  // 1 开启 URL美化，去掉 index.php?r=
  'enablePrettyUrl'=>true,
  // 如果开启脚本名，会显示 index.php
  'showScriptName'=>false,
  // 添加 .html 后缀，实现伪静态
  'suffix'=>'.html',
  'rules'=>[
    // '<controller:\w+>/<id:\d+>'=>'<controller>/index',
    // 文章详细页面的美化规则
    '<controller:\w+>/<id:\d+>'=>'<controller>/detail',
    '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
    // 文章列表页的 美化规则
    'posts' => 'post/index'
  ]
]

```



## Url组件

```php
use yii\helpers\Url;

  Url::home();
  Url::home(true);

  Url::current();

  Url::to();
  Url::toRoute();

以 www.lulongwen.com/index.php?r=post/index 为例
  // 输出根目录, /
  Url::base();

  // 输出带域名的根目录 http://www.lulongwen.com/
  Url::base(true);


  // 首页， true 带域名的首页
  // index.php
  Url::home();
  
  // http://www.lulongwen.com/index.php
  Url::home(true);


  // 当前的 Url, www.lulongwen.com/index.php?r=post/index
  Url::current();


// to & toRoute 都是生成 Url, 加上 true生成带域名的 Url，区别：
// 传入 String时，to直接把 String当成 Url，toRoute会解析

  // /index.php?r=post/add
  Url::to(['post/add']);

  // /index.php?r=post/view&id=3
  Url::to(['post/view', 'id' => 3]);

  // http:://www.lulongwen.com/index.php?r=post/view
  Url::to(['post/view', true]);

  // http:://www.lulongwen.com/index.php?r=post/view&id=3
  Url::to(['post/edit', 'id' => 3], ture);



  // /index.php?r=post/add
  Url::toRoute(['post/add']);

  // /index.php?r=post/view&id=3
  Url::toRoute(['post/view', 'id' => 3]);

  // http:://www.lulongwen.com/index.php?r=post/view
  Url::toRoute(['post/view', true]);

  // http:://www.lulongwen.com/index.php?r=post/view&id=3
  Url::toRoute(['post/edit', 'id' => 3], ture);


  // post/add
  Url::to('post/add');

  // index.php?r=post/add
  Url::toRoute('post/add');

```




## getUrl()

```php


```

