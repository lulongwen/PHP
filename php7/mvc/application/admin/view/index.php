<!DOCTYPE html>
<html lang="en">
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
          <th>姓名</th>
          <th>标签</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($list as $key => $val):?>
        <tr>
          <td><?php echo $val['id']; ?></td>
          <td><?php echo $val['name']; ?></td>
          <td><?php echo $val['title']; ?></td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>

  </div>
  <script src="application/assets/js/vue.js"></script>
</body>
</html>