# Mysql

## 数据库类型
* 关系型数据库
* 非关系型数据库
* 结构数据库
* 时序数据库等，将得到越来越广泛的应用
  * 不远的将来，以云为基础的云数据库将越来越多的影响人们的生活

* 网站的瓶颈
  * 网站的带宽 & 数据库
  * 数据库的原则：能不链，就不要连接数据库，因为数据库链接是最吃力的

```sql

  mysql -u root -p
  mysql -h127.0.0.1 -P3306 -uroot -p

```


## 数据库分析
```
Dedecms 数据库结构分析
  http://help.dedecms.com/develop/2011/0627/141.html

```



## 1. [创建数据库 database.sql](1.创建数据库/database.sql)
  字符集，排序规则
  存储引擎 show engines;
  修改数据库，恢复数据库，显示数据库
  显示数据库的创建

2. [创建表 table.sql](2.创建表/table.sql)
  字符集，校对规则，引擎
  表的约束，主键，外键，唯一性，注释
  修改表名，字段名，数据类型，字段排列位置
  添加字段，删除字段，备份表
  创建海量数据

3. 数据类型
  * 整数类型
  * 浮点数类型
  * 日期和时间
  * 字符串

4. Mysql函数
  * 时间日期函数
  * 字符串函数
  * 数学函数
  * 流程控制函数
  * 其他函数

5. 数据库的 CRUD

6. [SELECT 语句, 参照 select.sql](select.sql)

7. Select 复杂查询
  * 多表查询
  * 子查询
    from子句中使用子查询，子查询看作是一个临时表，要有别名 alias
  * 合并查询 union & union all
  * 内连接 inner join ... on
  * 外连接
    左外连接 left join ... on ...
    右外连接 right join ... on ...

8. 表的约束
9. 索引
10. 事务
11. 视图
12. 用户管理




## 表的完整性 & 约束
* primary key 主键
* foreign key 外键用于保持数据一致性，完整性
* index       索引
* unique index 唯一索引


### index
* 在表中每加进一个索引，数据库就要做更多的工作。过多的索引甚至会导致索引碎片
* “适当”的索引体系，特别是对聚合索引的创建，更应精益求精，以使您的数据库能得到高性能的发挥

```
	or 会引起全表扫描
```


### primary key


### unique index

## 启动mysql服务
* 通过控制 servers.msc，在服务中查看 mysql服务的名字
* 使用命令可以开关 mysql服务
* 以管理员身份运行cmd
```
	net start mysql57
	net stop mysql57
```

## mysql创建数据库
```
	create database db2;
	show databases;
```

## 使用数据库
```
	use tb2;
	select database();
```

## 创建数据表
```
	create table user(
		id tinyint not null primary key auto_increment,
		username varchar(20) not null
	);

	show create table user; 显示创建的表代码
	show COLUMNS from user; 显示当前表的列
```

## 查找表
```
select * from user;
```

## 表中插入内容
```
insert user(username) value ('jw');
```


## 添加主键约束
```
alter table student change id id int not null primary key ;
alter table student add CONSTRAINT student_id PRIMARY KEY (id);
```

## 添加外键约束
```
create table student(
	id int not null PRIMARY KEY auto_increment,
	name varchar(20),
	pid int,
	FOREIGN KEY (pid) REFERENCES province(id) 
);
alter table student add FOREIGN key (pid) REFERENCES province(id);
```
## 添加唯一约束
```
alter table student add CONSTRAINT UNIQUE (username);
```

## 添加默认约束
```
alter table student alter number set DEFAULT 30;
```

## 修改列的顺序
```
alter table student MODIFY id int not null AFTER username;
```

## 修改列名
```
alter table province change COLUMN city province varchar(20)
```

## 删除列
```
alter table student drop COLUMN id;
```

## 删除主键
```
alter table student drop primary key;
```

## 删除外键
```
alter table student drop FOREIGN key student_ibfk_1
```

## 删除默认约束
```
alter table student alter number drop default ;
```


