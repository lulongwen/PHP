
-- 修改表的字段名
alter tabl table_name change 旧字段名 新字段名 新数据类型;
    alter table employee change brithday birthday date;

-- 追加字段
alter table table_name add 列名称 int not null comment '注释说明';


-- 删除列
alter table 【表名字】 drop 【列名称】

-- 增加列
alter table 【表名字】 add 【列名称】 INT NOT NULL  COMMENT '注释说明'


3：修改列的类型信息
    alter table 【表名字】 change 【列名称】【新列名称（这里可以用和原来列同名即可）】 BIGINT NOT NULL  COMMENT '注释说明'

    4：重命名列
    alter table 【表名字】 change 【列名称】【新列名称】 BIGINT NOT NULL  COMMENT '注释说明'

    5：重命名表
    alter table 【表名字】 RENAME 【表新名字】

    6：删除表中主键
    alter table 【表名字】 drop primary key

    7：添加主键
    alter table sj_resource_charges ADD CONSTRAINT PK_SJ_RESOURCE_CHARGES PRIMARY KEY (resid,resfromid)

    8：添加索引
    alter table sj_resource_charges add index INDEX_NAME (name);

    9: 添加唯一限制条件索引
    alter table sj_resource_charges add unique emp_name2(cardnumber);

    10: 删除索引
    alter table tablename drop index emp_name;