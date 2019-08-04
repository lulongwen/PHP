<?php
/*
  命名空间是必须的，不然无法读取到该类
  app 指的是网站根目录，类似当前的根目录
  controllers 存放 Controller 的目录
    业务逻辑代码都放在 Model里面处理，不要放在 Controller 里面
*/
namespace app\controllers;

use app\models\Post;

/*
Yii的控制器是放在 controllers 里面
  命名规则是 名称 + Controller.php, 首字母大写
  例如：PostController.php

Controller 在哪里
  vendor/yiisoft/yii2/web/Controller
所有的控制器都必须继承 都继承 yii\web\Controller.php
控制器的引用规则
  命名空间 + 类名，例如 yii\web\Controller
 * Class TestController
 * @package app\controllers
 */

class TestController extends \yii\web\Controller
{
  // 指定布局模板
  public $layout = 'common';
  
  
  public function actionIndex()
  {
    $model = new Post();
    
    
    return $this -> render('index');
  }
  
  
  
  
  /* 这里要给外部访问的都必须加上 action
    index 是默认路由，访问的路由
    index.php?r=post 或者 index.php?r=test/index
   */
  public function actionCreate()
  {
    echo 'good yii';
    return $this -> render('create');
  }
  
  
  // action后面是驼峰，访问路由要写成中划线
  // 访问的路由 index.php?r=test/show-user
  // 写成 index.php?r=test/showUser 报 404错误
  public function actionShowUser() {
    // Controller 内置函数
    $this -> goHome(); // 回到首页
    
    $this-> goBack(); // 返回上一级页面
    
    $this-> refresh(); // 刷新当前页面，多用于 提交表单后重置表单，或实时获取最新数据
    
    $this-> redirect(['test/list']); // 页面重定向
  }
  
  
  public function actionDetail()
  {
    // 控制器内置函数，重定向
    $this-> redirect(['test/index']);
    
    // 回到首页
    $this-> goHome();
    
    // 上级目录
    $this-> goBack();
    
    // 刷新当前页面
    $this-> refresh();
    
    
    return $this -> render('detail');
  }
  
  

  
  public function actionRequest()
  {
    $request = Yii::$app-> request;

    // 获取get id参数，如果没有，后面的是默认参数
    $request-> get('id', 3);

    // 获取 post参数，后面的是默认值
    $request-> post('name', 'ok');


    // 判断是 get/post请求
    $request-> isGet;
    $request-> isPost;

    // 获取 IP
    $request-> userIp;


    return $this -> render('update');
  }


  // response 响应处理
  public function actionResponse()
  {
    $response = Yii::$app-> response;

    // 设置状态码
    $response-> statusCode = '403';


    // 设置相应的 headers, 不缓存
    $response-> headers-> add('pragma', 'no-cache');
    // 缓存时间5秒，清除缓存
    $response-> headers-> set('pragma', 'max-age=5');
    $response-> headers-> remove('pragma');


    // 302 跳转
    $response-> headers-> add('location', 'https://www.lulongwen.com');
    $this-> redirect('https://www.lulongwen.com');


    // 文件下载
    $response-> headers-> add();
    $response-> headers-> add('content-disposition', 'attachment; filename="ok.jpg"');
    $response-> sendFile('./ok.jpg');
  }



  // session
  public function actionSession()
  {
    $session = Yii::$app -> session;
    
    $session -> open();
    if ($sesssion -> isActive) {
      // 是否开启 session
      echo 'session is open';
    }


    // 获取 session
    $session -> get('user');

    // 设置 session
    $session -> set('user', 'lucy');
    // 数组设置 session
    $session['user'] = 'lucy';
    echo $session['user'];


    // 删除 session
    $session -> remove('user');
    unset($session['user']);
  }



  // Cookie, request请求获取 cookie，cookie在浏览器里面是加密的
  // 加密的方法在 /config/web.php里面的
  // 通过 cookieValidationKey 对 cookie加密
  public function actionCookie() {
    $cookie = Yii::$app -> response -> cookies;

    $cookieData = array('name' => 'lucy', 'value' => 300);
    $cookie -> add(new Cookie($cookieData));
    $cookie -> remove('name');

    // 如果没有 cookie，第二个就是默认值
    // request请求获取 cookie
    $cookieName = Yii::$app -> request -> cookies -> getValue('name', 'lucy');
  }
}
