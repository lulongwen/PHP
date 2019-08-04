# Yii2 实战练习

* YII2 PHP版本，要求PHP5.4 以上
  * localhost/requirements.php 查看安装环境



## 1 Basic 应用模版的安装
```
1 用 composer 安装
  composer create-project yiisoft/yii2-app-basic basic
  composer create-project --prefer-dist yiisoft/yii2-app-basic basic

2 下载归档文件安装
	解压到 根目录下，改为项目名字
	phpStorm导入项目，修改配置文件，设置 cookie的验证字符串

```



## 2 Advanced 应用模版安装

```
1 用 composer 安装
  composer create-project yiisoft/yii2-app-advanced Shop
  composer create-project --prefer-dist yiisoft/yii2-app-advanced Shop

  官方下载的源码中是缺失配置文件和index.php，需要执行 init
  windows 直接点击 根目录下的 init.bat
  或 php init, 选择开发模式

  接下来，链接数据库
	先创建一个数据库，打开配置文件，填好数据库名和密码

  控制台上再输入 yii migration，数据库就会增加一个表，就是 User表，用来存储登录用户的


  上线虚拟主机配置
    https://www.yiichina.com/doc/guide/2.0/tutorial-shared-hosting
  本地服务器配置
    https://www.yiichina.com/doc/guide/2.0/start-installation


2 下载归档文件安装
	解压到 根目录下，改为项目名字
	phpStorm导入项目，修改配置文件，设置 cookie的验证字符串

```


## Gii的使用
* Gii可以生成 模型，控制器，表单，增删查改的功能的代码
* 配置文件中启用 Gii模块
* 根据提示填写表单即可生成制定的代码

```php
  http://localhost/blog/frontend/web/index.php?r=gii

```


## index.php?r=gii 为啥不报错

```
  yii框架用了模块化的思想进行设计
  yii有很多模块，gii 是其中的一个模块，模块都是挂在在应用主体之上的 $app
  写了 r=gii 后，应用主体会进行处理，会判断 英文单词是 模块还是控制器
  如果是模块，会直接调用模块进行处理
  如果是个控制器，才会交给应用主体 $app去查找对应的控制器进行处理
    每个模块都是 MVC结构


数据库发生改变，增加了字段，如何用 gii来修改代码
  重新用Gii生成代码，绿色是新增的代码，红色是原来的代码
  一定不要覆盖，直接 diff 复制绿色的代码到编辑器中
```



## Yii 资源
```
  https://github.com/forecho/awesome-yii2

图片上传
  https://www.yii-china.com/post/detail/15.html
  
form
  https://www.cnblogs.com/chrdai/p/8005492.html
  
composer 问题参考
  https://www.jianshu.com/p/fd13c26a9404

twbs4
  https://github.com/yiisoft/yii2-bootstrap4


一个域名管理前后台
  https://blog.csdn.net/qq_31648761/article/details/54949272

```














