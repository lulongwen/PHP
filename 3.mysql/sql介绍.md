# Mysql介绍

* 数据库的本质还是一个文件，但是数据库的结构利于数据的管理，增删改查
* 就像图书馆一样，能够快速找到分类好的文件
  * 解决之道： 文件，数据库
* 文件保存数据的缺点：
  * 安全性问题
  * 不利于查询和对数据的管理
  * 不利于存放海量数据
  * 在程序中控制不方便

* 学习数据库的重点：
  + 对数据的 增删改查
  + 把一个项目的需求对应的数据库（表）合理的设计出来
  + Windows下开发 PHP 扩展 .dlll 的方法步骤

* 数据库的 CRUD（增删改查）操作
  + Insert 增加数据
  + Update 更新数据
  + Delete 删除数据
  + Select 查找数据

* php如何操作 Mysql数据库

* Mysql常用的函数



## SQL 常用方法
```
  alert 是修改房间，修改表结构

  update 是修改家具，修改表数据


```



## 数据库的模型
1. 物理模型，包括数据库或模式的表、栏位、视图、外键限制和其他物理属性。
2. 逻辑模型，包括实体、属性和关系
3. 实体和关系
[Navicat Data Modeler 介绍](https://www.navicat.com.cn/products/navicat-data-modeler)



## Mysql的安装
  * 解决 Mysql不是内部或外部命令，配置环境变量
    ```
    进入到 mysql/bin 目录下，执行命令行可以启动 Mysql

    添加环境变量
      C:\xampp\mysql\bin
    ```