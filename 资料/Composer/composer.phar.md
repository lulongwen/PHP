# Mac Composer Could not open input file: composer.phar 的问题

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
