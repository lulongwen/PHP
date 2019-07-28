# Composer

> PHP 的包管理



## composer 命令
```
更新composer为最新版本
  composer self-update

--prefer-dist
  直接从 dist目录下载代码，而不是从github clone 版本控制源码
  composer install --prefer-dist


composer 中文镜像
  composer config -g repo.packagist composer https://packagist.phpcomposer.com

解除镜像
  composer config -g --unset repos.packagist


composer 官方库
"repositories": [
    {
        "type": "composer",
        "url": "https://asset-packagist.org"
    }
]


PHAR Php ARchive
  是PHP里类似于JAR的一种打包文件。PHP 5.3+，phar后缀文件是默认开启
  phar打包后的文件不需要显示的再解压，可以直接被PHP使用
  打包后的phar是一个二进制文件，支持权限和分组的

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

  安装路径
  C:\ProgramData\ComposerSetup\bin
  C:\ProgramData\ComposerSetup\bin\composer.phar install

  是否安装成功，cmd 输入 
  composer -V


  把 php composer.phar 换成 composer
  composer create-project yiisoft/yii2-app-advanced advanced

```


## Mac Composer Could not open input file: composer.phar 的问题

```
1 使用 curl 指令下载：
curl -sS https://getcomposer.org/installer | php

2 沒有安裝 curl ，也可以用 php 指令下载：
php -r "readfile('https://getcomposer.org/installer');" | php


3 手动下载 composer.phar 将它放在目录中
  但每次当你建立新目录时，必须再复制一个副本到新目录中，这样比较麻烦。
  最佳做法是将它放到 usr/local/bin 目录中中，成为全域指令

  mv composer.phar /usr/local/bin/composer


这样就可以直接在终端使用composer命令了
  php composer.phar xxx 就可以用了

```




## 安装 Yii
```
安装 composer Asset插件，会自动更新到最新版
composer global require "fxp/composer-asset-plugin:^1.4.5"


Yii2 基础版，最后一个是项目文件夹的名字
php composer.phar create-project yiisoft/yii2-app-basic yiiBasic
composer create-project --prefer-dist yiisoft/yii2-app-basic yiiBasic

// Yii2 高级版
composer create-project --prefer-dist yiisoft/yii2-app-advanced advanced
php composer.phar create-project yiisoft/yii2-app-advanced advanced

下载新的归档文件
	并使用新归档文件中的文件替换应用程序中 vendor/ 目录的内容

github token
  0f2fc6cbee180e56f2aaa7b483ebfb69cd9fa8fa

获取 github token
  https://github.com/settings/tokens

```
