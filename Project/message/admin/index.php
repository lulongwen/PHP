<?php
  header('content-type:text/html; charset=utf-8');
  /** 处理提交请求的思路
   * 1. 接受用户提交的信息
   * 2. 链接数据库
   * 3. 选择数据库
   * 4. 把 sql语句发送给 DBms
   * 5. 得到结果
   */
  
  // 设定默认的时区，不然晚8个小时
  date_default_timezone_set('PRC');
  
  // 1 接收用户提交的信息 $_POST 预定义的超全局数组
  $msgName = $_POST['msgName'];
  $msgPhone = $_POST['msgPhone'];
  $msgEmail = $_POST['msgEmail'];
  $msgTitle = $_POST['msgTitle'];
  $msgText = $_POST['msgText'];
  $addtime = date('Y-m-d H:i:s');
  
  // 对数据进行验证
  if (!$msgName || !$msgPhone || !$msgEmail || !$msgTitle || !$msgText) {
    echo "<script>
          alert('内容不能为空！');
          location.href='../index.html';
        </script>";
    exit;
  }
  // var_dump($_POST);
  
  
  // 2 链接数据库,实例化一个 Mysqi对象
  $mysqli = new Mysqli('localhost', 'root', '', 'message', 3306);
  $mysqli->set_charset('utf8'); // 设置编码
  
  // 3 判断链接是否成功，成功返回 0，否则返回对应的错误号
  if ($mysqli->connect_errno) {
    die('链接错误，错误信息是Mysql返回的是：' . $mysqli->connect_error);
  } else {
    // echo '<br> 链接成功！';
  }
  
  
  // 4 拼接 sql语句
  $sql = "INSERT INTO mes_info VALUES('', '$msgName','$msgPhone', '$msgEmail', '$msgTitle', '$msgText', '$addtime')";
  
  // 5 执行 sql语句, $res 是  mysqli_result 的对象
  $res = $mysqli->query($sql);
  
  // 5.1 成功返回 true，失败返回 false
  if ($res) {
    echo "<script>location.href = '../info.php';</script>";
  } else {
    echo "<script>location.href = '../index.html';</script>";
    echo '<br> 执行失败， sql语句是' . $sql . '<br> 失败的原因是：' . $mysqli->error;
    exit;
  }
  
  // update & delete 修改是否影响到了数据库的表，例如删除的 id不存在
  // if( $mysqli->affected_rows >0 ){
  //     echo '<br> 真正影响到了数据库的表';
  // }else{
  //     echo '<br><mark>操作对数据表没有任何影响</mark>';
  // }
  
  // 获取刚刚添加数据的那个自增长的id的值
  // echo '<br> id='. $mysqli->insert_id;
  
  //释放资源
  // $res->free();
  
  // 8 关闭链接
  $mysqli->close();
?>











