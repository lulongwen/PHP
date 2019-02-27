
<?php
    header('content-type:text/html; charset=utf-8');

    // 获取当前page的值，如果有值，就获取，否则默认等于1
    $page = isset($_GET['page']) ? $_GET['page'] : 1;


    $page_size =3; // 每页显示的数量

    // 分页偏移量 = (当前页面-1) * 每页显示的数量
    $page_offset = ($page-1) * $page_size;
    // echo '分页偏移量 '. $page_offset;


    // 连接数据库
    $mysqli = new Mysqli('localhost', 'root', '', 'message', 3306);
    $mysqli->set_charset('utf8');
    if($mysqli->connect_errno){ // 链接成功返回0
        die('链接错误，Mysql返回的错误信息是：'. $mysqli->connect_error);
    }

    // 准备 sql语句
    $sql = "SELECT * FROM `mes_info` ORDER BY `id` DESC LIMIT $page_offset, $page_size";
    // 发送sql语句
    $res = $mysqli->query($sql);


    $arr = array(); // 处理结果资源集
    while($row = $res->fetch_assoc() ){
        $arr[] = $row;
    };
    // var_dump($arr);

    // 最大分页数
    $sql_max = "SELECT * FROM `mes_info`";
    $res = $mysqli->query($sql_max);
    // $res_length = $res->num_rows;
    $page_max = ceil(($res->num_rows)/$page_size); // ceil() 页码向上取整


    $res->free();
    $mysqli->close();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>php 分页</title>
    <style>
        a{
            text-decoration: none;
        }
        .box{
            max-width: 800px;
            width: auto;
            min-height: 300px;
            height: auto;
            margin: 3em auto;
            background-color: rgba(23,23,23,.06);
        }
        .list{
            padding-top: 3em;
        }
        .box a{
            background-color: #f60;
            color:#fff;
            padding: 5px 15px;
        }
    </style>
</head>
<body>
    <section class="box">
        <h1 class="title">文章标题列表</h1>
        <ol>
            <?php foreach($arr as $val):?>
            <li>
                <?php echo $val['title'];?>
            </li>
            <?php endforeach;?>
        </ol>

        <!-- 对分页进行控制 -->
        <div class="list">
            <a href="page.php?page=1">首页</a>
            <a href="page.php?page=<?php echo $page<=1 ? $page : ($page-1);?>">上一页</a>
            <a href="page.php?page=<?php echo $page>=$page_max ? $page_max : ($page+1);?>">下一页</a>
            <a href="page.php?page=<?php echo $page_max;?>">末页</a>
        </div>
    </section>
</body>
</html>
