<?php
/**
 * Created by PhpStorm.
 * User: lulongwen
 * Date: 2019-03-03
 * Time: 22:38
 */

// 1 引入 mysqli链接
include '../mysqli.php';

// 2 拼接 sql语句
$sql = "select * from mes_info order by id desc";
$res = $mysqli-> query($sql);

if (!$res) {
  echo '<br> 执行失败， sql语句是' . $sql .
    '<br> 失败的原因是：' . $mysqli->error;
  exit;
}

// 3 循环获取的数据
$arr = array();
while($row = $res-> fetch_assoc() ){
  $arr[] = $row;
}

// 4 释放资源，关闭 mysqli链接
$res-> free();
$mysqli-> close();
?>


<!DOCTYPE html>
<html lang="zh-cmn-hans">
<head>
  <meta charset="UTF-8">
  <title>留言管理</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../node_modules/bulma/css/bulma.min.css">
  <link rel="stylesheet" href="../message.css">
</head>
<body>
  <div class="container">
    <article class="message is-primary">
      <header class="message-header">
        <h1>留言管理</h1>
      </>
    </article>

    <div class="columns">
      <header class="column">
        <nav class="panel">
          <p class="panel-heading">
            管理列表
          </p>
          <p class="panel-block is-active">
            最新留言
          </p>
        </nav>
      </header>

      <div class="column is-three-quarters">
        <article class="message is-primary">
          <header class="message-header">
            <h1>留言管理</h1>
          </header>
          <div class="message-body" style="padding:0">
            <table class="table is-hoverable is-striped">
              <thead>
                <tr>
                  <th style="width:60px">序号</th>
                  <th style="width:100px">名字</th>
                  <th>内容</th>
                  <th>时间</th>
                  <th style="width:130px">操作</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($arr as $key=> $val):?>
                <tr>
                  <td><?php echo $key ;?></td>
                  <td><?php echo $val['name'] ;?></td>
                  <td><?php echo $val['content'] ;?></td>
                  <td><?php echo $val['addtime'] ;?></td>
                  <td>
                    <a class="button is-small is-success"
                       href="edit.php?id=<?php echo $val['id'];?>">
                      编辑
                    </a>
                    <a class="button is-small is-danger"
                       href="delete.php?id=<?php echo $val['id'];?>">
                      删除
                    </a>
                  </td>
                </tr>
              <?php endforeach;?>
              </tbody>
          </div>
        </article>
        
      </div>
    </div>
  </div>
</body>
</html>