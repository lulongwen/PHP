# mysqli 扩展
- PHP和 mysql数据库之间的一个连接

## mysqli 类
```
mysqli::__construct
mysqli_connect
  打开一个mysql服务器的链接

mysqli::$connect_errno
  返回上一个链接的错误信息，数字编码

mysqli::$nonect_error
  返回上一个链接的错误信息，字符串

mysqli::errno
  返回上一个mysql操作中的错误信息，数字编码

mysqli::$error
  返回上一个mysql操作产生的文本错误信息

mysqli::set_charset
  设置客户端默认的字符集

mysqli::query
  对数据库执行一次查询

mysqli::$affected_rows
  获取前一次mysql操作所影响的记录行数

mysqli::autocommit
  打开或关闭本次数据库连接的自动命令提交事务模式
```

### mysqli::begin_transation 开始一个事务
```
mysqli::rollback
  回退到当前事务

mysqli::savepoint
  设置一个被命名的保存点

mysqli::commit
  提交一个事务
```


### mysqli::multi_query 批量查询
```
$res = mysqli::store_result
  返回来自上一次的查询结果集

$res -> fetch_assoc()
  从结果集中获取一行作为关联数组

mysqli::more_result
  查询是否有更多批量查询的结果集

mysqli::next_result
  准备下一个批量查询结果
```

---


## mysqli_stmt 类
```
$stmt = $mysqli -> prepare($SQL)
  创建连接

mysqli_stmt::bind_param
  绑定参数

mysqli_stmt::bind_result
  绑定参数容纳结果

mysqli_stmt::fetch
  获取结果

mysqli_stmt::free_result
  释放结果

mysqli_stmt::close
  关闭链接
```
---


## mysqli_result 类
```
$res= $mysqli -> query(DQL) 得到结果集


mysqli_result:: fetch_assoc
  从结果集中获取一行，作为关联数组

mysqli_result::fetch_array
  从结果集中获取一行，作为关联数组，或数字数组，或二者兼有

mysqli_result::fetch_row
  从结果集中获取一行，作为枚举数组

mysqli_result::fetch_object
  从结果集中获取一行，作为对象


mysqli_result::$num_rows
  获取结果集中行的数量

mysqli_result::$field_count
  获取结果集中字段的数量

mysqli_result::free
  释放结果集

```
---