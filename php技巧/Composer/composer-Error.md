# composer Error

```
minimum-stability改为dev
	"minimum-stability": "stable",

	全局稳定性设置：通过设置 minimum-stability的值，来告诉 Composer当前项目的依赖要求的包的全局稳定性级别
	stable 默认值，还有
	dev、alpha、beta、RC、stable，

	Available options (in order of stability) are dev, alpha, beta, RC, and stable.

```




## Could not open input file: composer.phar
```
php composer.phar create-project yiisoft/yii2-app-advanced advanced

解决方法
	php.ini 启用 
	extension=php_openssl.dll

 	1 更新 composer 为最新版本 
	composer self-update
	composer install --prefer-dist


	2 手动下载 composer.phar，放在当前目录中，
	但每次新建目录时，必須再复制 composer.phar 到新目录中，这样比较麻烦

	
	3 安装 composer到当前目录，可以使用 php composer.phar
	php -r "readfile('https://getcomposer.org/installer');" | php
	
```



## [Composer\Repository\InvalidRepositoryException]
* 解决方法，编辑 Yii 根目录下的 composer.json
* [获取 github token](https://github.com/settings/tokens)
```
将
"config": {
  "process-timeout": 1800
}

改为以下格式，然后输入 composer update 更新
"config": {
  "process-timeout": 1800,
  "github-oauth": {
  	// 你的 github token
    "github.com": "0f2fc6cbee180e56f2aaa7b483ebfb69cd9fa8fa"
  }
}

```


## 搜索 fxp/composer-asset-plugin包 安装最新版
```
Fatal error: Declaration of Fxp\Composer\AssetPlugin\Repository\AbstractAssetsRepository::search($query, $mode = 0) must be compatible with Composer\Repository\ComposerRepository::search($query, $mode= 0, $type = NULL) in C:\Users\win7\AppData\Roaming\Composer\vendor\fxp\composer-asset-plugin\Repository\AbstractAssetsRepository.php on line 334

https://packagist.phpcomposer.com

```