# Yii2 博客插件
* yii2 + yii-admin + yii-adminlte


## composer require
```
  composer create-project yiisoft/yii2-app-advanced Blog

  composer require dmstr/yii2-adminlte-asset "^2.1"
	composer require mdmsoft/yii2-admin "~2.0"
	composer require "bizley/quill ^2.0"
	composer require mludvik/yii2-tags-input:"~1.0"

  php composer.phar require "bizley/quill ^2.0"


composer.json
{
	"mludvik/yii2-tags-input": "~1.0"
}
```


## CRM Composer Registry Manager
```
安装 crm
	composer global require slince/composer-registry-manager


列出当前可用的所有镜像源
composer repo:ls
  composer        https://packagist.org                           
  phpcomposer     https://packagist.phpcomposer.com               
  aliyun          https://mirrors.aliyun.com/composer             
  tencent         https://mirrors.cloud.tencent.com/composer      
  huawei          https://mirrors.huaweicloud.com/repository/php  
  laravel-china   https://packagist.laravel-china.org             
  cnpkg           https://php.cnpkg.org                           
  sjtug           https://packagist.mirrors.sjtug.sjtu.edu.cn


使用 laravel-china 镜像源
  composer repo:use laravel-china


CRM 使用文档
	https://github.com/slince/composer-registry-manager/blob/master/README-zh_CN.md

  https://learnku.com/articles/15977/composer-accelerate-and-modify-mirror-source-in-china
	
  https://github.com/slince/composer-registry-manager


composer 修改中文镜像
	composer config -g repo.packagist composer https://packagist.phpcomposer.com
解除镜像
  composer config -g --unset repos.packagist

只在当前项目有效
  composer config repo.packagist composer https://packagist.laravel-china.org
取消当前项目配置
  composer config --unset repos.packagist
```


## easyWechat SDK 微信开发
```
Laravel
	composer require overtrue/wechat:~4.0 -vvv

Yii
	composer require jianyan74/yii2-easy-wechat
		基于最新的 overtrue/wechat 4.x
		配置文档
		https://github.com/jianyan74/yii2-easy-wechat

easyWechat文档
	https://www.easywechat.com/tutorials

微信开发常见问题
	https://www.easywechat.com/docs/4.1/troubleshooting

```


## tags-input
```
	"mludvik/yii2-tags-input": "~1.0"

	composer require mludvik/yii2-tags-input:"~1.0"
	php composer.phar require mludvik/yii2-tags-input:"~1.0"

	https://www.yiiframework.com/extension/mludvik/yii2-tags-input


	<?php use mludvik\tagsinput\TagsInputWidget; ?>
	<?= $form->field($model, 'tags')->widget(TagsInputWidget::className()) ?>

```


## yii2 ueditor
```
	https://github.com/BigKuCha/yii2-ueditor-widget
	https://www.yii-china.com/post/detail/3.html
	可能出现的问题及解决
	https://www.cnblogs.com/teresalast/p/10013005.html
	
配置
<?= $form->field($model, 'content')
    ->widget('common\widgets\ueditor\Ueditor',[
    'options'=>[
      // 'initialFrameWidth' => 850,
      'initialFrameHeight' => 850,
      //定制菜单
      'toolbars' => [
        [
          'fullscreen', 'source', 'undo', 'redo', '|',
          'fontsize',
          'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'removeformat',
          'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|',
          'forecolor', 'backcolor', '|',
          'lineheight', '|',
          'indent', '|'
        ],
      ]
    ]
  ]) ?>
```


## yii2 
```
	https://github.com/unclead/yii2-multiple-input
```