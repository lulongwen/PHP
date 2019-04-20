

## PDO对象常用的方法
  ```
  exec()  dml语句，返回受影响的记录数
  query() dql语句，select返回 PDOStatement对象
  errorCode() 返回错误代码
  errorInfo() 返回错误信息

  prepare() 预处理方式执行SQL语句
  quote()  将数据转义并使用引号包裹(例如： 1' or 1 or' )

  beginTransaction() 开启事务
  commit() 提交
  rollback() 回滚

  lastInsertId() 返回最新插入的主键的值，一般是id
  
  ```