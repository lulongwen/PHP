# PSR2 代码规范

* https://www.php-fig.org/psr/psr-2
* https://qq52o.me/2448.html


## 安装 phpcs & php-cs-fixer
```
composer global require 'squizlabs/php_codesniffer=*'

composer global require 'friendsofphp/php-cs-fixer'


查看 composer安装目录
	composer global config bin-dir --absolute
		/Users/lulongwen/.composer/vendor/bin

composer remove fabpot/php-cs-fixer

设置软连接
	ln -s composer路径/phpcs /usr/local/bin/phpcs
	ln -s composer路径/phpcbf /usr/local/bin/phpcbf
	例如：

	ln -s /Users/lulongwen/.composer/vendor/bin/phpcs /usr/local/bin/phpcs
	ln -s /Users/lulongwen/.composer/vendor/bin/phpcbf /usr/local/bin/phpcbf
	ln -s /Users/lulongwen/.composer/vendor/bin/php-cs-fixer /usr/local/bin/php-cs-fixer


.bat 文件
	/Users/lulongwen/.composer/vendor/squizlabs/php_codesniffer/bin/phpcs.bat

	/Users/lulongwen/.composer/vendor/squizlabs/php_codesniffer/bin/phpcs


检查php 代码
	phpcs --standard=PSR2 yiishop/app
		yiishop 项目名称
		定PHP Code Sniffer帮我们检查 app目录下所有的.php文件
		PHP Code Sniffer预设的coding style为PEAR，
		因为我们用的是PSR-2，所以要特别使用加上 --standard=PSR2

```



## PHP Coding Standards Fixer简称php-cs-fixer
* PHP Code Sniffer 可以帮我们找出哪些code不符合PSR-2
	* 若只有几个文件，我们手动改就可以
	* 文件太多，就得依赖php-cs-fixer帮我们修正













