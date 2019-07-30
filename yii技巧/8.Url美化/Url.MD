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