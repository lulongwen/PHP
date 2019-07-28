
## YII 错误解决方案

1. yii\web\Request::cookieValidationKey must be configured with a secret key
```
未配置cookieValidationKey
    - 设置位于 /config/web.php，17行
    'cookieValidationKey' => 'true',即可
````