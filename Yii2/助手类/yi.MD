# Yii 助手类



## VarDumper::dump(); 显示错误

```
$user = new User();
$user-> save();

// 显示错误
VarDumper::dump($user->errors);exit(0);

  VarDumper是用来替换掉问题多多的PHP内置函数var_dump和print_r的
  VarDumper::dump($var)直接调用
```