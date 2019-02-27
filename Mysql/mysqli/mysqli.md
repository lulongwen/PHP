# mysqli 扩展
  * PHP和 mysql数据库之间的一个连接
  * new Mysqli() 时的错误，是 Mysql数据库返回的错误，不是PHP返回的错误
  * 关联数组的好处，数据库改变，数据还是一样，不会影响返回的结果
        + $mysqli->query(sql)->fetch_assoc();
  insert , update, delete 返回 true 和 false
      + select 返回资源集的结果 $res->fetch_assoc();


PHP 数组转 JSON
    ```
    const array = <?php echo json_encode($arr);?>;
    console.log(array)
    ```

## Mysqli 快速入门
  ```
  $mysqli = new Mysqli('localhost', 'root', '’, 'db2', 3306);
    if ($mysqli->connect_errno) { // 成功返回0
        die('链接错误，Mysql返回的错误：' . $mysqli->connect_error);
    }
    $mysqli->set_charset('utf8');
    
    
    $sql = 'SELECT * FROM `employee`';
    $res = $mysqli->query($sql);
    $arr = array();
    while ($row = $res->fetch_assoc()) {
        $arr[] = $row;
    }
    
    $res->free();
    $mysqli->close(); // 关闭链接
  ```



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

SQL语句返回值
- dml语句返回 boolean true & false
- dql语句返回 资源集
- 批量操作
- 预处理
- 防止 SQL注入

mysqli->query() 返回值
    ```angularjs
     $res = $mysqli->query($sql);
     $arr = array();
     while ($row = $res->fetch_assoc()) {
         $arr[] = $row;
     }
     
     // 获取自增长的 id
     $mysqli->insert_id;
    ```
1. $res->fetch_assoc() 推荐，返回关联数组
2. $res->fetch_row() 返回索引数组
3. $res->fetch_array() 返回关联+索引数组，不推荐
4. $res->fetch_object() 返回对象
    


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