<?php
  // 1 获取编辑页面的 ID
  $id = $_GET['id'];
  if (empty($id)) {
    echo "<script> alert('错误的操作！');
      location.href='./admin.php'</script>";
    exit;
  }
  
  // 2 链接数据库
  include "../mysqli.php";
  
  // 3 发送 sql 执行 sql语句
  $sql = "select * from `mes_info` where id = '{$id}'";
  $res = $mysqli->query($sql);
  
  // 4 判断链接是否成功
  if (!$res) {
    echo '执行失败，发送的sql语句是：' . $sql .
      '<br> 失败的原因是： ' . $mysqli->error;
    exit;
  }

  $arr = $res-> fetch_assoc();
  
  // 5 释放，关闭sql链接
  $res->free();
  $mysqli->close();
?>

<!doctype html>
<html lang="zh-cmn-hans">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP 编辑留言板</title>
  <link rel="stylesheet" href="../../node_modules/bulma/css/bulma.min.css">
  <link rel="stylesheet" href="../message.css">
</head>
<body>
<div class="container talk">
  <div class="columns is-desktop">
    <div class="column is-half is-offset-one-quarter">
      <h1 class="title">编辑留言</h1>
      
      <form
        action="update.php"
        method="post"
        class="form"
        name="form">
        <!-- 表单中添加一个隐藏域把id传递到 update.php
          或者用 window.location.search 去获取 id -->
        <input type="hidden" name="id" value="<?php echo $arr['id'] ?>">
        <div class="field">
          <label class="label">姓 名：</label>
          <p class="control">
            <input
              class="input is-success"
              type="text"
              name="name"
              value="<?php echo $arr['name'] ?>">
          </p>
          <p class="help is-danger">姓名不能为空</p>
        </div>

        <div class="field">
          <label class="label">手机号码:</label>
          <p class="control">
            <input
              class="input is-success"
              type="number"
              name="phone"
              value="<?php echo $arr['phone'] ?>">
          </p>
        </div>

        <div class="field">
          <label class="label">电子邮件:</label>
          <p class="control">
            <input
              class="input is-success"
              type="email"
              name="email"
              value="<?php echo $arr['email'] ?>">
          </p>
        </div>

        <div class="field">
          <label class="label">留言主题:</label>
          <p class="control">
            <input
              class="input is-success"
              type="text"
              name="title"
              value="<?php echo $arr['title'] ?>">
          </p>
        </div>

        <div class="field">
          <label class="label">留言内容:</label>
          <p class="control">
            <!-- textarea 内容不能换行，否则文字前面有很长的空格 -->
            <textarea
              class="textarea is-success has-fixed-size"
              name="content"
              id=""
              cols="30"
              rows="2"><?php echo $arr['content'] ?></textarea>
          </p>
        </div>

        <footer class="field">
          <button
            type="submit"
            class="button is-primary is-fullwidth">
            提交修改
          </button>
        </footer>
      </form>
    </div>
  </div>
</div>

</body>
</html>











