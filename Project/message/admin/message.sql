
-- 1 创建数据库
create database message charset=utf8;

-- 2 选择数据库
use message;

-- 3 创建 留言信息表,
-- 给id添加主键，primary key(id) 约束唯一标识数据库表中的每条记录，主键和外键的作用是快速检索
create table mes_info(
  id int auto_increment comment 'id',
  name varchar(45) not null comment '名字',
  phone varchar(13) not null comment '手机号码',
  email varchar(50) not null comment 'email',
  title varchar(30) not null comment '标题',
  content text not null comment '内容',
  addtime varchar(20) not null comment '添加时间',
  primary key(id)
)charset=utf8;



# 创建 用户登录表 主键不能重复，唯一的 primary key(id)
create table admin(
  id int auto_increment,
  userName varchar(30) not null comment '用户名',
  userPass varchar(30) not null comment '用户密码',
  primary key(id)
)charset=utf8;

# 初始化一个管理员 md5('admin')
insert into admin values(default, 'admin', 'admin');










