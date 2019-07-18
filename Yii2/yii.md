# Yii2
* 性能稳定，开发速度快， 安全性好，可扩展性
* 入门容易，精通不易，很多大型企业喜欢用 Yii
* 学习目标：构建面向企业的 SaaS
  * 包括团队管理，用户权限
  * 通过Stripe计费，构建支付系统


## 安装 Yii
```
YII 2.0 advanced版本要求，PHP5.4以上

  composer create-project yiisoft/yii2-app-advanced Shop
  
  官方下载的源码中是缺失配置文件和index.php，需要执行 init
    windows 直接点击 根目录下的 init.bat
    或 php init
  
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

```


## PHP 开发中的想法
* 一个功能就是一个控制器
* 学一个知识点，要知道这个知识点是解决什么问题的
* 为啥要自己开发框架
  1. 为了更高的运行效率
  2. 为了更快的开发效率
  3. 为了证明自己技能

* 通过面对相同的问题，思考个人实践方案和框架的思路的区别和优劣


## Yii2 核心知识点
* DetailView
* GridView
* ListView
* DataProvider
* PostSearch

### DetailView

### GridView
  * table 表格展示
  * 展示多条数据的列表

### ListView
  * 自定义显示内容
  * 更加灵活地设置数据展示的格式

### PostSearch
  * 搜索类


## Gii
```
index.php?r=gii 为啥不报错
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


## Yii模块化开发
* 把项目划分为一个个模块
* 模块要有配置文件，配置文件里面要有开启和关闭功能


### 扩展性
  模块化
  时间机制
  mixin混入
  依赖注入


### 延迟加载
  类的延迟加载
  类的映射表机制
  组件的延迟加载

### 数据缓存
  数据缓存的增删改查
  缓存的有效期
  缓存中的依赖关系


#### 页面缓存


#### 片段缓存
  片段缓存的设置 & 嵌套


#### http缓存到浏览器
  http缓存设置 & 缓冲时机
  lastmodified
  etag
  缓存实例


## Scenario 场景
* 场景一般在表单模型 model里面创建

```
yii2-scenario场景的使用讲解
  Model类的load和validate两个方法，分别用来收集和校验客户端数据。
  哪些数据应该被收集，哪些数据需要在什么场景下验证，场景(scenario)和验证规则(rule)。

  $model->isNewRecord;

  关键点是批量赋值（massive assignment）和数据校验（validate）两个方法。
  如果对不同的场景指定赋值字段和检验规则，问题就迎刃而解。

  业务复杂时定义多个场景，仔细为每个场景定义安全属性和校验规则
```


## HTMLpurfile
* 开发人员应该记住的准则：客户端的输入都是不可信
  * 客户端传过来的数据 先进行过滤和清洗后 再存储或传递到内部系统



