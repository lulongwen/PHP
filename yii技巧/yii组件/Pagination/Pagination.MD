# Pagination

* 分页组件是由 \yii\data\Pagination 提供的，
* 在 view中直接调用 \yii\widgets\LinkPager 生成分页的 Html

```php
// model 设置分页
use yii\data\Pagination;

  // totCount 总数量，pageSize 每页显示的个数
  $pagination = Pagination([
    'totalCount' => 100,
    'pageSize' => 10
  ]);

  // 分页的偏移量，每页读取的个数
  $pagination -> offset;
  $pagination -> limit;



// view.php 生成分页 HTML代码
<?= yii\widgets\LinkPager::widget([
  'pagination' => $pagination,
  'options' => [
    'id' => 'page'
  ]
]);?>


```