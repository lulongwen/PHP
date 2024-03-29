# MVC 架构思维

* MVC模式：视图，控制器，模型
  * 模块和操作
  * 主入口文件
  * MVC模式应用，最终实现一个简单的MVC框架

* MVC的优势：便于多人同时分工，提升开发效率
  * 不见得使用框架会提升执行效率，性能上右损耗；
  * 要提升执行效率，要在框架中通过PHP代码，SQL语句的优化提升执行效率
  
  所有的请求都要经过 控制器 *Action.php
  
* 框架中最小的单位是 class

* 学习目的：
  * 会用框架是基本要求，理解MVC模式，最终实现一个简单的MVC框架
  

### Model 模型，专门用来处理数据
- 专门处理数据，执行SQL语句
- 对应的职位是：DBA Database Administrator 数据库管理员
- 业务逻辑都在 model

### View 视图，专门用来显示内容
- 显示数据
- HTML文件

### Controller： 控制器，用来分发任务
- 命令模型处理数据
- 命令视图显示数据


### MVC运行流程
入口文件 -> 定义常量 -> 引入函数库 -> 自动加载类
                                        ↓
                                        ↓
返回结果 -> 加载控制器 -> 路由解析  ->  启动框架


## 创建 MVC目录
1. 根据 MVC思想，创建3个文件夹，分别是 model, view, controller
2. 面向对象思想封装 MVC框架

