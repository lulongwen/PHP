/**
  创建表时，要设置字符集，校对规则，和引擎
  校验规则
    大小敏感 utf8mb4_bin
    不区分大小写 utf8mb4_general_ci 
    对数据排序
*/
-- 创建表 表名，字符集，排序规则，引擎
CREATE TABLE `user` (
  -- 表的约束和注释
  id int not null default 0 comment 'id',
  name varchar(32) not null default '' comment '名字',
  password char(32) not null default '' comment '密码',
  birthday date comment '生日'
)
CHARSET = utf8mb4 -- 字符集
COLLATE = utf8mb4_general_ci -- 校对规则
ENGINE = InnoDB; /* 引擎 */


-- 查看创建表的信息
  SHOW CREATE TABLE `tb_name`;

-- 查看表的字段
  DESC 'tb_name';
  describe 'tb_name';

-- 删除表与其它表有关联，需要关注数据完整度
  drop table 'tb_name';

-- 重命名表名
  RENAME TABLE `employee` TO `worker`;


-- 复制 结构完全一样的表，空表
  CREATE TABLE `employee` LIKE `worker`; -- 推荐
  CREATE TABLE `employee` AS SELECT * FROM 'worker';
  DESC `tb_name`;

  # 快速添加，快速复制，然后添加到新表中
  INSERT INTO `employee`  SELECT * FROM `worker`;
  INSERT INTO `employee` VALUES();


-- XAMPP更改 mysql密码
UPDATE `user` SET password=PASSWORD('root') WHERE user='root';



-- 修改表名
  alter table 旧表名 rename '新表名';
  rename table '旧表名' to '新表名'; 

-- 修改表的字符集
  alter table 'tb_name' character set 'utf8mb4';

-- 修改表的校验规则

-- 修改表的引擎



-- 修改字段名
  alter table 'tb_name' change 旧字段名 to 新字段名 数据类型;

-- 修改字段的数据类型
  alter table 'tb_name' modify 字段名 数据类型 字段定义;
  alter table 'user' modify name varchar(32) not null default '';

-- 修改字段排列位置
  alter table 'tb_name' modify 字段名 数据类型 first/after 字段名;

-- 添加字段名
  alter table '表名' add 新字段名 数据类型 [first / after 字段名];



-- 删除字段
  alter talbe 'tb_name' drop 字段名;
  alter table 'user' drop name;





-- 1 创建数据库
create database message charset=utf8mb4;

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