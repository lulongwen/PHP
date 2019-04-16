# Composer

> PHP 的包管理



## composer 命令
```
更新composer为最新版本
  composer self-update

--prefer-dist
  直接从 dist目录下载代码，而不是从github clone 版本控制源码
  composer install --prefer-dist


修改 composer 的全局镜像
  composer config -g repo.packagist composer https://packagist.phpcomposer.com

解除镜像
  composer config -g --unset repos.packagist

```



## 安装 Composer
* Mac
  ```
  curl -sS https://getcomposer.org/installer | php
  mv composer.phar /usr/local/bin/composer
  
  ```

* Window
```
  下载  Composer-Setup.exe

  是否安装成功，cmd 输入 
  composer -V
```



## 安装 Yii
```
安装 composer Asset插件，会自动更新到最新版
composer global require "fxp/composer-asset-plugin:^1.5.2"

Yii2 基础版，最后一个是项目文件夹的名字
composer create-project --prefer-dist yiisoft/yii2-app-basic shop

// Yii2 高级版
composer create-project --prefer-dist yiisoft/yii2-app-advanced advanced


github token
  0f2fc6cbee180e56f2aaa7b483ebfb69cd9fa8fa

获取 github token
  https://github.com/settings/tokens

```
