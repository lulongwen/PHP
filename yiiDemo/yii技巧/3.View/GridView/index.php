<?php

?>
<style>
  .tr-selected{background-color:pink}
</style>
<header>GridView</header>


<!-- 基础的 GridView只是配置很极少属性，很多属性使用了默认配置，容易理解 -->
<?= GridView::widget([
  'dataProvider' => $dataProvider, // 数据提供器
  'filterModel' => $searchModel, // 搜索功能
  // 列数据
  'columns' => [
    ['class' => 'yii\grid\SerialColumn'], // 序号
      
    /* 对应AR类属性名称 */
    'day',
    'con_morning',
    'con_afternoon',
    'con_night',
    'note',
    'title' => [
      'attribute' => 'title',
      'format' => 'raw',
      'value' => function($model) {
        // 跳转前台页面
        return '<a href="http://www.blog.com'. Url::to(['post/detail', 'id' => $model-> id]) .'">
        '. $model->title  .'</a>';
      }
    ],
    
    'status' => [
      'label' => '状态', 
      'attribute' => 'status',
      'value' => function($model) {
        return ($model-> status == 1) ? '有效' : '无效';
      },
      'filter' => ['0' => '无效', '1' => '有效'],
    ],

    // 显示查看、编辑、删除等按钮（默认）
    ['class' => 'yii\grid\ActionColumn'],
  ]
]); ?>


<!-- 详细版本的 GridView 进行了自定义设置,主要功能有：
  改变小部件布局
  格式化显示数据
  使用下拉框搜索
  数据列设置链接
  展示复选框 并实现点击时改变当前列背景颜色
  批量删除记录功能等
-->
<?= GridView::widget([
  'dataProvider' => $dataProvider, // 数据提供器，即yii\data\ActiveDataProvider类实例
  'filterModel' => $searchModel, // 搜索模型，即AR类实例，注释这行，没有搜索框
  // 数据列
  'columns' => [
    /*
      DataColumn 显示数据，默认值
      ActionColumn 操作按钮
      CheckboxColumn 复选框，复选框值为数据表主键值
      RadioButtonColumn 单选按钮，单选框值为数据表主键值
      SerialColumn 显示行号
    */
    [
      // 显示复选框（每个复选框的值为当前记录的数据库主键值，名称为selection[]）
      'class' => 'yii\grid\CheckboxColumn',
      'footerOptions' => ['colspan' => 8], // 该列底部占8格
      // 设置该列底部内容
      'footer' => '<a class="btn btn-danger" 
        onclick=delall("'.Yii::$app->urlManager->createUrl(['life/delall']).'")>删除所有选中数据</a>'
    ],

    [
      'class' => 'yii\grid\ActionColumn',

      'attribute' => 'day', // AR模型属性名称，即要显示的数据表字段名称
      'label' => '日期',//设置属性标签
      'header' => '日期',//设置该列标题（和label类似，区别是使用header设置之后该列无法使用排序功能
      'headerOptions' => [],//设置当前列头部样式

      // 设置当前列的样式，如宽度
      'options' => ['width' => '150'],
      'contentOptions' => ['class' => 'bg-danger'],//设置当前列内容样式，如背景色等


      'enableSorting' => false, // 是否开启排序功能，默认为true
      'visible' => true, // 设置该列内容是否可见，默认为true
      'filter' => true, // 是否显示搜索框，默认为true
      'filter' => [],//键值对数组, 设置下拉框搜索
      'filter' => Html::activeDropDownList($searchModel, 'mood', [],//键值对数组
        ['prompt' => '全部']),
      // 不要转义 HTML标签
      // 在GridView小部件单元格中展示html，一定要设置format参数为raw，否则html代码会原样输出在页面上！
      'format' => 'raw',
      'format' => ['date', 'php:Y.m.d'],// 设置日期格式

      // 设置该列显示内容
      'value' => function($model, $key, $index, $column) {
        return Html::a(date('Y-m-d H:i:s', $model->day),
          ['life/view', 'id' => $key], ['title' => '查看详情']);
      },

      'footer' => '', // 设置当前列底部内容
      // 隐藏最后一列
      'footerOptions' => ['class' => 'hide'],
      // 也可以这样写
      'footerOptions' => ['style' => 'display:none'],
    ],

    [
      'attribute' => 'mood',
      'value' => function($model) {
        $moods = ['没什么好说的', '略沉重', '有点郁闷', '还好吧', '小窃喜', '欢愉', '嗨森'];
        return $moods[$model->mood];
      },
      // 设置下拉框搜索
      'filter' => ['有点郁闷', '还好吧', '小窃喜', '欢愉', '嗨森'],
      // 下拉框搜索也可以这样写
      'filter' => Html::activeDropDownList($searchModel,
        'mood', ['没什么好说的','略沉重', '有点郁闷'], ['prompt' => '全部']),
      'footerOptions' => ['class' => 'hide']
    ],

    [
      'attribute' => 'con_afternoon',
      'footerOptions' => ['class' => 'hide']
    ],
    [
      'attribute' => 'note',
      'enableSorting' => false,// 设置是否开启排序功能
      'visible' => true,// 设置该列内容是否可见
      'footerOptions' => ['class' => 'hide']
    ],

    // 最后一列，显示查看、编辑、删除等按钮（默认）
    ['class' => 'yii\grid\ActionColumn'],
    // 自定义设置操作按钮
    [
      'class' => 'yii\grid\ActionColumn',
      'template' => '{view} {update} {delete}',//展示按钮（默认{view} {update} {delete}）

      'header' => '操作',// 设置该列标题（和label类似，区别是使用header设置之后该列无法使用排序功能）
      'headerOptions' => ['width' => 100],// 该列宽度设置

      // 自定义删除按钮
      'buttons' => [
        'delete' => function($url, $model, $key) {
          return Html::a('<i class="fa fa-ban"></i> 删除',
            // 设置删除按钮请求方法和参数，这里设置请求方法为del，默认为delete，
            // $key是当前记录的数据表主键值
            ['delete', 'id' => $key],
            [
              'class' => 'btn btn-danger',
              'title' => '删除',
              'data-method' => 'post',
              'data' => ['confirm' => '您确定要删除'.date('Y.m.d', $model->day).'的生活记录吗？']
            ]);
        }
      ],
      'footerOptions' => ['class' => 'hide']
    ]
  ],

  // 整体布局与样式设置，表格，简介，分页
  'layout' => "{items} {summary} {pager}",
  'tableOptions' => ['class' => 'table table-striped table-bordered'],// 设置表格样式
  'showHeader' => true,// 是否显示表格头部，默认 true，为false则表格标题行和搜索行都消失
  'showFooter' => true,// 是否显示表格尾部，默认 false，为true时底部多一空行

  // 每一行自定义样式，这里设置每一行id
  'rowOptions' => function($model) {
    return ['id' => 'tr_'.$model->id];
  },
  // 没有数据时显示的信息
  'emptyText' => '暂时没有任何生活记录！',
  // 没有数据时显示信息的样式设置
  'emptyTextOptions' => ['style' => 'color:red;font-weight:bold'],
  'showOnEmpty' => true, // 没有数据时是否显示表格
  
  'pager' => [
      // 'options' => ['class' => 'hidden']// 关闭分页（默认开启）
      // 默认不显示的按钮设置
      'firstPageLabel' => '首页',
      'prevPageLabel' => '上一页',
      'nextPageLabel' => '下一页',
      'lastPageLabel' => '尾页'
  ]
]); ?>

<script>
  // 点击复选框改变当前行背景色
  $('input[name="selection[]"]').click(() => {
    let $tr = $(`#tr-${this.value}`)

    this.checked ? tr.addClass('tr-selected') : tr.removeClass('tr-selected')
  })

  // 删除选中的所有记录
  function deleteAll(url) {
    let $ckbox = $('input[name="selection[]"]:checked'), ids = [];
    
    $.each($ckbox, function(i, o) {
        ids.push(o.value);
    });
    if(ids.length <= 0) return alert('请至少选择一条数据！');
     
    let okay = confirm('此操作将删除所有选中的数据，是否确认操作？');
    if(!okay) return;
     
    ids = ids.join(',');
    $.post(url, {'ids': ids}, function(ret) {
        if(ret.ok) {
            alert('恭喜你，操作成功！');
            window.location.reload();
        } else {
            alert(ret.msg ? ret.msg : '对不起，操作失败！');
        }
    }, 'json');
  }
</script>