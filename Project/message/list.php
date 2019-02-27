<?php
  header('content-type:text/html; charset=utf-8');
  
  // 1 链接数据库，获取数据展示在页面上
  $mysqli = new Mysqli('localhost', 'root', '', 'message', 3306);
  $mysqli->set_charset('utf8'); // 设置编码
  
  // 成功返回 0，如果有错，返回对应的错误号
  if ($mysqli->connect_errno) {
    die('链接错误，错误信息是Mysql返回的是：' . $mysqli->connect_error);
  }
  
  
  // 2 拼接 sql语句获取所有信息
  $sql = "SELECT * FROM `mes_info` ORDER BY `id` DESC";
  $res = $mysqli->query($sql); // 发送 sql语句，返回资源集
  if (!$res) {
    echo '<br> 执行失败， sql语句是' . $sql . '<br> 失败的原因是：' . $mysqli->error;
    exit;
  }
  
  // 3 循环获取到的数据
  $arr = array();
  while ($row = $res->fetch_assoc()) {
    $arr[] = $row;
  }
  
  // 4 释放资源，关闭链接
  $res->free();
  $mysqli->close();
  
  // var_dump($arr);
  
  // update & delete 修改是否影响到了数据库的表，例如删除的 id不存在
  // if( $mysqli->affected_rows >0 ){
  // echo '<br> 真正影响到了数据库的表';
  // 获取刚刚添加数据的那个自增长的id的值
  // echo '<br> id='. $mysqli->insert_id;
  // }else{
  //     echo '<br><mark>操作对数据表没有任何影响</mark>';
  // }

?>

<!doctype html>
<html lang="zh-cmn-hans">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>管理留言</title>
  <link rel="stylesheet" href="../assets/css/bulma.css">
  <link rel="stylesheet" href="../assets/css/font-awesome.css">
  <link rel="stylesheet" href="../assets/jquery/confirm/jquery-confirm.css">
  <link rel="stylesheet" href="../assets/css/message.css">
</head>
<body>
<div class="container talk">
  <div class="columns is-desktop">
    <div class="column is-8 is-offset-2">
      <h1 class="title">留言管理</h1>
      <article class="message is-primary">
        <header class="message-header">
          <h3>所有留言</h3>
          <!--<button class="delete" aria-label="delete"></button>-->
        </header>

        <div class="message-body">
          <table class="table is-bordered is-striped is-narrow is-fullwidth">
            <thead>
            <tr>
              <th>序号</th>
              <th>标题</th>
              <th>留言时间</th>
              <th class="has-text-centered">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($arr as $key): ?>
              <tr>
                <td><?php echo $key['id']; ?></td>
                <td><?php echo $key['title']; ?></td>
                <td><?php echo $key['addtime']; ?></td>
                <td>
                  <div class="field has-addons has-addons-centered">
                    <p class="control">
                      <a class="button is-small is-success" href="edit.php?page=<?php echo $key['id']; ?>">
                                                  <span class="icon is-small">
                                                    <i class="fa fa-pencil"></i>
                                                  </span>
                        <span>编辑</span>
                      </a>
                    </p>
                    <p class="control">
                      <a class="button is-small is-danger" data-href="admin/delete.php?page=<?php echo $key['id']; ?>">
                                                  <span class="icon is-small">
                                                    <i class="fa fa-trash-o"></i>
                                                  </span>
                        <span>删除</span>
                      </a>
                    </p>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
            </tbody>
          </table>

          <nav class="pagination is-small">
            <a class="pagination-previous" disabled>上一页</a>
            <a class="pagination-next">下一页</a>
            <ul class="pagination-list">
              <li>
                <a class="pagination-link is-current">1</a>
              </li>
              <li>
                <a class="pagination-link">2</a>
              </li>
              <li>
                <a class="pagination-link">3</a>
              </li>
            </ul>
          </nav>
        </div>

      </article>
    </div>
  </div>
</div>

<script src="../assets/jquery/jquery.min.js"></script>
<script src="../assets/jquery/confirm/jquery-confirm.js"></script>
<script>
  $(function () {
    $('body').on('click', function (ev) {
      let self = $(ev.target).parent(),
        href = self.attr('data-href');
      if (!href) return;
      console.log(href)
      $.confirm({
        title: '删除确认！',
        content: '您确定删除这个数据吗？',
        buttons: {
          ok: {
            text: '确定'
          },
          cancel: {
            text: '取消'
          }
        },
        onAction: function (ev) {
          if (ev == 'ok') {
            self.attr('href', href);
            $(ev.target).trigger('click');
          }
          
        }
      });
      
      return false;
    })
  });
</script>
</body>
</html>