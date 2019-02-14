
## mysqli 语法
    ```php
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
    
## mysqli->query() 返回值
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
    
## SQL语句返回值
- dml语句返回 boolean true & false
- dql语句返回 资源集


- 批量操作
- 预处理

- 防止 SQL注入


    

## PHP 数组转 JSON
    ```
    const array = <?php echo json_encode($arr);?>;
    console.log(array)
    ```


