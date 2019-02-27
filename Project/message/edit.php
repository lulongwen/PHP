<?php
  # 1 获取编辑页面的 ID
  $editId = $_GET['page'];
  if (empty($editId)) {
    echo "<script>
                alert('错误的操作！');
                location.href='list.php';
            </script>";
    exit;
  }
  
  # 2链接数据库
  $mysqli = new Mysqli('localhost', 'root', '', 'message', 3306);
  $mysqli->set_charset('utf8');
  # 成功返回 0, 有错，返回对应的错误号
  if ($mysqli->connect_errno) {
    die('链接失败，Mysql返回的错误是： ' . $mysqli->connect_error);
  }
  
  # 发送 sql语句
  $sql = "select * from `mes_info` where `id`= '{$editId}'";
  $res = $mysqli->query($sql); # 5 执行 sql语句
  
  # 4 判断链接是否成功
  if (!$res) {
    echo '执行失败，发送的sql语句是：' . $sql . '<br> 失败的原因是： ' . $mysqli->error;
    exit;
  } else {
    $arr = $res->fetch_assoc();
    var_dump($arr);
  }
  
  // 释放，关闭sql链接
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
  <link rel="stylesheet" href="../assets/css/bulma.css">
  <link rel="stylesheet" href="../assets/css/font-awesome.css">
  <link rel="stylesheet" href="../assets/jquery/confirm/jquery-confirm.css">
  <link rel="stylesheet" href="../assets/css/message.css">
</head>
<body>
<div class="container talk">
  <div class="columns is-desktop">
    <div class="column is-half is-offset-one-quarter">
      <h1 class="title">编辑留言</h1>
      <form action="update.php" method="post" class="form" name="livemsg">
        <input type="hidden" name="msgId" value="<?php echo $arr['id'] ?>">
        <div class="field">
          <label class="label">姓 名：</label>
          <p class="control">
            <input class="input is-success" type="text" name="msgName" value="<?php echo $arr['name'] ?>"
                   data-name="姓名">
          </p>
          <!--<p class="help is-danger">必须填写姓名</p>-->
        </div>

        <div class="field">
          <label class="label">手机号码:</label>
          <p class="control">
            <input class="input is-success" type="number" name="msgPhone" value="<?php echo $arr['phone'] ?>"
                   data-name="手机号码">
          </p>
        </div>

        <div class="field">
          <label class="label">电子邮件:</label>
          <p class="control">
            <input class="input is-success" type="email" name="msgEmail" value="<?php echo $arr['email'] ?>"
                   data-name="电子邮件">
          </p>
        </div>

        <div class="field">
          <label class="label">留言主题:</label>
          <p class="control">
            <input class="input is-success" type="text" name="msgTitle" value="<?php echo $arr['title'] ?>"
                   data-name="留言主题">
          </p>
        </div>

        <div class="field">
          <label class="label">留言内容:</label>
          <p class="control">
            <textarea class="textarea is-success has-fixed-size" name="msgText" id="" cols="30" rows="2"
                      data-name="留言内容"><?php echo $arr['content'] ?></textarea>
          </p>
        </div>

        <footer class="field">
          <button type="submit" class="button is-primary is-fullwidth">提交修改</button>
        </footer>
      </form>
    </div>
  </div>
</div>

<script src="../assets/jquery/jquery.min.js"></script>
<script src="../assets/jquery/confirm/jquery-confirm.js"></script>
<script>
  $(function () {
    const form = document.livemsg,
      inputs = $(':input').not('.button');
    $(form).on('submit', function () {
      for (var el of inputs) {
        const value = $.trim(el.value),
          text = el.dataset.name;
        if (!value) {
          $.alert({
            title: `必填项`,
            content: `<mark>${text} 不能为空！</mark>`
          });
          return false;
        }
      }
      
    })
  });
</script>
</body>
</html>











