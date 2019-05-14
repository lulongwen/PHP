高效开发
https://www.leixuesong.cn/3450
http://www.yyyweb.com/5112.html
http://www.yyyweb.com/5136.html
http://www.yyyweb.com/386.html
http://www.yyyweb.com/4947.html

博客
https://github.com/fouber/blog
https://github.com/mqyqingfeng/Blog

三角函数动画
https://juejin.im/entry/5b79a1d6f265da4343459b7f

vue规范
https://juejin.im/post/5ada9b586fb9a07aaf34c746


算法
https://juejin.im/post/5958bac35188250d892f5c91
https://juejin.im/post/5aa4cd1051882577b45ea2c3#heading-8

前端知识点
https://juejin.im/post/5cc1da82f265da036023b628
前端面试
https://juejin.im/post/59e9cea151882561a05a355a
https://juejin.im/entry/580cdbeec4c9710058943151
https://juejin.im/post/5a961d496fb9a06356314a36
https://juejin.im/entry/5781b8db0a2b58005765e628

技术大拿
https://juejin.im/post/5a9224c6f265da4e710f7786


消息提示动画
git@github.com:caroso1222/notyf.git


水波纹效果
<link rel="stylesheet" href="ripple.min.css">
<a class="ripple">Link</a>


https://github.com/fians/Waves


turn.js 翻书效果
http://www.turnjs.com/#
https://github.com/blasten/turn.js


浏览器和服务器之间的通信协议就是 HTTP


文章信息
	id(主键),
	create_by(创建人),
	create_date(创建日期),
	update_by(更新人),
	update_date(更新日期),
	version(版本号,乐观锁),
	is_deleted(是否删除),
	title(标题),
	type(文章分类,可以是springBoot,java等),
	is_top(是否置顶),
	author(作者),
	original_link(原始链接),
	is_original(是否原创),
	is_private(是否是私密)


文章内容
	id,
	create_by,
	create_date,
	update_by,
	update_date,
	version,
	is_deleted,
	content(text)(内容),
	article_info_id(文章信息id),

文章评论
	id,
	create_by,
	create_date,
	update_by,
	update_date,
	version,
	is_deleted,
	content（内容）
	name,
	email,
	article_info_id(如果是评论需要保存信息id)，
	type（1是评论，2是留言）


文章图片
	id,
	create_by,
	create_date,
	update_by,
	update_date,
	version,
	is_deleted,name,
	picture_url,
	article_info_id

文章类型
	id,
	create_by,
	create_date,
	update_by,
	update_date,
	version,
	is_deleted,
	code,
	value,
	name,
	remark(备注)

系统图片
	id,create_by,create_date,
	update_by,update_date,version,is_deleted,type,name,picture_url,type,code


// 设置 id 自动增长 序号
alter table comment AUTO_INCREMENT=9;



CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `username` varchar(255) NOT NULL COMMENT '用户名',
  `auth_key` varchar(32) NOT NULL COMMENT '自动登录key',
  `password_hash` varchar(255) NOT NULL COMMENT '加密密码',
  `password_reset_token` varchar(255) DEFAULT NULL COMMENT '重置密码token',
  `email_validate_token` varchar(255) DEFAULT NULL COMMENT '邮箱验证token',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `role` smallint(6) NOT NULL DEFAULT '10' COMMENT '角色等级',
  `status` smallint(6) NOT NULL DEFAULT '10' COMMENT '状态',
  `avatar` varchar(255) DEFAULT NULL COMMENT '头像',
  `vip_lv` int(11) DEFAULT '0' COMMENT 'vip等级',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=560 DEFAULT CHARSET=utf8 COMMENT='会员表';

[
	'username',
	'match',
	'pattern'=>'/^[(\x{4E00}-\x{9FA5})a-zA-Z]+[(\x{4E00}-\x{9FA5})a-zA-Z_\d]*$/u',
	'message'=>'用户名由字母，汉字，数字，下划线组成，且不能以数字和下划线开头'
],

admin
	https://adminlte.io/
	侧边栏效果
	https://tympanus.net/Development/SidebarTransitions/

	无限极菜单
	http://www.cnblogs.com/jihua/p/duojicaidan.html
	https://blog.csdn.net/zy1281539626/article/details/72545957


CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `summary` varchar(255) DEFAULT NULL COMMENT '摘要',
  `content` text COMMENT '内容',
  `label_img` varchar(255) DEFAULT NULL COMMENT '标签图',
  `cat_id` int(11) DEFAULT NULL COMMENT '分类id',
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `user_name` varchar(255) DEFAULT NULL COMMENT '用户名',
  `is_valid` tinyint(1) DEFAULT '0' COMMENT '是否有效：0-未发布 1-已发布',
  `created_at` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `idx_cat_valid` (`cat_id`,`is_valid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8 COMMENT='文章主表';



CREATE TABLE `cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `cat_name` varchar(255) DEFAULT NULL COMMENT '分类名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='分类表';


CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `tag_name` varchar(255) DEFAULT NULL COMMENT '标签名称',
  `post_num` int(11) DEFAULT '0' COMMENT '关联文章数',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag_name` (`tag_name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COMMENT='标签表';


CREATE TABLE `relation_post_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `post_id` int(11) DEFAULT NULL COMMENT '文章ID',
  `tag_id` int(11) DEFAULT NULL COMMENT '标签ID',
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_id` (`post_id`,`tag_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COMMENT='文章和标签关系表';




yii 前后台注册用户隔离
https://www.cnblogs.com/tystudy/p/6201317.html

yii2 前后台登录。默认用的是同一张表，前台注册，后台可一登录


数学其实是专心于算法与模型的。
统计学会告诉你应当理解数字背后代表的含义，
	从在在适当的时候讲合适而且准确的数字提供给正确的人。
	数据不仅仅是几个数字那么简单，它们背后隐含着丰富的信息

分布式架构下数据库一致性常用方法初探
https://mbd.baidu.com/newspage/data/landingsuper?context=%7B%22nid%22%3A%22news_9138654554177468096%22%7D




yii migration
	数据库自动新增 user 和 migration表

	tag 独立的表

	给一个主表设置外键

	链接数据库默认的 localhost 改为127.0.0.1, 速度马上就正常了

r=gii 使用 gii
	backend/web/index.php?r=gii


	ActiveRecord 和数据库相关，数据的增删查改

	增删查改都是后台的功能，
	Model Class
	common\models\Post

	Search Model Class
	common\models\PostSearch

	Controller Class
	common\controllers\PostController

	View Path
	@app/views/post



数据库改变，如何用 gii 生成代码


linux 系统严格区分大小写


yii 博客系统
https://www.imooc.com/learn/743


phpstorm的用法
https://www.imooc.com/learn/938


高效的yii
https://www.imooc.com/learn/440

php实现页面静态化
https://www.imooc.com/learn/330




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

	category 分类

	tag 标签
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















