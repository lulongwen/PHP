<?php
	/**
	 * 命名空间是必须的，不然无法读取到该类
	 * app 类似当前的根目录
	 * controllers 存放 Controller 的目录
	 */
	namespace app\controllers;
	
	/**
	 * 引用 Controller
	 * 引用的规则： 命名空间 + 类名
	 * Controller 在哪里
	 * vendor/yiisoft/yii2/web
	 */
	use yii\web\Controller;
	
	// 所有的控制器都必须继承 Controller
	class TestController extends Controller
	{
		/**
		 * 这里要给外部访问的都必须加上 action
		 * Index 是默认路由
		 * 访问的路由
		 * 	index.php?r=test，或者
		 * 	index.php?r=test/index
		 */
		public function actionIndex() {
			echo 'hello word';
		}
		
		
		/**
		 * 访问的路由 index.php?r=test/show-user
		 *  写成 index.php?r=test/showUser 报 404错误
		 */
		public function actionShowUser() {
			echo 'showUser';
			
			/**
			 * 控制器内置函数
			 * 重定向 $this-> redirect(['test/index']);
			 *
			 * 回到根目录 $this-> goHome();
			 *
			 * 返回上一级 $this-> goBack();
			 *
			 * 刷新当前页面 $this-> refresh();
			 */
			$this-> redirect(['test/list']);
		}
		
		// 访问 list页面
		public function actionList() {
			echo 'list.html';
			
			/**
			 * 通过控制器调用视图
			 * $this-> render()
			 * $this-> renderPartial()
			 * 区别
			 * render会调用 lagout 的公共的文件 views/layouts/main.php
			 * 	<?= $content ?> 就是 render的内容
			 * renderPartial 调用的独立的页面
			 *
			 * return 是必须的，不然不会返回视图
			 * 	index 是调用的视图文件
			 *  data 是注入到视图里面的数据
			 */
			return $this-> render('index', ['data' => [123]]);
			return $this-> renderPartial('index', ['data' => [123]]);
		}
		
	}



