# Yii 助手类



## 静态助手类
```php
yii\helpers\Html
yii\helpers\ArrayHelper
yii\helpers\StringHelper
yii\helpers\FileHelper
yii\helpers\Json

```



## VarDumper::dump(); 显示错误

```
$user = new User();
$user-> save();

// 显示错误
VarDumper::dump($user->errors);exit(0);

  VarDumper是用来替换掉问题多多的PHP内置函数var_dump和print_r的
  VarDumper::dump($var)直接调用
```