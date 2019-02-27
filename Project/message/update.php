<?php
  header('content-type:text/html; charset=utf-8');
  
  // 设定默认的时区，不然晚8个小时
  date_default_timezone_set('PRC');
  
  /** 思路
   * 1. 接收更新的 ID，对 id记录进行更新操作
   * 2. 链接数据库，update 语句 where id= 这个ID
   */
  
  // 1 接收更新的信息 $_POST 预定义的超全局数组
  $msgId = $_POST['msgId'];
  $msgName = $_POST['msgName'];
  $msgPhone = $_POST['msgPhone'];
  $msgEmail = $_POST['msgEmail'];
  $msgTitle = $_POST['msgTitle'];
  $msgText = $_POST['msgText'];
  $addtime = date('Y-m-d H:i:s');
  
  // 2 对ID 进行验证
  // 对数据进行验证
  if (!$msgId || !$msgName || !$msgPhone || !$msgEmail || !$msgTitle || !$msgText) {
    echo "<script>
                alert('内容不能为空！');
                location.href='edit.php';
              </script>";
    exit;
  }
  
  // 3 链接数据库
  $mysqli = new Mysqli('localhost', 'root', '', 'message', 3306);
  $mysqli->set_charset('utf8'); // 设置编码
  
  // 3.1 成功返回 0, 有错，返回对应的错误号
  if ($mysqli->connect_errno) {
    die('链接错误，错误信息是Mysql返回的是：' . $mysqli->connect_error);
  }
  
  // 4 拼接 sql语句，通过 用户名和密码获取当前用户的信息
  $sql = "UPDATE `mes_info` SET `name` = '{$msgName}', `phone`= '{$msgPhone}', `email`= '{$msgEmail}', `title`='{$msgTitle}', `content`= '{$msgText}', `addtime`= '{$addtime}' WHERE `id`= '{$msgId}'";
  
  // 5 执行 sql语句, $res 是 mysqli_result 的对象
  $res = $mysqli->query($sql);
  if (!$res) {
    echo '<br> 执行失败， sql语句是' . $sql . '<br> 失败的原因是：' . $mysqli->error;
    exit;
  } else {
    // update & delete 修改是否影响到了数据库的表，例如删除的 id不存在
    if ($mysqli->affected_rows > 0) {
      echo "<script>
                // alert('真正影响到了数据库的表, 更新成功');
                location.href='list.php';
               </script>";
    } else {
      echo "<script>
                alert('数据添加失败');
                location.href='edit.php?page='+$msgId;
               </script>";
    }
    
  }
  
  //释放资源，关闭链接
  $res->free();
  $mysqli->close();
?>











