<?php
    // header('content-type:text/html;charset=utf-8');

    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $page_size = 3;
    // 分页偏移量 = (当前页面-1) * 每页显示的数量
    $page_offset = ($page-1) * $page_size;



    // 1 实例化一个 Mysqli对象
    $mysqli = new Mysqli('localhost','root','','message',3306);
    $mysqli->set_charset('utf8'); // 设置字符集

    // 2 链接成功返回 0，否则返回对应的错误号
    if($mysqli->connect_errno){
        die('链接错误，错误信息是Mysql返回的是：'. $mysqli->connect_error);
    }


    // 3 拼接 sql语句, select 语句属于 dql语句，返回集对象，最新的排在最上面
    $sql = "SELECT * FROM `mes_info` ORDER BY `id` DESC LIMIT $page_offset, $page_size";

    // 4 执行 sql语句, $res 是  mysqli_result 的对象
    $res = $mysqli->query($sql);
    if(!$res){ // 失败报错
        echo '<br> 执行失败， sql语句是'. $sql;
        echo '<br><mark>失败的原因是：'. $mysqli->error .'</mark>';
        exit;
    }

    // 5 显示数据，使用 $res 来循环取出数据，推荐使用 fetch_assoc()
    $arr = array();
    while($row = $res->fetch_assoc()){
        $arr[] = $row;
    }
    // var_dump($arr);


    // 分页的数量
    $sql_max = "SELECT * FROM `mes_info`";
    $res = $mysqli->query($sql_max);
    $page_max = ceil( ($res->num_rows)/$page_size );


    // 7 关闭相关资源，释放结果集，关闭链接
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
    <title>我的留言</title>
    <link rel="stylesheet" href="../assets/css/bulma.css">
    <link rel="stylesheet" href="../assets/css/font-awesome.css">
    <link rel="stylesheet" href="../assets/css/message.css">
</head>
<body>
    <div class="container talk">
        <h1 class="title">我的留言</h1>

        <div class="columns is-desktop">
            <aside class="column is-3">
                <nav class="panel">
                    <h3 class="panel-heading">
                        最新留言
                    </h3>
                    <a class="panel-block is-active">
                        <span class="panel-icon">
                          <i class="fa fa-book"></i>
                        </span>
                        bulma
                    </a>
                    <a class="panel-block">
                        <span class="panel-icon">
                          <i class="fa fa-book"></i>
                        </span>
                        marksheet
                    </a>

                </nav>
            </aside>

            <div class="column is-9">

                <?php foreach( $arr as $val ):?>
                <article class="message is-primary">
                    <header class="message-header">
                        <h3>
                            <i class="fa fa-address-book"></i>
                            <?php echo $val['title'];?>
                        </h3>
                        <small class="is-pulled-right">
                            <?php echo $val['addtime']?>
                        </small>
                    </header>

                    <div class="message-body">
                        <?php echo $val['content']; ?>
                    </div>
                </article>
                <?php endforeach;?>

                <nav class="pagination is-small" id="pageflip">
                    <a class="pagination-previous" disabled href="info.php?page=1">首页</a>
                    <a class="pagination-next" href="info.php?page=<?php echo $page_max;?>">末页</a>
                    <ul class="pagination-list">
                        <li>
                            <!--如果当前页 <=1, 当前页就等于1， 否则 page = 当前页-1 -->
                            <a class="pagination-link is-current" href="info.php?page=<?php echo $page<=1 ? $page: $page-1 ?>">上一页</a>
                        </li>
                        <li>
                            <!--如果当前页 >= 最大页, 当前页就等于最大页， 否则 page = 当前页+1 -->
                            <a class="pagination-link" href="info.php?page=<?php echo $page>=$page_max ? $page_max: $page+1 ?>">下一页</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</body>
</html>