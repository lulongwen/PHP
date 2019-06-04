-- 创建数据库
crete database `message` engine=myisam charset=utf8mb4;

-- 选择数据库
use message;

-- 创建留言表
-- 给id添加主键，约束唯一标识数据库表中的每条记录，主键和外键的作用是快速检索
create table `mes_info`(
  id int auto_increment comment 'id',
  name varchar(20) not null comment '名字',
  phone char(11) not null comment '手机',
  email varchar(20) not null comment '邮箱',
  title varchar(20) not null default '' comment '标题',
  content text not null comment '内容',
  addtime varchar(20) not null comment '留言时间',
  PRIMARY KEY(id)
)engine=myisam charset=utf8mb4;


-- 创建用户表
create table `users`(
  id int auto_increment comment 'id',
  username varchar(20) not null comment '用户名',
  password char(32) not null comment '密码',
  primary key(id)
)engine=myisam charset=utf8mb4;

-- 初始化一个管理员
insert into users values('admin', md5('admin'));