<?php
/**
 * Created by PhpStorm.
 * User: lulongwen
 * Date: 2019-03-01
 * Time: 22:26
 
  如何显示列表
  1 获取数据库中的数据
  2 遍历数据显示到页面上
  3 分页公式 (页码-1) * 显示的数量
    每页显示 10 条
    (1-1) * 10 = 0   0, 10
    (2-1) * 10 = 10  10,10
    (3-1) * 10 = 20  20,10
    (4-1) * 10 = 30  30,10
    limit 0,3
      0 当前页码
      3 每页显示的数量
 */


header('content-type: text/html;charset=utf-8');

// 1 链接数据库
include './mysqli.php';

// 2 发送 sql语句 获取总条数
$sql = 'select * from mes_info';
$res = $mysqli-> query($sql);
// 获取多少条数据
$total = $res-> num_rows;


// 获取当前页
$page = isset($_GET['page']) ? $_GET['page'] : 1;
// 每页显示的数量
$pagesize = 2;

// 计算有多少分页，向上取整
$pagemax = ceil($total/$pagesize);

// 分页公式
$offset = ($page-1) * $pagesize;


// 3 发送 sql语句 limit 放在最后
$sql = "select * from mes_info
  order by id desc limit $offset, $pagesize";

// 4 获得资源集，要把资源集转换为数组
$res = $mysqli-> query($sql);

if (!$res){
  echo '执行失败，sql语句是：'. $sql .'<br>
        失败的原因是：'. $mysqli->error;
  exit;
}

// 定义一个空数组来接收数据
$arr = array();
while($row = $res-> fetch_assoc()) {
  $arr[] = $row;
}

?>


<!DOCTYPE html>
<html lang="zh-cmn-hans">
<head>
  <meta charset="UTF-8">
  <title>我的留言列表</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../node_modules/bulma/css/bulma.min.css">
  <link rel="stylesheet" href="message.css">
</head>
<body>
  <div class="container">
    <article class="message is-primary">
      <div class="message-header">
        <a href="index.html">发表留言</a>
      </div>
    </article>

    <div class="columns">
      <div class="column">
        <nav class="panel">
          <p class="panel-heading">
            最新留言
          </p>
          <a class="panel-block is-active">
            <span class="panel-icon">
              <i class="fas fa-book" aria-hidden="true"></i>
            </span>
            bulma
          </a>
          <a class="panel-block">
            <span class="panel-icon">
              <i class="fas fa-book" aria-hidden="true"></i>
            </span>
            marksheet
          </a>
          <a class="panel-block">
            <span class="panel-icon">
              <i class="fas fa-book" aria-hidden="true"></i>
            </span>
            minireset.css
          </a>
          <a class="panel-block">
            <span class="panel-icon">
              <i class="fas fa-book" aria-hidden="true"></i>
            </span>
            jgthms.github.io
          </a>
        </nav>
      </div>

      <div class="column is-two-thirds">
        <!-- $key 下标 0, 1，$val {} 对象 -->
        <?php foreach($arr as $key=> $val):?>
          <article class="message is-primary">
            <div class="message-header">
              <header class="is-clearfix">
                <?php echo $val['name'] .' '.$val['title']; ?>
                <small class="is-pulled-right"><?php echo $val['phone'];?></small>
              </header>
            </div>
            <div class="message-body">
              <?php echo $val['content']; ?>
            </div>
            <footer class="message-foot is-clearfix">
              <span><?php echo $val['email'];?></span>
              <span class="is-pulled-right"><?php echo $val['addtime']?></span>
            </footer>
          </article>
        <?php endforeach;?>

        <nav class="pagination is-rounded">
          <a class="pagination-previous"
            href="list.php?page=<?php echo ($page <= 1 ? $page : $page-1);?>">上一页</a>
          <a class="pagination-next"
            href="list.php?page=<?php echo ($page >= $pagemax ? $pagemax : $page+1);?>">下一页</a>
          <a class="pagination-next"
            href="list.php?page=<?php echo $pagemax;?>">未页</a>
          <ul class="pagination-list">
            <?php for($i=1; $i<= $pagemax; $i++) {
              // 注意拼接时，运算符的优先级 () 内优先运算
              echo '<li><a href="list.php?page='. $i .'"
                        class="pagination-link '.($page == $i ? 'is-current' : '').'">'. $i .'</a></li>';
            };?>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</body>
</html>














