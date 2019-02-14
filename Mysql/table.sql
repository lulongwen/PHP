/**
  创建表
*/
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


# 查看创建表的信息
  SHOW CREATE TABLE `tb_name`;

# 查看表的字段
  DESC 'tb_name';



-- 重命名表名
  RENAME TABLE `employee` TO `worker`;


-- 复制一张表，空表
  CREATE TABLE `employee` LIKE `worker`;
  DESC `tb_name`;

  # 快速添加，快速复制，然后添加到新表中
  INSERT INTO `employee`  SELECT * FROM `worker`;
  INSERT INTO `employee` VALUES();