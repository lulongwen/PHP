# view 视图

* 视图是 MVC模式中的 View部分
* 视图对象为 yii\web\View 的实例，依据视图模板文件，进行构造和渲染页面
  * 习惯上称视图模板文件为 视图
  * 视图模板文件有 HTML代码和 php代码组成

* 视图文件路径，默认放在 @app/views/ControolerID目录下
  * 例如 PostController 对应的视图文件为 /views/post/

* 视图内的特殊变量 $this
  * $this 不再指向当前控制器或小部件， 而是指向视图对象，应用组件的实例
  * $this 负责管理和渲染视图模板文件

* 布局 layouts，是特殊的视图，代表多个视图的公共部分
  * <?= $content ?>
  * $content就是控制器渲染出来的结果，每个页面都不相同
  * 默认放在 @app/views/layouts/ 目录下

````php

  渲染一个局部视图，使用 $this->render()

  $this->renderPartial() 独立的页面
  render() 现在只返回渲染结果，而不是直接显示它，所以现在你必须显式地把它 echo 出来。像这样：
  echo $this->render('_item', ['item' => $item]);


替换布局
  public $layout = 'mytemplate';

禁用默认layouts
  $this-> layouts = false;

  
```


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




















