# Swoole
- 异步场景 全面剖析
- 网络通讯引擎系统精讲
- 并发编程之美
- PHP一直无法突破并发编程的瓶颈，直到Swoole出现
	+ 网络通讯引擎
	+ 异步IO
	+ 并发支撑



## Swoole 是什么
1. C语言编写的扩展
	* 异步网络通信引擎
	* 最终编译为 so文件作为 php的扩展
2. 异步，并行，高性能网络通信引擎
3. 异步特性
4. 支持协程



## Swoole 知识点
* 异步 
	* mysql
	* redis
	* 文件
	* task任务

* 毫秒定时器
* 进程 & 协程 & 内存
* 消息队列



## Swoole 应用范围
* 互联网
* 网络游戏
* 聊天室
* 在线直播



## Swoole实战
1. 登录模块

2. 赛事直播模块
	* 利用Swoole websocket
	* 和异步任务task机制处理
	* 赛制直播

3. 聊天室模块
	* swoole server connections
	* 获取在线用户连接数
	* websoctet+task机制高效
	* 处理信息

4. 系统调优
	* linux + swoole调优平台系
	* 统服务 / task机制罗盘日志
	* 挖掘分析系统瓶颈 / 消息队
	* 列解决验证码发送问题

5. 系统监控
	* 利用linux的特性监控赛事直
	* 播平台服务的稳定性



## swoole和框架结合
* swoole 写 API很合适，可以和yii laravel框架结合，
* 还可以用开源的框架 easyswoole, swoft 这两个是基于 swoole开发的框架