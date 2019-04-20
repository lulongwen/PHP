# 用户管理
	* 对 mysql.user 直接操作进行用户等增加，修改，删除都必须 flush privileges 才能生效


## 创建用户
	```
	语法：
	create user '用户名@允许用户登录位置'indentified by '密码';

	对用户授权的时候可以同时创建新用户
	insert into mysql.user(host, user, password)
	values('localhost', 'lucy', password('123456'));
	```


## 查看用户
	```
	select * from mysql user;
	select * from user;
	```


## 修改用户信息
	```
	修改自己的密码
		set password = password('密码');

	修改别人的密码
		set password '用户名@允许登录的位置' = password('密码');

	对用户授权的时候可以同时修改用户的密码

	```


## 删除用户
	```
	drop use '用户名@允许登录的位置';

	drop use '用户名'; 等价于
		drop use '用户名'@'%';

	drop use '用户名@192.168.0.%';
	```


## 给用户权限
	```
	语法：
	grant 权限列表 on 库.对象名 to @'用户名'@'登录位置' [identified by 'ps'];

	identified by 可以省略
		如果用户存在，就是修改该用户的密码
		不存在，就是创建该用户

	*.* 代表系统中所有数据库的所有对象（表，视图，存储过程）
	库.* 某个数据库中的所有数据对象（表，视图，存储过程）



	多个权限用逗号分开 ,
	grant select on
	grant select, delete, create on

	赋予该用户在该对象上的所有权限
	grant all on
	grant all privileges on

	```


## 回收用户权限
	```
	revoke 权限列表 on 库.对象名 from @'用户名'@'登录位置';
	```