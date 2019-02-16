# Mysql
```
1. 创建数据库
  字符集，校对对着
  存储引擎 show engines;
  修改数据库，恢复数据库，显示数据库
  显示数据库的创建

2. 创建表
  字符集，校对对着，引擎
  表的约束，主键，外键，唯一性，注释
  修改表名，字段名，数据类型，字段排列位置
  添加字段，删除字段，备份表
  创建海量数据

3. 数据类型
  3.1 整数类型
    bit 按照 ascii 码对应的字符显示，只有 0,1 考虑使用 bit，节约空间
    tinyint 有符号，无符号
    int
  3.2 浮点数类型
    float(M,D) unsigned，单精度浮点精确大约7位数
    decimal(M, D) 默认 decimal(10, 0)
  3.3 日期和时间
    year
    date
    time
    datetime
    timestamp insert & update 会自动更新
  3.4 字符串
    char(size)
      固定长度
      查询速度大于 varcha，丢失空格
      场景：手机号码，邮编，身份证号，
    varchar 变长，最大 65532字节，不会丢失空格
    text 存放文本类型，不能有默认值
    enum
      枚举类型，就是单选类型
      值存储的是“数字”，对应从 1 开始的下标
      只能添加一个值，并且值必须是 enum规定好的
    set
      多选类型，不能设置默认值，存储的也是下标
      查询: find_in_set('ball', hobby)
    blob

  4. Mysql函数
    6.1 时间日期函数
    6.2 字符串函数
    6.3 数学函数
    6.4 流程控制函数
    6.5 其他函数

  5. 数据库的 CRUD

  6. [SELECT 语句, 参照 sql_SELECT.sql](sql_SELECT.sql)

  7. Select 复杂查询
    7.1 多表查询
    7.2 子查询
      from子句中使用子查询，子查询看作是一个临时表，要有别名
    7.3 合并查询
      union & union all
    7.4 内连接
      inner join ... on
    7.5 外连接
      左外连接
      left join ... on ...
      右外连接
      right join ... on ...

  8. 表的约束

  9. 索引

  10. 事务

  11. 视图

  12. 用户管理
```


## 1 [创建数据库, 参照 database.sql](database.sql)

## 2 [创建表, 参照 table.sql](table.sql)

### 2.1 存储引擎
* Mysql的表类型有存储引擎 Storage Engines 决定，支持6种类型
  非事务安全型，不支持事务
    MyIsam
    Isam
    Memory
    Merge

  事务安全型 transaction-safe
    InnoDB
    BDB

* 查看, 修改引擎
  ```sql
  show engines;
  alter table `tb_name` engine = myisam;
  ````
  

* 选择储存引擎
  MyIsam
  不需要事务，CRUD操作，首选 MyIsam，速度快
    不支持事务，外键，访问速度快
    删除数据，空间没有回收，要定时整理碎片
    处理：optimize table `tb_name`
    MyIsam 对应 3个文件
    
  InnoDB 事务引擎
    具有提交，回滚和崩溃回复能力的事务安全
    写的效率差，并且占用更多的磁盘空间以保留 数据 和 索引
    InnoDB 对应一个文件

  Memery
  数据量不大，数据变化频繁，不需要永久保存，选 Memery
    场景：用户的在线状态
    访问速度快，因为数据存在内存中，没有磁盘 I/O等待，默认使用 HASH 索引
    缺点：一旦关闭服务，表中的数据就会丢失，但表的结构还在



## 4 Mysql 函数
### 4.1 时间日期函数
  ```sql
  current_date()
  -- 没有表的情况下，用 dual
  select current_date() from dual;

  current_time()

  current_timestamp()

  date_add()
  
  date_sub()

  datediff()

  now()

  date(datetime)
  year(datetime)
  month(datetime)


  from_unixtime()

  unix_timestamp()
  ```

### 4.2 字符串函数
  ```sql
  charset()

  concat(string, ...)

  ucase()

  lcase()

  length()

  replace(string, search_str, replace_str)

  -- 从 1开始
  substring(string, position)
  ```

### 4.3 数学函数
  ```sql
  abs()

  ceiling()

  floor()

  format(number, decimal_place) // 保留2位小数

  rand()
  ```

### 4.4 流程控制函数
  ```sql
  if
  select if(sex='mail', name, id) from 'emp';

  ifnull

  select case when expr1 then expr2 else expr3 end;
  select case 
    when sex='mail' 
    then birthday
    else entry_date as 'yy' from 'emp';
  ```

### 4.5 其它函数
  ```sql
    user()
    -- 查询用户 哑元表
    select user() from dual;

    datebase()
    -- 数据库名称

    MD5(str)
    -- md5 对字符串进行加密后得到一个 32字节的值
    select md5('abc') from dual;

    password(str)
    -- 得到一个加密后的字符串
    select * from mysql.user
  ```



## 5 Mysql CRUD
1. 添加
  insert into 'tb_name' ('val', ...); 值必须对应
  INSERT INTO 'tb_name' (col_name,...) VALUES ('val', ...);
  insert into (), (), (); 添加多条数据
  字符串 和 日期类型用单引号引起来

2. 更新
  update `tb_name` SET col_name = expr where;

3. 删除
  drop table `tb_name`; 删除表
  delete from `tb_name`; 删除所有数据，不删除表
  delete from `tb_name` where ...; 有条件删除
  truncate table `tb_name`; 没有 where条件

  delete & truncate 的区别
    delete 返回被删除的记录数量
    truncate 总是返回 0，推荐使用 delete



## 6 Mysql Select 复杂查询
1. 多表查询
  基于 2个或2个以上的表或试图的查询，结果是【笛卡尔集】
  1.1 自连接，在同一张表的链接查询

2. 子查询
  嵌入在其他 sql语句中的 select语句，也叫嵌套查询
  from 子句中使用子查询，把子查询看做一个临时的表使用，需要定义别名
  select `emp1.*`, `emp2.myavg` from `emp`

  select e1.* from emp e1
  where e1.sal > select avg(sal) from emp where deptno = e1.deptno;

3. 合并查询
  合并多个 select 语句
  union 自动去重
  union all 不去重
    select * from `emp` 
    where(sal, comm) = 
    select sal, comm from `emp` where ename = 'jim';

4. 内连接
  select 字段名 from 表名 inner join 表名2 on 条件
  
5. 外连接
  5.1 左外连接
    左侧的表完全显示
    select 字段名...  from 表名 left join 表名2 on 条件

  5.2 右外连接
    右侧的表完全显示，就是右外连接
    select 字段名... from 表名 right join 表名2 on 条件

  5.3 完全外连接，完全显示2个表，没有匹配的记录设置为空



## 7 表的约束
* 设计表时，为了保证数据的完整性，符合某种规范
1. primary key 主键
  定义主键后，该列不能重复，且不能为 null
  一张表只能有一个主键，可以是复合主键 primary key(id, phone, email)
  primary key 一般为 整型

2. foreign key 外键
  定义主表和从表之间的关系，一个从表的数据指向主表的一条记录（列）
  foreign key(id, phone, '本表字段名') references '主表名'(主键名 | unique字段名)

  引擎必须是 InnoDB，才支持外键
  先有主表数据，然后才能添加从表数据
  外键指向主表的字段，必须是 primary key | unique
  外键字段的值必须在主键中出现过，或为 null
  建立主外键关系，数据就有一致性了，随意删除会失败
  外键字段类型要和主键字段的类型一致，长度可以不同，比如都是 int 或 varchar
  不指定外键，多表关联要有程序员自己维护，mysql不会检查数据

3. unique 唯一
  该列值不能重复，
  如果没有指定 not null， unique 字段可以为 null
  一张表有多个 unique，但只能有一个主键

4. not null 不为空
  插入数据时，该列必须要有数据

5. check
  msyql语法校验，用于强制行数据必须满足的条件

6. 自增长 auto_increment，一般配合 primary key
  primary key auto_increment
  自增长字段必须是 整型，默认从 1 开始，修改
    alter table 'tb_name' auto_increment = 123;
  单独使用，必须要有一个唯一值 unique

  insert into 'tb_name'(key, key) values(null, 'val')
  insert into 'tb_name'(key, key) values(val, 'val2')

7. 删除约束
  alter table 'tb_name' drop {index|key} '约束名称';

  删除主键
  show indexes from 'tb_name' -- 查看主键名字
  没有外键指向
    alert table 'tb_name' drop primary key;
  有外键指向
    1 先查看外键名字
      show create table '外键的表名';
    2 删除外键
      alter table '外键的表名' drop foreign key '外键名';
    3 删除主键
      alter table 'tb_name' drop primary key;

  删除外键
    1 先查看外键名字
      show create table '外键的表名';
    2 删除外键
      alter table '外键的表名' drop foreign key '外键名';

  删除 unique
    1 先查看 unique约束的名字
      show indexes from 'tb_name';
    2 删除外键
      alter table '外键的表名' drop index 'unique名';



## 8 索引
* 索引用来提升表的查询速度，解决海量数据查询太慢
* 原理：针对要查询的字段创建 二叉树
* 缺点：占用磁盘空间，对 DML insert delete update有影响
* 细节：
  - 频繁作为查询条件的字段应该创建索引
  - 更新非常频繁的字段不适合创建索引，唯一性太差的字段不适合创建索引
  - 不会出现在 where 子句中的字段不要创建索引

* 索引的查询
  ```sql
  show keys from 'tb_name';
  show index from 'tb_name';
  show indexes from 'tb_name';

  desc 'tb_name'; -- 简单的索引
  show create table 'tb_name';

  -- 删除唯一索引
  drop index '索引名' on 'tb_name';

  -- 删除普通索引
  alter table 'tb_name' drop index '索引名';

  -- 删除主键索引
  alter table 'tb_name' drop primary key;

  -- 修改索引，先删除，后创建
  ```

### 8.1 索引分类
1. primary key 主键索引
  一个表中只能有一个主键索引
  索引列的值，是唯一的，不能为 null
  ```sql
    id int primary key -- 创建表时指定索引
    primary key(id) -- 表最后面指定索引
    alert table 'tb_name' add primary key(id); -- 创建表后，添加主键索引
  ```

2. unique 唯一索引
  一个表中可以有多个 unique 索引
  在某列创建唯一索引，该列的值不能重复
  unique 如果没有 not null 约束，可以为 null
  ```sql
    name varchar(32) unique
    unique(name, email) -- 复合索引
    alter table 'tb_name' add unique(id, email);
    -- 添加 unique 索引，2个字段是符合索引
    create unique index 'idx_uni_email' on 'tb_name'(email);
  ```

3. index 普通索引
  该字段值有重复的情况下，用普通索引
  一个表中可以有很多个普通索引，用的最多
  ```sql
  alter table 'tb_name' add index(name);
  create index '索引名' on 'tb_name' (字段名);
  ```

4. 全文索引
  match(全文字段, 全文字段) against(关键字);
  msyql 自带全文索引，在 MyIsam中使用，不支持中文
  解决方法：
    [sphinx=>coreseek]
    mysql 插件 mysqlcft
  全文索引的2个概念：
    停止词（针对没有任何含义的关键字，不会建索引）
    匹配度
  应用场景：
    搜索文章，文字
  ```sql
  fulltext(name, name) engine = myisam;

  alter table 'tb_name' add fulltext(name);

  create fulltext index '索引名' on 'tb_name'(字段名);

  -- 使用全文索引
  select * from articles where match(title, body) against('关键字');
  ```


## 9 事务