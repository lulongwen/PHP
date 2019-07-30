<?php


?>

<section class="item">
	<h3><?= Html::encode($model->title ?: '今天的日记') ?></h3>
 
	<p>
		<time><?= date('Y.m.d', $model->day) ?></time><br>
    <!-- 这里访问ListView的 'viewParams'参数传过来的参数 $moodCfg -->
		<span>心情：<?= $moodCfg[$model-> mood] ?></span>
	</p>
 
	<main>
		<?= HtmlPurifier::process(mb_substr($model->content, 0, 25).'......'); ?>
	</main>
 
	<footer>
    <p class="info">
      创建时间：<?= date('Y-m-d H:i:s', $model->created_at) ?><br>
      更新时间：<?= date('Y-m-d H:i:s', $model->updated_at) ?>
    </p>

    <p>
      <?= Html::a('<i class="glyphicon glyphicon-eye-open"></i>', 
        ['view', 'id' => $model->id], ['title' => '查看']) ?>
      <?= Html::a('<i class="glyphicon glyphicon-pencil"></i>', 
        ['update', 'id' => $model->id], ['title' => '修改']) ?>
      <?= Html::a('<i class="glyphicon glyphicon-trash"></i>', 
        ['delete', 'id' => $model->id], [
        'title' => '删除',
        'data' => [
          'confirm' => '您确定删除 '.date('Y年m月d日', $model->day).' 的日记吗？',
          'method' => 'post',
        ]
      ]) ?>
    </p>
	</footer>
</section>