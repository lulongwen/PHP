<?php

/*
  options  针对 itemView::widget 的样式设置

  layout 整个ListView布局
    items 渲染的 itemView
    summary 有多少条数据
    pager 分页
  
  itemOptions 针对渲染的单个itemView 的样式设置
*/
?>

<header> ListView </header>

<!-- 视图文件中使用ListView来展示数据了 -->

<?= ListView::widget([
  'id' => 'postList',
  'dataProvider' => $dataProvider, //数据提供器
  'layout' => '{items}<div class="col-lg-12 sum-pager">{summary}{pager}</div>',
	'itemOptions' => [
		'class' => 'col-lg-3'
	],
  'itemView' => '_listItem', //指定item视图（该视图文件与当前视图在同一个目录下)
  'options' => [
		'tag' => 'div',
		'class' => 'list-item'
	],
	'viewParams' => [ // 传参数给每一个 item
		'moodCfg' => Mood::getAll()
  ],
	
	'pager' => [
    'options' => ['class' => 'pagination pull-right'],
		//'options' => ['class' => 'hidden'],//关闭分页（默认开启）
		// 分页按钮设置
		'maxButtonCount' => 5, // 最多显示几个分页按钮
		'firstPageLabel' => '首页',
		'prevPageLabel' => '上一页',
		'nextPageLabel' => '下一页',
		'lastPageLabel' => '尾页'
	]
]) ?>