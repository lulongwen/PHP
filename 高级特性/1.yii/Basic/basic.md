# Yii2 Basic

* 入口文件 /web/index.php
* 命名空间 就是文件存放的位置
	* yii 指向的是 vendor/yiisoft/yii2


## controllers 控制器及 views 视图
```
controllers 命名规则
	名称+ Controller.php，例如 TestController.php

	所有的 controller 都是继承 \yii\web\Controller.php
		目录在 /vendor/yiisoft/yii2/web

	/controllers/ 新建 TestController.php
	/views/ 新建 test目录， test下 新建 index.php


views 命名规则
	视图文件全部放在 views 目录中
		控制器名称小写作为子目录，接下来就是方法名.php
	例如 TestController 中的 index方法
	创建后的文件目录应该为 views/test/index.php，对应的list为
		对应的 actionList() 为 /test/list.php


控制器调用视图
	$this->render() <?= $content ?>

	$this->renderPartial() 完全独立的页面

```


## widget
```
1 common/models/Comment.php 中准备好数据
2 到控制器中 把 recentComment 方法给视图
3 视图中用 小部件展示
	components/ RecentWidget

4 最后在视图文件中调用小部件
	index.php

```










