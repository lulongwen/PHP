# Yii Advanced 细节


## composer 安装 高级模版

```bash
# 更新 composer
	composer self-update

# 安装 yii模版
	composer create-project --prefer-dist yiisoft/yii2-app-advanced yiiBlog

# 进入目录，初始化
	cd yiiBlog
	./ php init

	[0] Development 开发环境
	[1] Production 生成环境
	选择需要的环境 0 或 1 开始生成, 输入 yes , 就开生成了
```





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

* 生产环境跟开发环境的区别
	* 开发环境 backend/web 和 fronend/web 都多个 index-test.php 测试文件
	* 开发环境 index.php 文件默认开启 debug
	* 开发环境 config/main-local.php 文件下加载debug 和 gii 模块
	* 生产环境 都没有这些文件


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









