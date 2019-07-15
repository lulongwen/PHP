# PHP 知识点


## 预定义超全局数组
```
	$_FILE 文件编程
	$_COOKIE 会话技术
	$_SEEEION session
	$_GET
	$_POST

```

## PHP细节
```
	::用于静态上下文
		某些方法或属性声明为静态时，不用实例化直接调用类的方法 

	:

	-> 调用类的函数
		引用一个类的属性和方法

	=> 定义数组
		array('1' => 5, 'b' => 'ok')


	<?= ?> 短标签 等价于 <?php echo ?>
		短标记只用来输出变量或表达式，不支持 if for foreach
		在 PHP.INI 里打开短标记 short_open_tag = On
		<?= 以代替 <? echo
	<?= $a ?>
	<?= (表达式) ?>
	就相当于
		<?php echo $a?>
		<?php echo (表达式)?>
		<?if(...?> 会输出 <!--if(...-->



	<?php ?> 长标签
	推荐用长标记，往html中插入输出的时候会用短标记

	写结束符的好处：
	避免 ?> 后面的不可见字符（多余的空格、换行符）等
	破坏页面显示，也不会导致 Header already sent 这样的警告信息


	只要是有值的，都是表达式
	PHP中，几乎所写的任何东西都是一个表达式

	搭建自己的框架

	dll 反编译
	  * 封装私有函数，不让别人看到代码
	  * php .dll 动态文件编写
	  * php .dll 文件反编译


```


## PHP词汇
```
	MQ Message queue 消息队列
		* 队列我们可以理解为管道。以管道的方式做消息传递
		* 高并发系统的核心组件之一
		* RocketMQ 消息队列
			* 阿里系下开源的一款分布式、队列模型的消息中间件
		* ZeroMQ
			* 号称最快的消息队列系统，专门为高吞吐量/低延迟的场景开发
			* 在金融界的应用中经常使用，偏重于实时数据通信场景

	使用Redis、RockMQ写一个大并发的、多服务器的秒杀出来



	PHP的socket、进程、线程、协程等技术
	cookie和session实现用户登陆、注册
	GD库，实现个验证码
		* GD php处理图形的扩展库
		* 通常用来生成缩略图，对图片加水印，生成汉字验证码




	PSR PHP Standards Recommendation
		* https://www.jianshu.com/p/b33155c15343

	PHP解决网站大数据大流量与高并发
		* https://www.cnblogs.com/lazb/articles/5347356.html


	大并发架构，学一些NoSQL技术、Swoole技术、keepalived技术等多项不同的技术

	深入学习Yii2 框架，结合前端的知识，写个多品类的商城、写一个OA系统

	Linux服务器的主要了解多服务器的部署，了解软件安装，特别是LAMP和LNMP的环境搭建


	全文搜索
		* ElasticSearch
  	* coreseek shpinx
  	* xunsearch 迅搜


```

