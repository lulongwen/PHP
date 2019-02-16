/**
  CRUD 增删改查
  create
  read
  update
  delete
*/

-- INSERT INTO 增加数据
  INSERT INTO `tb_name` [column] VALUES();




-- UPDATE 更新数据




/** UPDATE 细节

*/





-- DELETE 删除数据
  DELETE FROM `tb_name` WHERE 'id' = 23;


/**  DELETE 细节
  delete 删除一列删除后，表还在
  drop table 彻底删除表
  truncate 和 delete 都可以删除数据
    truncate 不能带 where 语句，只能删除整表的记录，速度比 delete 快
    delete 可以带 where 语句，不带 where 语句，删除整表数据
    delete 返回删除的记录数量，truncate 返回 0
*/

  