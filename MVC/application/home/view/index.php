<!DOCTYPE html>
<html lang="zh-cmn-hans">
<head>
	<meta charset="UTF-8">
	<title>index</title>
  <link rel="stylesheet" href="application/assets/css/bootstrap.css">
</head>
<body>
  <div class="container">
    <h1> <?php echo $data;?> </h1>


    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>ID</th>
          <th>商品名称</th>
          <th>商品价格</th>
          <th>已售出</th>
          <th>更新时间</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($list as $key => $val):?>
        <tr>
          <td><?php echo $val['goods_id']; ?></td>
          <td><?php echo $val['goods_name']; ?></td>
          <td><?php echo $val['shop_price']; ?></td>
          <td><?php echo $val['click_count']; ?></td>
          <td><?php echo date("Y-m-d H:i:s", $val['add_time']); ?></td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>

  </div>
  <script src="application/assets/js/vue.js"></script>
</body>
</html>