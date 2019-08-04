# Yii2 关键概念

1. Controller 控制器
2. Model 模型
  * ActiveRecord 活动记录
  * Model
  * Gii可以生成 模型，控制器，表单，增删查改的功能的代码

3. View 视图

4. Widget 小部件
5. Active Filters 动作过滤器
6. Form 表单栏

7. Caching 缓存
8. Security 安全
9. HandingRequest 请求
10. Helpers 助手类

```php

  Yii 全局的类
  Yii::$app-> request   请求处理
  Yii::$app-> response  响应处理
    $app 应用主体
    request 请求组件
    <?= Yii::$app->homeUrl ?> 首页
    
    
  ActiveRecord 活动记录，关联数据库的字段

  session 既可以是对象，也可以是数组，为啥？
  因为 session继承了 ArrayAccess Interface
  
  /views/layouts/main.php 模板设置

  frontend & backend & common/config/main.php 配置


```



## PHP 开发中的想法
* 一个功能就是一个控制器
* 学一个知识点，要知道这个知识点是解决什么问题的
* 为啥要自己开发框架
  1. 为了更高的运行效率
  2. 为了更快的开发效率
  3. 为了证明自己技能

* 通过面对相同的问题，思考个人实践方案和框架的思路的区别和优劣



## Yii2 Widgets 小部件

* 数据小部件，可以用于显示数据

* DetailView 显示一条记录数据
  * 一个 Model模型类对象的数据
  * ActiveRecord类的实例对象，键值对构成的一个关联数组

* GridView 使用 table表格来显示数据， 展示多条数据的列表
  * 配置 model, attribute, template, options 属性，就可以创建一个 DetailView

* ListView 自定义显示HTML内容， 更加灵活地设置数据展示的格式
  * ListView 和 GridView 能够用于显示一个拥有分页，排序，过滤功能的列表或表格

* DataProvider
* PostSearch 搜索类



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



