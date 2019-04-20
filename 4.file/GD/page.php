<!doctype html>
<html lang="zh-cmn-hans">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="bootstrap.css">
  <title>PHP 分页</title>
</head>
<body>
  <br><br>
  <div class="container">

<?php
  // 链接商品数据库
  include '../mysqli/DAOMysqli.class.php';
  $options = array(
    'host' => 'localhost',
    'user' => 'root',
    'password' => 'root',
    'dbname' => 'db2',
    'charset' => 'utf8',
  );

  $link = DAOMysqli::getSingleton($options);
  $sql = "SELECT count(*) AS total FROM `goods`";
  $total = $link->fetchOne($sql);

  // var_dump($total); exit();


  // 创建分页导航
  require_once 'Page.class.php';

  $page = new Page();

  // 当前是第几页
  $page->_page_current = isset( $_GET['page'] ) ? $_GET['page'] : 1;

  // 每页显示几条记录
  $page->_page_size = 3;

  // 总的记录
  $page->_page_total = $total['total'];

  $list = $page->_createPage();


  /**
   * 拼接 sql语句查询所有的商品信息
   * 当前页  offset偏移量  pagesize
   *   1      0              5
   *   2      5              5
   *   3      10             5
   *   4      15             5
   *   5      20             5
   */
  $offset = ( $page->_page_current -1) * $page->_page_size;
  $size = $page->_page_size;

  // SQL 查询所有数据
  $sql = "SELECT * FROM `goods` LIMIT $offset, $size";
  $goods_array = $link-> fetchAll($sql);

  // var_dump($goods_array); exit;

  // 加载商品列表的模板
  require_once 'table-template.php';

?>

  </div>
</body>
</html>




















  
