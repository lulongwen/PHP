/**
规范
  1 表名不用下划线，尽量简短，所见即所得
*/

-- 1 post 文章核心表
create table `post` (
  `id` int(11) ,
  `title` varchar(120),
  `summary` text,
  `content` text,
  `thumbnail` varchar(120),
  `user_id` int(11),
  `username` varchar(80),
  `category_id` int(11),
  `tag` varchar(80),
  `status` tinyint(1),
  `created_at` int(11),
  `updated_at` int(11),
  `deleted_at` int(11),
  `is_original` tinyint(1),
  `is_private` tinyint(1),
  primary key(`id`),
  key  `idx_category_status`(`category_id`, `status`) using btree
) engine=innoDB auto increment=1 default charset=utf8mb4 comment='文章主表';



-- 2 comment 评论表，评论关联前台用户表，关联评论状态表
create table `comment`(
  `id` int(11),
  `content` text,
  `status` tinyint(2),
  `create_time` int(11),
  `fans_id` varchar(30),
  `email` varchar(80),
  `url` varchar(120),
  `post_id` smallint(2),
  `created_at` int(11),
  `updated_at` int(11),
  `is_deleted` smallint(2),
)engine=innodb auto_increment=1 default charset=utf8mb4 comment='评论表';



-- 3 前台用户表
create table `fans`(
  `id` int(),
  `content` text,
  `status` tinyint(),
  `create_time` int(11),
  `email` varchar(30),
  `url` varchar(120),
  `post_id` int(),
)engine=innodb auto_increment=1 default charset=utf8mb4 comment='前台用户表';



-- 4 后台用户表
create table `user`(
  `id` int(11),
  `username` varchar(80),
  `auth_key` varchar(32),
  `password_hash` int(120),
  `password_reset_token` varchar(120),
  `email` varchar(80),
  `email_validate_token` varchar(255),
  `role` smallint(6),
  `avatar` varchar(80),
  `vip` int(11),
  `point` int(11),
  `status` tinyint(2),
  `create_at` int(11),
  `update_at` int(11),
  primary key(`id`)
)engine=innodb auto_increment=1 default charset=utf8mb4 comment='后台用户表';



-- 5 管理员表
create table `adminuser`(
  `id` int(11),
  `username` varchar(80),
  `nickname` varchar(80),
  `password` int(11),
  `email` varchar(120),
  `profile` text,
  primary key(`id`)
)engine=innodb auto_increment=1 default charset=utf8mb4 comment='管理员表';



-- 文章分类表
create table `category` (
  `id` int(11) ,
  `name` varchar(80),
  primary key (`id`)
  unique key `name`(`name`) using btree
) engine=innoDB auto increment=1 default charset=utf8mb4 comment='文章分类表';


-- 文章标签表
create table `tag` (
  `id` int(11),
  `name` varchar(40),
  `frequency` int(11),
  primary key (`id`),
  unique key `tag_name`(`name`) using btree
) engine=innoDB auto increment=1 defaut charset=utf8mb4 comment '文章标签表';



-- 表的关联, post_tag 文章和标签的关联
create table `postag`(
  `id` int(11),
  `post_id` int(11),
  `tag_id` int(11),
  primary key(`id`),
  unique key `post_id`(`post_id`, `tag_id`) using btree
) engine=innoDB auto increment=1 default charset=utf8mb4 comment='文章和标签的关联';



-- 表的关联, poststatus 文章状态表
create table `poststatus`(
  `id` int(`11`),
  `name` varchar(40),
  `position` int(11)
  unique key `tag_name`(`name`) using btree
)engine=innodb auto_increment=1 default charset=utf8mb4 comment='文章状态表';


-- 表的关联, commentstatus 评论状态表
create table `poststatus`(
  `id` int(`11`),
  `name` varchar(40),
  `position` int(11)
  unique key `tag_name`(`name`) using btree
)engine=innodb auto_increment=1 default charset=utf8mb4 comment='评论状态表';




-- migration 数据搬家用的表, 自动创建的
create table `migration`(
  `version` varchar(120),
  `apply_time`: int(11)
)engine=innodb default charset=utf8mb4 comment='数据搬家用的表';











