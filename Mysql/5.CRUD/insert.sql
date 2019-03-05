/**
  insert 返回的是 true / false

 */

INSERT INTO `tb_name` [column] VALUES();
insert into 'tb_name' ('val', ...); 值必须对应
INSERT INTO 'tb_name' (col_name,...) VALUES ('val', ...);
insert into (), (), (); 添加多条数据
# 字符串 和 日期类型用单引号引起来


-- 表中插入数据，保证前面的字段和后面添加的 values 对应
insert into tables_name() values();


// 全部添加，可以省略前面的字段的列表
insert into tables_name values();


// 部分添加，不能省略前面的字段，前面的字段要和后面的 values() 对应
insert into tables_name(id, name, sex) values('2', 'Lily', '女');