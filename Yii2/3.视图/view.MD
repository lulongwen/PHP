# 展示多条数据的小部件
* 相比GridView，ListView可以更加灵活地设置数据展示的格式
* ListView 和 GridView继承于同一个父类 BaseListView, 有很多设置参数是一样的



## 数据展示小部件参考资料
* DetailView
  https://www.bbsmax.com/A/gVdnY0r85W 

* GridView
  ` 'model' => $model `
	https://www.yiichina.com/tutorial/460
	https://www.imooc.com/article/36206
	https://segmentfault.com/a/1190000003765961

* ListView


* PostSearch 是Yii搜索功能的范本, 研究透了，就对搜索很熟练了



## Layouts
* render
* renderPartial 只显示内容，不显示头部尾部
```
  public $layout = 'my'; 自定义 layouts
  <?= $content ?>  自定义 layouts显示内容

  return $this-> render('index', ['model' => $model]);

  return $this->renderPartial(['list', ['model' => $model]]);
```


## Html::submitButton();



## Pagination([]); 分页组件



## Url::to(); 路由链接


## Validate 表单验证
* rules() & attributeLabels()


### rules()


### attributeLabels()



## ActiveForm()
* actoin 默认的是当前控制器的名称




















