# Message 留言板
	* 前台
		* 发布留言界面 index.html, 提交表单到后台的 index.php
			* 后台接收数据的文件名要和前台对应，这样规范些
		* 查看留言 info.php

	* 后台
		* 登录 login.php
		* 展示留言列表 index.php
		* 编辑 edit.php
		* 删除 delete.php

## 留言板需求分析


## 留言板流程图


## 留言板数据库
	```
	1 创建数据库
	create database message charator=utf8mb4;
		选择数据库
		use message;

	2 创建表
	create table mes_info(
		id int auto_increment comment 'id',
		title varchar(20) not null comment '标题',
		content text not null comment '内容',
		addtime varchar(20) not null comment '留言时间',
		primary key(id) -- 主键
	)engine=Innodb charator=utf8mb4;

	3 链接mysql

	4 前台提交留言，前台的验证不能为空，后台验证
	```




















