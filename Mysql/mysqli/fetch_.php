<?php
  header('content-type:text/html;charset=utf-8');
  echo '<h1>fetch_*  取回查询结果，推荐使用 fetch_assoc()</h1>
        fetch_assoc() 关联数组<br>
        fetch_row() 索引数组<br>
        fetch_array() 关联数组 + 索引数组，服务器压力大<br>
        fetch_object() 返回对象<br><br>
        
        $res->fetch_row()
        ';

  // 1 实例化一个 Mysqli对象
  $mysqli = new Mysqli(
    'localhost',
    'root',
    '',
    'db2', // 数据库名字
    3306
  );

  // 2 判断链接是否成功，成功返回 0，否则返回对应的错误号，如果不是0，说明链接错误
  // connect_errno 属性表示链接失败的错误信息
  if ($mysqli->connect_errno) {
    die('链接错误，Mysql返回的错误：' . $mysqli->connect_error);
  }
  echo '<h3>链接成功!</h3>';

  // 3 设置字符集
  $mysqli->set_charset('utf8');


  // 4 拼接 sql语句, select 语句属于 dql语句，返回集 对象
  $sql = 'SELECT * FROM `employee`';

  // 5 执行 sql语句, $res 是  mysqli_result 的对象
  $res = $mysqli->query($sql);

  // 6 $res 来循环取出数据，推荐使 fetch_assoc()
  $arr = array();
  while ($row = $res->fetch_assoc()) {
    $arr[] = $row;
  }
  echo '<pre>'. var_dump($arr) .'</pre>';


  // 6.1 fetch_row()
  echo '<h2>fecth_row() 返回索引数组</h2>
        <mark>select语句改变，会导致数组改变，不推荐使用</mark>';

  // 将结果指向设置为0，相当于放到结果集最前面,否则 $res早已循环结束，没有值
  $res->data_seek(0);
  while ( $row = $res->fetch_row() ){
    echo '<pre>'. var_dump($row) .'</pre>';
  }


  // 6.2 fetch_array()
  echo '<h2> fetch_array() 返回索引数组+ 关联数组</h2>
        <p>不推荐使用，资源请求太多，服务器压力大</p>';
  $res->data_seek(0);
  while ( $row = $res->fetch_array() ){
    echo '<pre>'. var_dump($row) .'</pre>';
  }


  // 6.3 fetch_object() 返回对象
  echo '<h2>fetch_object() 返回对象</h2>
        <p>fetch_object() 返回对象</p>';
  $res->data_seek(0);
  while ( $row = $res->fetch_object() ){
    echo '<pre>'. var_dump($row) .'</pre>';
  }


  // 7 关闭相关资源，释放结果集，如果你不释放，系统也会自动释放
  $res->free();
  // 8 关闭链接
  $mysqli->close();

?>

<script>
  // php 数组转 JS格式的JSON
  var array = <?php echo json_encode($arr);?>;
  console.log(array);
</script>
