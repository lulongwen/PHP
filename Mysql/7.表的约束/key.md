# table 表的约束
	* 设计表时，为了保证数据的完整性，符合某种规范
  * 约束是为了保证表数据的完整性，索引是为了提高查询效率
	```
	primary key 主键
	foreign key 外键
	unique 唯一
	not null 不为空
	check 语法校验
	auto_increment 自增长
	
	主键不能重复，不能为空
	null 和 '' 的区别
    ‘’ 有房子但没人住
    null 10年后的房子，但是要先交钱
  
    unique 可以有多个
    primary key 只能有一个
    外键子段指向另外一张表，但字段是在本表中的，指向外面
	```


## 1 primary key 主键
	定义主键后，该列不能重复，且不能为 null
  一张表只能有一个主键，可以是复合主键 primary key(id, phone, email)
  primary key 一般为 整型



## 2 foreign key 外键
	定义主表和从表之间的关系，一个从表的数据指向主表的一条记录（列）
  foreign key(id, phone, '本表字段名') references '主表名'(主键名 | unique字段名)

  引擎必须是 InnoDB，才支持外键
  先有主表数据，然后才能添加从表数据
  外键指向主表的字段，必须是 primary key | unique
  外键字段的值必须在主键中出现过，或为 null
  建立主外键关系，数据就有一致性了，随意删除会失败
  外键字段类型要和主键字段的类型一致，长度可以不同，比如都是 int 或 varchar
  不指定外键，多表关联要有程序员自己维护，mysql不会检查数据



## 3 unique 唯一
	该列值不能重复，
  如果没有指定 not null， unique 字段可以为 null
  一张表有多个 unique，但只能有一个主键



## 4 not null 不为空
	插入数据时，该列必须要有数据



## 5 check 语法校验
	msyql语法校验，用于强制行数据必须满足的条件




## 6 auto_increment 自增长
	primary key auto_increment
  自增长字段必须是 整型，默认从 1 开始，修改
    alter table 'tb_name' auto_increment = 123;
  单独使用，必须要有一个唯一值 unique

  insert into 'tb_name'(key, key) values(null, 'val')
  insert into 'tb_name'(key, key) values(val, 'val2')


## 删除约束
	alter table 'tb_name' drop {index|key} '约束名称';

  * 删除主键
  show indexes from 'tb_name' -- 查看主键名字
  没有外键指向
    alert table 'tb_name' drop primary key;
  
  * 有外键指向
    1 先查看外键名字
      show create table '外键的表名';
    2 删除外键
      alter table '外键的表名' drop foreign key '外键名';
    3 删除主键
      alter table 'tb_name' drop primary key;

  * 删除外键
    1 先查看外键名字
      show create table '外键的表名';
    2 删除外键
      alter table '外键的表名' drop foreign key '外键名';

  * 删除 unique
    1 先查看 unique约束的名字
      show indexes from 'tb_name';
    2 删除外键
      alter table '外键的表名' drop index 'unique名';

