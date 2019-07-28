# MAC MAMP 配置

## php & mysql加入环境变量
```
mysql 加入环境变量
	sudo ln -s /Applications/MAMP/Library/bin/mysql /usr/local/bin/mysql
	
	添加失败，报错信息提示的路劲跟配置的路劲发现不一样
	Can't connect to local MySQL server through socket '/tmp/mysql.sock'

	查看本地 socket
	/Applications/MAMP/tmp/mysql/mysql.sock
	/tmp/mysql.sock // 初始化后生成到配置文件指定到的目录

	解决办法，设置软连接
	sudo ln -s /Applications/MAMP/tmp/mysql/mysql.sock /tmp/mysql.sock
	mysql -u root -p ，提示输入密码就成功了


apache加入环境变量
	sudo ln -s /Applications/MAMP/Library/bin/httpd /usr/local/bin/httpd


php加入环境变量， subl 是sublime的命令行
	subl ~/.bash_profile

	# MAMP php版本目录
	export PATH="/Applications/MAMP/bin/php/php7.3.1/bin:$PATH"

	保存
	source ~/.bash_profile

	之前的 PHP路径
	which php
	/usr/local/bin/php

	修改后的 PHP路径
	which php
	/Applications/MAMP/bin/php/php7.3.1/bin/php


	~/.profile export PATH
	PATH=/Applications/MAMP/bin/php/php7.3.1/bin:$PATH
	export PATH

```



## PHP 运行慢
```
hosts 设置 
127.0.0.1 longwen.local
::1 longwen.local

```



## 常见错误
1. You don't have permission to access /blog/ on this server
```
修改 /Application/MAMP /conf/ apache/httpd.conf 
	1 去掉 Virtual hosts 下 include前面的 # 号，在 575行
	# Virtual hosts
	Include /Applications/MAMP/conf/apache/extra/httpd-vhosts.conf

	2 修改 204行的
	<Directory />
    Options Indexes FollowSymLinks
    AllowOverride None
	</Directory>

	修改为
	<Directory />
    Options Indexes FollowSymLinks Includes ExecCGI
    AllowOverride All
    Order deny, allow
    Allow from all
	</Directory>

	<Directory />
  Options FollowSymLinks
  AllowOverride None
  Order deny,allow
  allow from all
	</Directory>

```



2. 中文乱码
```
mamp pro apache配置文件httpd.conf，在任意一行后加入

	IndexOptions Charset=UTF-8
```















