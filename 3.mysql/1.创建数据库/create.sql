-- 建库建表思路, 1 链接mysql
  mysql -u root -p
  ***


-- 2 创建并使用数据库
  CREATE DATABASE `dbname`
  CHARACTER SET 'utf8mb4'
  COLLATE 'utf8mb4_general_ci';
  use dbname;


-- 3 创建表
  CREATE TABLE `user` (
    id int not null default 0 comment 'id',
    name varchar(32) not null default '' comment '名字',
    password char(32) not null default '' comment '密码',
    birthday date comment '生日',
    key(),
    index()
  )
  CHARSET = utf8mb4
  COLLATE = utf8mb4_general_ci
  ENGINE = InnoDB;