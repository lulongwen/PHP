# 事务
	* 事务用于保证数据的一致性，有一组关联的 DML 语句组成
	* 该组的 DML 语句要么全部成功，要么失败


## 事务的 ACID特性
	1. 原子性 Atomicity
		* 事务是一个不可分割的工作单位，事务中的操作，要么成功，要么失败

	2. 一致性 Consistency
		* 事务必须让数据库从一个一致性状态变换到另外一个一致性状态

	3. 隔离性 Isolation
		* 当多个用户访问数据库时，数据库为每一个用户开启的事务，不能被其他事务的操作数据所干扰
		* 多个并发事务之间

	4. 持久性 Durability
		* 指的是一个事务一旦被提交，对数据库的数据改变就是永久的
		* 即使数据库发生故障，也不应该对其有任何影响


## 事务细节
	* InnoDB 引擎支持事务， MyIsam不支持事务
	* 如果不创建保存点，直接 rollback，默认回退到事务的开始状态，其它状态都会销毁
	* 开启一个事务
	```
		start transaction, set autocomit = off;
	```


## 终端执行事务
	```
	1. 开始一个事务
		start transation, set autocommit = off;

	2. 设置保存点
		savepoint '保存点名字';

	3. DML操作

	4. 回退
		操作错误可以回退
		rollback to '保存点名字' // 取消部分事务
		rollback // 取消全部事务

	5. 提交事务
		commit; // 提交事务
	```


## PHP执行事务
	```
	PHP 执行事务关键点，如果2条语句有一个执行错误，就回退
	if (!$res || !$res2) {
		mysql_query('rollback')
	}
	else mysql_query('commit')
	
	```


## 事务隔离级别
	* 隔离级别定义事务与事务之间的隔离程度

### 事务隔离分类
	* 读未提交 Read Uncommitted
		* 脏读，不可重复幻读，不加锁

	* 读已提交 Read Committed
		* 不可重复幻读，不加锁

	* 可重复读 不加锁 Repeatable Read
		* 默认隔离级别，该级别可以满足大部分项目需求
		* 没有特殊需求不要修改
		* 可重复读是会出现幻读的，但 mysql 做了改进

	* 可串行化 加锁 Serializable
		* 隔离级别最高，加锁读
		* 当这个级别在读取表时，会给它读取的行加锁，别的客户端修改不了
		* 锁有表锁和行锁

### 事务隔离的现象
	* 脏读 dirty read
	* 不可重复读 nonrepeatable read
	* 幻读 phantom read

### 事务隔离级别的查看和设置
	```
	查看当前会话隔离级别
		select @@tx_isolation;

	查看系统当前隔离级别
		select @@global.tx_isolation;
	
	设置当前会话隔离级别
		set session transaction isolation level repeatalbe read;

	查看系统当前隔离级别
		set global transaction isolation level repeatable read;
	```

## PHP中使用事务隔离级别
	```
	connection setTransationIsolation(Connection, transaction_read_committed);
	```