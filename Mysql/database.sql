/*
  `` 反引号用来隔离关键字的，
  mysql 创建数据库时，指定编码很重要，可以避免导入导出带来的乱码问题
    utf8_general_ci 不区分大小写
    utf8_bin 区分大小写

*/
# 创建一个 db1 的数据库
CREATE DATABASE `db1`;


# 创建一个 db2的数据库，字符集为 utf8mb4
CREATE DATABASE `db2` CHARACTER SET 'utf8mb4';


# 创建数据库 数据库名，字符集，排序规则
CREATE DATABASE `db3`
  CHARACTER SET 'utf8mb4'
  COLLATE 'utf8mb4_general_ci';


# 创建表 表名，字符集，排序规则，引擎
CREATE TABLE `user` (
id int not null default 0 comment 'id',
name varchar(32) not null default '' comment '名字',
password char(32) not null default '' comment '密码',
birthday date comment '生日'
)
CHARSET = utf8mb4 
COLLATE = utf8mb4_general_ci
ENGINE = InnoDB;


-- 显示所有的数据库
SHOW DATABASES;

-- 使用数据库
USE `db_name`;


-- 删除数据库
DROP DATABASE db_name;

-- 如果存在就删除数据库
DROP DATABASE IF EXISTS db_name;


-- 显示数据库创建的语句
SHOW CREATE DATABASE db_name; 


/**
 查看mysql数据库的链接进程
  当前有多少个客户端连接到我们的mysql dbms 上
  了解当前的mysql运行和使用状态
 */
SHOW PROCESSLIST;




/**
  修改数据库，就是修改数据库的字符集，校验规则等
  修改校验规则
*/
ALTER DATABASE `db_name` COLLATE 'utf8mb4_general_ci';

-- 修改字符集
ALTER DATABASE `db_name` CHARSET = 'utf8mb4';


-- 数据库的备份，直接在 CMD里面操作，指令后面不要带分号 ;

-- 备份一个库
  CMD > mysqldump -u root -p `db_name` > 备份路径


-- 备份多个库，好处, 把数据库本身也给你备份
  CMD > mysqldump -u root -p  -B 数据库名1   数据库名2  > 备份路径
    

-- 备份数据库下的表
  CMD > mysqldump -u root -p  数据库名 表名1 表名2 > 备份绝对路径

  -- 比如 备份 db2
  SET NAMES 'gbk'; -- 可以省略，防止乱码
  CMD > mysqldump -u root -p `db2` > c:/db2.bak

-- 备份数据库下的一张表
  CMD > mysqldump -u root -p 'db2' 'users' > c:/db2.users.bak


-- 备份多个数据库，注意 -B
  CMD > mysqldump -u root -p -B 'db2' 'db3' 'db6' > c:/db2.db3.db6.bak


/**
  数据库的恢复
  1 先创建一个新的数据库
  2 use 这个库
  3 执行恢复指令
    SOURCE 备份文件的绝对路径

  恢复某个库的某张表
  1 set names gbk; -- 防止中文乱码
  2 USE 'db2';
  3 SOURCE 绝对路径
*/
  CREATE DATABASE `db2`;
  use `db2`;
  set names gbk; -- 可以忽略这个，这个是防止中文乱码的
  SOURCE c:/db2.bak


# 恢复某个库的某张表，例如 db2 users
  USE 'db2' -- 如果数据库都没有，则请先创建一个库
  SOURCE c:/db2.users.bak

# 恢复多个库，简单
  SOURCE c:/db2.db3.db6.bak;
