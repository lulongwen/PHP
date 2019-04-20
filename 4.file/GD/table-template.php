
<div class="table-responsive">

  <table class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>序号</th>
      <th>商品名称</th>
      <th>商品价格</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach($goods_array as $val) :?>
    <tr>
      <td><?php echo $val['goods_id']; ?></td>
      <td><?php echo $val['goods_name']; ?></td>
      <td><?php echo $val['shop_price']; ?></td>
    </tr>
    <?php endforeach;?>
    </tbody>
  </table>

  <?php echo $list;?>

</div>
