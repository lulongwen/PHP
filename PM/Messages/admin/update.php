<?php
/**
 * 1 通过 id 获取当前数据的信息
 * 2 展示到页面中
 * 3 在页面中添加 input 隐藏域，把当前 id传递到操作页面中
 * 4 或通过 window.location.search 获取 url参数进行分割获取参数
 * 5 对数据进行验证，操作数据库把数据保存到数据库中
 */


// 1 引入数据库链接文件
include '../mysqli.php';

// 2 接收参数
$id = $_POST['id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$title = $_POST['title'];
$content = $_POST['content'];

$addtime = date('Y-m-d H:i:s');

// 3 验证数据不能为空和数据格式有效性
if (!$name || !$title || !$content || !$phone) {
  echo '<script>window.alert("修改内容不能为空");
    window.location.href="./edit.php"</script>';
  exit;
}

// 4 发送 sql语句
$sql = "update mes_info
  set name='{$name}', phone='{$phone}', email = '{$email}',
  title='{$title}', content='{$content}', addtime = '{$addtime}'
  where id = '{$id}'";

$res = $mysqli-> query($sql);
if (!$res) {
  echo '<script>window.alert("修改失败！");
    window.location.href="edit.php?id='. $id .'"</script>';
  echo '执行失败，sql语句是：'. $sql .'<br>
        失败的原因是：'. $mysqli->error;
  exit;
}

echo '<script>window.location.href="admin.php"</script>';

// 5 释放资源，关闭 mysqli链接
$res-> free();
$mysqli-> close();