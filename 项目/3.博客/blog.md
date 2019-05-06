# PHP博客系统总结
* Gii工具的使用
* 扩展的使用
  * 编辑器扩展
  * 图片上传扩展
  * 标签的扩展
  
* Yii框架的应用
  * 场景应用，事件，rule规则，挂件等
* Yii核心思想
  * 快速开发
  * 避免重复劳动，提升代码重用可扩展



## 1 博客系统的功能
1. 博客系统前台功能
	* 文章列表
	* 阅读文章
	* 发表评论
	* 注册
	* 登录和退出

2. 博客系统后台功能
	* 文章的增删查改
	* 保存文章
	* 评论的删除，修改和审核
	* 会员用户管理
	* 管理员用户管理和权限设置
	* 登录和退出

3. 博客系统其他需求
	* 系统的首页，以分页显示，最新的文章列表
	* 显示文章，同时也显示评论
	* 标签使用频率的标签云，点击标签列出相应的文章
	* 最新评论列表



## 2 博客系统数据库表 blog
```
blog
	admin_user
	comment
	comment_status

	post
	post_status

	tag
	user

```


## 3 Yii基础配置
1. 新建和链接数据库
2. 路由配置
3. 语言包的配置
4. 独立的用户系统

```
新建和链接数据库
	# 博客 host 设置本地域名
	127.0.0.1 www.blog.com
	127.0.0.1 admin.blog.com


	Apache\conf
	<VirtualHost *:80>
		DocumentRoot "E:/yii2/frontend/web"
		ServerName www.blog.com
	</VirtualHost>

	<VirtualHost *:80>
		DocumentRoot "E:/yii2/backend/web"
		ServerName admin.blog.com
	</VirtualHost>


路由配置
	去掉 index.php 入口脚本
		frontend/web/ 目录下 添加 .htaccess 文件去掉 index.php
	开启 url美化
		frontend/config/main.php 'user' 后面添加
		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'suffix' => '.html'
		],

	.htaccess
		RewriteEngine on
		# 如果是个目录或文件，就访问目录或文件
		RewriteCond %{REQUEST_FILENAME} !-d

		# 如果文件存在，就直接访问文件，不进行下面的 RewriteRule 路由重写
		RewriteCond %{REQUEST_FILENAME} !-f
		RewriteRule . index.php


语言包的配置
	开启中文编码
	设置语言包
	添加语言包

	message.php
		<?php
		return [
			'Blog' => '博客',
			'About' => '我自己'
		]
	
	main.php
		$menuItems = [
			// 默认语言包
			['label' => Yii::t('yii', 'Home'), 'url'=> ['/site/index']],
			// 自定义语言包
			['label' => Yii::t('common', 'About')],
		]


	'i18n' => [
		'translations' => [
			'*' => [
				'class' => 'yii\i18n\PhpMessageSource',
				'basePath' => '/message',
				'fileMap' => [
					'common' => 'common.php'
				]
			]
		]
	],


```

### 独立的用户表
* 前台登录，用户表
* 后台登录，管理员表，数据库中进行分表处理
* yii默认前后台登录用的是一张表，前台可以登录后台，设计的不合理




## 4 Yii 前台开发设置
1. 前台界面布局
2. 博客系统登录
3. 创建控制器与数据表


## 5 后台开发设置
* 管理后台的登录
* 后台的整体布局设置
* 会员的管理
* 博客内容的管理，增删改查















