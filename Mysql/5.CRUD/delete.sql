/** DELETE 细节
  delete 删除一列删除后，表还在
  drop table 彻底删除表
  truncate 和 delete 都可以删除数据
    truncate 不能带 where 语句，只能删除整表的记录，速度比 delete 快
    delete 可以带 where 语句，不带 where 语句，删除整表数据
    delete 返回删除的记录数量，truncate 返回 0

  - delete 如果没有 where条件，会删除整个表的数据
- delete 删除之后，表仍然存在，drop table 将删除表
truncate 不能带 where条件，因此建议使用 delete
    + truncate 没有返回值，执行速度快
    + delete 有返回值
*/
delete from table_name  where条件;
delete from employee where name='Lucy';


  DELETE FROM `tb_name` WHERE 'id' = 23;
  drop table `tb_name`; 删除表
  delete from `tb_name`; 删除所有数据，不删除表
  delete from `tb_name` where ...; 有条件删除
  truncate table `tb_name`; 没有 where条件

  delete & truncate 的区别
    delete 返回被删除的记录数量
    truncate 总是返回 0，推荐使用 delete