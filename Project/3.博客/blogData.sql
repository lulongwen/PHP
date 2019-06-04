-- adminuser
INSERT INTO `adminuser` (`id`, `username`, `nickname`, `password`, `email`, `profile`, `auth_key`, `password_hash`, `password_reset_token`) VALUES
(1, 'longwen', '卢珑文', '$2y$13$RZ20K81ZdERPDyFq2EM31e6KjmmdNRtGmCC6Fq9NST3hWhcgoPqUy', 'webmaster@example.com.cn', 'hello,this is my profile', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', '$2y$13$4Y5KRDHPFYF.rYumLe6rx.34gBLpK6HROMklh9A8.TZwRFNrM5RyW', NULL),
(2, 'anhaiyin', '安海音', '$2y$13$RZ20K81ZdERPDyFq2EM31e6KjmmdNRtGmCC6Fq9NST3hWhcgoPqUy', 'tim@u2000.com', 'a testing user', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', '$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu', NULL),
(3, 'tutu', '兔兔', '$2y$13$RZ20K81ZdERPDyFq2EM31e6KjmmdNRtGmCC6Fq9NST3hWhcgoPqUy', 'heyx@hotmail.com', 'a testing user', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', '$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu', NULL);


-- auth_item
INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, '系统管理员', NULL, NULL, 1465177361, 1465177361),
('approveComment', 2, '审核评论', NULL, NULL, 1465177361, 1465177361),
('commentAuditor', 1, '评论审核员', NULL, NULL, 1465177361, 1465177361),
('createPost', 2, '新增文章', NULL, NULL, 1465177361, 1465177361),
('deletePost', 2, '删除文章', NULL, NULL, 1465177361, 1465177361),
('postAdmin', 1, '文章管理员', NULL, NULL, 1465177361, 1465177361),
('postOperator', 1, '文章操作员', NULL, NULL, 1465177361, 1465177361),
('updatePost', 2, '修改文章', NULL, NULL, 1465177361, 1465177361);


INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('commentAuditor', 'approveComment'),
('admin', 'commentAuditor'),
('postAdmin', 'createPost'),
('postAdmin', 'deletePost'),
('postOperator', 'deletePost'),
('admin', 'postAdmin'),
('postAdmin', 'updatePost');


-- auth_assignment
INSERT INTO `auth_assignment` (`name`, `user_id`, `created_at`) VALUES
('admin', '1', 1478063489),
('commentAuditor', '1', 1478063489),
('commentAuditor', '4', 1465177361),
('postAdmin', '1', 1478063489),
('postAdmin', '2', 1477816632),
('postOperator', '1', 1478063489),
('postOperator', '3', 1465177361);



-- comment 
INSERT INTO `comment` (`id`, `content`, `status`, `create_time`, `userid`, `email`, `url`, `post_id`, `remind`) VALUES
(null, '假设你想通过 RESTful 风格的 API 来展示用户数据。用户数据被存储在用户DB表， 你已经创建了 yii\\db\\ActiveRecord 类 app\\models\\User 来访问该用户数据.', 2, 1443004317, 1, 'sxb@hotmail.com', '', 41, 1),
(null, 'yii\\db\\Query::one() 方法只返回查询结果当中的第一条数据， 条件语句中不会加上 LIMIT 1 条件。如果你清楚的知道查询将会只返回一行或几行数据 （例如， 如果你是通过某些主键来查询的），这很好也提倡这样做。但是，如果查询结果 有机会返回大量的数据时，那么你应该显示调用 limit(1) 方法，以改善性能。 例如， (new \\yii\\db\\Query())->from(''user'')->limit(1)->one()。', 2, 1443004455, 1, 'somuchfun@gmail.com', '', 39, 1),
(null, '传说中的沙发', 2, 1443004561, 1, 'lsf@ggoc.com', '', 34, 1),
(null, '当你在调用 yii\\db\\Query::all() 方法时，它将返回一个以连续的整型数值为索引的数组。 而有时候你可能希望使用一个特定的字段或者表达式的值来作为索引结果集数组。那么你可以在调用 yii\\db\\Query::all() 之前使用 yii\\db\\Query::indexBy() 方法来达到这个目的。', 2, 1443047988, 1, 'ctq@qq.com', '', 39, 1),
(null, '如需使用表达式的值做为索引，那么只需要传递一个匿名函数给 yii\\db\\Query::indexBy() 方法即可', 1, 1443049673, 1, 'kiki@qq.com', '', 39, 1),
(null, 'yii\\db\\Query::one() 方法只返回查询结果当中的第一条数据， 条件语句中不会加上 LIMIT 1 条', 2, 1443927141, 2, 'csc@bing.com', '', 39, 1),
(null, '你应该在 响应格式 部分中过滤掉这些字段。', 1, 1444267750, 1, 'wj@163.com', 'www.wj.com', 41, 1),
(null, '适合用常规格式显示一个模型（例如在一个表格的一行中显示模型的每个属性）。', 2, 1444377054, 1, 'tester@example.com', 'www.baidu.com', 36, 1),
(null, '魏老师，看了你的视频深入浅出，受益匪浅。真的非常非常感谢您！', 2, 1479353395, 2, 'mchael@163.com', NULL, 42, 1),
(null, '老师权限控制讲的很好，想听老师讲下 管理员操作日志和数据库备份', 2, 1479353438, 2, 'mchael@163.com', NULL, 42, 1),
(null, '魏老师,看了你的视频学到了很多,真心不错.咱们这套视频学完,有用户搜索文章的功能么?', 2, 1479353455, 2, 'mchael@163.com', NULL, 42, 1),
(null, '魏老师，看了你的视频深入浅出，受益匪浅。真的非常非常感谢您！', 1, 1479353617, 2, 'mchael@163.com', NULL, 42, 1),
(null, ' 点赞，学生自学党，实战课程在很多网站都要钱。', 1, 1479364784, 2, 'mchael@163.com', NULL, 42, 1);


-- commentstatus
INSERT INTO `commentstatus` (`id`, `name`, `position`) VALUES
(1, '待审核', 1),
(2, '已审核', 2);



-- tag
INSERT INTO `tag` (`id`, `name`, `frequency`) VALUES
(null, 'Yii', 25),
(null, 'RESTful Web服务', 6),
(null, 'Yii2', 32),
(null, 'Gii', 9),
(null, '查询构建器', 2),
(null, 'DAO', 8),
(null, 'GridView', 11),
(null, 'ListView', 5),
(null, 'DetailView', 5),
(null, 'ActiveRecord', 27),
(null, '安装', 4),
(null, 'Composer', 4),
(null, '小部件', 1),
(null, 'widget', 1),
(null, '视频教程', 1),
(null, '教程', 1);



-- user
INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(null, 'haiyin', 'pG7TRyTIXlEbcenpi34TzmMYS2zDsMTF', '$2y$13$HtJqGRmc76KIRIwokii8AOQ1XZljXiuWCKUGFnH9vkTnfBpHtqgFu', NULL, 'weixi@weixistyle.com', 10, 1462597929, 1477554091),
(null, 'tutu', 'xqGDBMlylihvNddSQgDkjAdpJwV4d02C', '$2y$13$bJC0vECI9EPLq/kia9CAmOT060fxoT/HopseOnY.C9siZJDOoQguK', NULL, 'mchael@163.com', 10, 1475850924, 1475850924);




-- migration
INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1462597684),
('m130524_201442_init', 1462597693),
('m140506_102106_rbac_init', 1465176156);




-- post
INSERT INTO `post` (`id`, `title`, `content`, `tag`, `status`, `created_at`, `updated_at`, `author_id`) VALUES
(null, 'Yii2小部件详解', '小部件是在视图中使用的可重用单元，使用面向对象方式创建复杂和可配置用户界面单元。\r\n例如，日期选择器小部件可生成一个精致的允许用户选择日期的日期选择器', 'Yii2,小部件,widget', 2, 1442998314, 1474115205, 3),
(null, 'Yii2安装 ', '使用Composer安装 Yii，只需执行一条简单的命令就可以安装新的扩展或更新 Yii 了一个应用程序的基本骨架','Yii2,视频教程,教程', 2, 1558334670453, 1558334677653, 2);

INSERT INTO `post` (`id`, `title`, `content`, `tags`, `status`, `create_time`, `update_time`, `author_id`) VALUES
(null, 'Active Record 详解','AR的生命周期，理解AR的生命周期对于你操作数据库非常重要。生命周期通常都会有些典型的事件存在。对于开发AR的behaviors来说非常有用。</p>\r\n<p>当你li>yii\\db\\ActiveRecord::init(): 会触发一个 yii\\db\\ActiveRecord::EVENT_INIT 事件</li>\r\n</ol><p>当你通过 yii\\db\\ActiveRecord::find() 方法查询数据时，每个AR实例都将有以下生命周期：</p>', 'Yii2,DetailView', 2, 1443001778, 1443001892, 2),
(null, 'ListView', '<p>yii\\widgets\\ListView 小部件用于显示数据提供者 data provider提供的数据。\r\n每个数据模型用指定的视图文件 yii\\widgets\\ListView:，所以它可以很方便地为最终用户显示信息并同时创建数据管理界面。</p>', 3, 1443002869, 1443002869, 1),
(null, 'Yii 教程','请用超清模式播放介绍和教程讲解安排', 'Yii2,视频教程,教程', 2, 1445512144, 1479262717, 1);


-- poststatus
INSERT INTO `poststatus` (`id`, `name`, `position`) VALUES
(1, '草稿', 1),
(2, '已发布', 2),
(3, '已归档', 3);