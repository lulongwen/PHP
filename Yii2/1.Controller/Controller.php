<?php
/*
  命名空间是必须的，不然无法读取到该类
  app 指的是网站根目录，类似当前的根目录
  controllers 存放 Controller 的目录

  业务逻辑代码都放在 Model里面处理，不要放在 Controller 里面
*/

namespace app\controllers;

use app\models\Post;

use yii\web\Controller;
use yii\web\Cookie;

// 所有的控制器都必须继承 Controller
class PostController extends Controller {

  // 指定布局模板
  public $layout = 'common';


  /* 这里要给外部访问的都必须加上 action
    index 是默认路由，访问的路由
    index.php?r=post ，或者 index.php?r=post/index
   */
  public function actionIndex() {
    $model = new Post();
    $list = [];


    $data = array('model' => $model, 'list' => $list);

    /* 通过控制器调用视图，传递数据给视图
      render() 渲染的是 $content, render 把内容放到 $content 里面
      renderPartial 独立的页面，index.php 省略 .php后缀

      render & renderPartial 的区别
      render会调用 lagout 的公共的文件 views/layouts/main.php
      <?= $content ?> 就是 render的内容

      renderPartial 调用的独立的页面

      return 是必须的，不然不会返回视图， index 是调用的视图文件， data 是注入到视图里面的数据
    */

    $data = ['name' => 'lucy', 'title' => 'ceo'];
    return $this-> render('index', ['model' => $model]);
    return $this-> renderPartial('index', $data);
  }


  // 访问的路由 index.php?r=post/show-user
  // 写成 index.php?r=test/showUser 报 404错误
  public function actionShowUser() {
    // Controller 内置函数
    $this -> goHome(); // 回到首页

    $this-> goBack(); // 返回上一级页面

    $this-> refresh(); // 刷新当前页面，多用于 提交表单后重置表单，或实时获取最新数据

    $this-> redirect(['test/list']); // 页面重定向
  }


  // 请求处理 Yii::$app -> request 
  public function actionRequest() {
    $request = Yii::$app -> request;

    // 获取get id参数，如果没有，后面的是默认参数
    $request -> get('id', 20);

    // 获取 post参数，后面的是默认值
    $request -> post('name', 'ok');

    // 判断是 get post请求
    $request -> isGet;
    $request -> isPost;

    // 获取 IP
    $request -> userIp;
  }


  // response 响应处理
  public function actionResponse() {
    $response = Yii::$app -> response;

    // 设置状态码
    $response ->statusCode = '403';

    // 设置相应 headers，不缓存，缓存时间5秒，清除缓存
    $response -> headers -> add('pragma', 'no-cache');
    $response -> headers -> set('pragma', 'max-age=5');
    $response -> headers -> remove('pargma');


    // 302 跳转
    $response -> headers -> add('location', 'https://www.lulongwen.com');
    $this-> redirect('https://www.lulongwen.com', 302);


    // 文件下载
    $response -> headers -> add();
    $response -> headers -> add('content-disposition', 'attachment; filename="ok.jpg"');
    $response -> sendFile('./ok.jpg');
  }


  // session
  public function actionSession() {

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