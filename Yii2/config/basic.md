# Yii2 Basic

* 入口文件 /web/index.php
* 命名空间 就是文件存放的位置
* yii 指向的是 vendor/yiisoft/yii2


## Controllers 控制器
```
controllers 命名规则
	名称+ Controller.php，例如 TestController.php

	所有的 controller 都是继承 \yii\web\Controller.php
		目录在 /vendor/yiisoft/yii2/web

	/controllers/ 新建 TestController.php
	/views/ 新建 test目录， test下 新建 index.php

控制器调用视图
	$this->render() <?= $content ?>

	$this->renderPartial() 完全独立的页面

```



## Views 视图命名规则
* 视图文件全部放在 views 目录中
* 控制器名称小写作为子目录，接下来就是方法名.php
	* 例如 TestController 中的 index方法
	* 创建后的文件目录应该为 views/test/index.php，对应的list为
	* 对应的 actionList() 为 /test/list.php



## Models 模型
* 模型是存放 models 目录中的 , 命名规则，首字母大写
* Model 层一般继承 2 个类
	* \yii\db\ActiveRecord
	* \yii\base\Model

* 继承 ActiveRecord 和 Model 的区别
	* ActiveRecord 直接关联的数据库的表，并需要 tableName()进行关联
	* Model 并不直接关联数据表，key由自己定义
	* ActiveRecord 相对 Model 也集成了需要直接查询的函数等 
		* 例如数据库有个文章表，我们会选择 ActiveRecord 继承
		* 当用户登录验证只需要username,password 时，就选择 Model 继承

```php
	<?php
	// 链接数据库 config/db.php
	return [
	    'class' => 'yii\db\Connection',
	    'dsn' => 'mysql:host=localhost;dbname=yiidemo',
	    'username' => 'root', // 数据库用户名
	    'password' => 'root', // 密码
	    'charset' => 'utf8mb4', // 字符集
	    'tablePrefix' => 'blog_' // 表前缀
	];


	// 在 models 目录下新建 Post.php
	// 继承 ActiveRecord
	<?php
	namespace app\models;
	use yii\db\ActiveRecord;

	class Post extends ActiveRecord
	{
	  public static function tableName { return '{{%post}}'; }
	}


	// 继承 Model
	<?php
	namespace app\models;
	use yii\base\Model;

	class LoginForm extends Model
	{
	  public $username;
	  public $password;
	}

	// 通过控制器调用 Models/Post
	<?php
	namespace app\controllers;
	use yii\web\Controller;

	class TestController extends Controller{
		public function actionIndex(){
			$article = new \app\models\Post();
		}
	}

```



## Model 模型的表单验证
* load方法可以直接加载 $_POST等数据 , 而 POST的数据 下标必须跟 Model 的类名一致
* 例如：Post::load($_POST) 等于加载 $_POST['post']里面的数据
* load的key 必须出现在 rules方法的数组中，不然无法直接赋值


## Request 组件
* Request 封装了 $_SERVER ，统一了不同 Web 服务器的变量
* 并且提供 $_POST, $_GET, $_COOKIES
* 还包括 HTTP 中 PUT, DELETE 等方法

```php
	<?php
		$model = new \app\models\Post;
		$model -> load(\Yii::$app -> request -> post());
	?>
```





### 自定义函数验证规则
```php
// ['key','自定函数' , ‘params’ => ‘传入自定义函数 params 的值’]
<?php
//自定义函数 
public function checkPassword($attribute , $params){
	if(empty($this->$attribute)){
		$this->addError($attribute , '不能为空'); }
	}
?>

```

### Model getError() 获取验证错误
* validate 验证有错误时，用以下方式捕获错误
	* getErrors
	* getFirstError
	* getFirstErrors

```php
<?php
	$model = new Post();
	if (!$model -> validate()) {
		print_r($model -> getErrors());
	}
?>
```



### 调用 Request 组件
```
直接调用 Request 类
	\Yii:$app -> request

常用 Request方法及属性
	是不是 ajax请求 \Yii:$app -> request -> isAjax
	是不是 post请求 \Yii:$app ->request -> isPost
	用户浏览器 \Yii::$app -> request -> userAgent
	
	用户 ip \Yii:$app -> request -> userIp
	$_GET
		\Yii:$app -> request -> get()
		\Yii:$app -> request -> get('username')

	$_POST
		\Yii:$app -> request -> post()
		\Yii:$app -> request -> post('username')

	参考资料 https://www.yiiframework.com/doc/api/2.0/yii-web-request

```



## Html组件
* \yii\helpers\Html 组件
* 封装好的 Html代码，直接调用 Html的相对方法就可以，生成相对应的 Html代码
* 参考资料 https://www.yiiframework.com/doc/api/2.0/yii-helpers-html

### 常用的 Html组件
* 参考 form.php
```php
// Html的编码和解码
<?php
	$html = '<b>test</b>';
	// 编码
	$html2 = \yii\helpers\Html::encode($html);

	// 解码
	$html3 = \yii\helpers\Html::decode($html2);
?>

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



## 









