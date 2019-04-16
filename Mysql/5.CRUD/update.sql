/* update 更新数据

  更新数据一般都带限制条件 where，
  不带 where条件的将修改整个表的字段，这种需求很少

  update 语法
  update tb_name set key = value, key1 = value1  where = 条件;
*/



// 如果不写update的 where条件，表的所有记录都修改
update employee set salary=5000;

// where 条件
update employee set salary=12000 where name='安海音';

// 修改多个字段
update employee set salary=15000, job='friend' where name='安海音';



-- UPDATE 更新数据细节
  update `tb_name` SET col_name = expr where;













  