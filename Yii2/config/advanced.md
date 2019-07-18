# Yii Advanced 细节

## Advanced关闭 debug 设置 dev & prod
* index.php配置 YII_ENV

```PHP
  /frontend/web/index.php
  /backend/web/index.php
  
  // 开发环境 dev的入口文件
  defined('YII_DEBUG') or define('YII_DEBUG', true); 
  defined('YII_ENV') or define('YII_ENV', 'dev');
  
  // 生产环境 prod的入口文件
  defined('YII_DEBUG') or define('YII_DEBUG', false); 
  defined('YII_ENV') or define('YII_ENV', 'prod');

  defined('YII_ENV') or define('YII_ENV', 'dev'); 
    prod：生产环境。常量 YII_ENV_PROD 为 true
    dev：开发环境。常量 YII_ENV_DEV  为 true
    test：测试环境。常量 YII_ENV_TEST  为 true
```

* 配置debug开启/关闭
```PHP
  /frontend/config/main-local.php
  /backend/config/main-local.php

  找到以下代码：取反
  if (!YII_ENV_TEST) {
```


## 独立的用户表
* 前台登录，用户表 fans
* 后台登录，管理员表，数据库中进行分表处理 user
* yii默认前后台登录用的是一张表，前台可以登录后台，设计的不合理
* yii 前后台注册用户隔离
  https://www.cnblogs.com/tystudy/p/6201317.html









