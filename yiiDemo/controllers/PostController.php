<?php

namespace app\controllers;

use app\models\Post;
use app\forms\TestForm;

use yii\web\Cookie;
use yii\data\Pagination;

// 所有的控制器都必须继承 Controller
class PostController extends \yii\web\Controller
{
  
  public function actionIndex()
  {
    // 关联数据库 post
    $model = new Post();
    $res = Post::findOne(2);
    
    echo '<pre>';
    var_dump($model, $res);
    
    return $this -> render('index');
  }
  
  
  public function actionForm() {
    // 不关联数据库
    $model = new TestForm();
    
    echo '<pre>';
    var_dump($model);
  }
  
  
  // 查询数据
  public function actionQuery() {
    $id = 1;
    $sql = 'select * from post where id=:id';
    
    // id = :id， :id 就是占位符
    $result = Post::findBySql($sql, [':id' => $id]) -> all();
    
    $result = Post::find() -> where([':id' => $id]) -> all();
    
    
    // 大于 id的
    $result = Post::find() -> where('>', 'id', 1) -> all();
    
    // between id >= 1 && id <= 3
    $result = Post::find() -> where('between', 'id', 1, 3) -> all();
    
    // title like '%keyword%', title columns 列, keywords 关键词
    $result = Post::find() -> where('like', 'title', 'keywords') -> all();
    
    
    // 查询很多数据，1 转数组，对象在内存中的占用比 数组要高
    $result = Post::find() -> where('between', 'id', 1, 3) -> asArray() -> all();
    // 多少条数据
    count($result);
    
    // 2 批量查询 要配合 foreach使用, betch(2) 每次拿多少条数据
    $data = Post::find() -> betch(2);
    foreach($data as $row) {
      print_r($row);
    }
  }
  
  
  // 查询数据，渲染列表，访问路由 index.php?r=post/list
  public function actionList() {
    // 获取数据
    $model = Post::find() -> orderBy('updated_at DESC');
    
    $pagination = new Pagination([
      'totalCount' => $model -> count(),
      'pageSize' => 5,
    ]);
    
    $data = $model -> offset($pagination -> offset)
                   -> limit($pagination -> limit) -> all();
    
    // 把数据注入视图
    return $this -> render('list', ['model' => $data, 'pagination' => $pagination]);
  }
  
  
  // 添加数据
  public function actionCreate() {
    $model = new Post();
    // $model -> title = 'php basic foundation';
    
    // 验证表单数据，判断是不是 post 请求
    if (Yii::$app -> request -> isPost) {
      $post = Yii::$app -> request -> post();
      
      if ($model -> load($post) && $model -> save() ) {
        return $this -> redirect(['post/index']);
      }
    }
    
    // model 注入到视图中
    return $this -> render('create', ['model' => $model]);
    
    
    /*
    // 如果验证失败
    if ($model -> validate() -> hasErrors()) die('添加失败');

    // 验证成功，保存数据
    $model -> save();
    */
  }
  
  
  
  // 修改数据 :id 占位符，防止 sql注入
  public function actionUpdate($id) {
    // 强制转换变量类型, 把字符串id 转 int, (int)$_POST['id']
    $id = (int)$id;
    $model = Post::findOne($id);
    
    // 如果没有找到数据
    if (!$model) return $this -> redirect(['index']);
    
    if (Yii::$app -> request -> isPost) {
      $post = Yii::$app -> request -> post();
      if ($mdoel -> load($post) && $model -> save() ) {
        // 保存成功就跳转到首页
        return $this -> redirect(['index']);
      }
    }
    
    // 渲染页面
    return $this -> render('update', ['model' => $model]);
    
    /*
    $model = Post::find() -> where('id = :id', ['id' => $id]) -> one();
    $model -> title = 'this is php7';
    $model -> save();
    */
  }
  
  
  
  // 删除数据
  public function actionDelete($id) {
    $id = (int)$id;
    $id && Post::findOne($id) -> delete();
    
    // 删除后回到首页
    return $this -> redirect(['index']);
    
    /*
    $delete = Post::find() -> where('id = :id', ['id' => $id]) -> all();
    $delete[0] -> delete();

    // 快捷删除
    Post::deleteAll('id > :id', [':id' => 3]);
    */
  }
  
  
  
  /* 多表关联查询，根据顾客查询订单信息
    customer_id 属于 订单表 Order， id属性 客户表 Customer
    要把 $orders 给封装起来，
    因为涉及到表的信息，数据库改变有强耦合，数据库改变不要影响到控制器
  */
  public function actionRelation() {
    // 一个客户，多个订单
    $customer = Customer::find() -> where('name = :name', [':name' => $name]) -> one();
    $orders = $customer -> hasMany(Order::className, ['customerid' => 'id'])
                        -> asArray() -> all();
    
    /* 代码优化为下面的 orders 原理
      php 访问对象中,不存在的属性时，会调用魔术函数 __get()
      __get() 会调用控制器 get+ 属性的名字 orders，例如 getOrders()
      调用完成后，会在后面自动补上 all() 方法
      只要 models里面有 getOrders 方法就会获取到数据
    */
    $orders = $customer -> orders;
    
    // 关联结果缓存问题，解决数据更新，unset() 解决本地缓存问题
    unset($customer -> orders);
    $order2 = $customer -> orders;
    
    
    // 关联的多次查询, select * from order where customerid in ...
    $customer = Customer::find() -> all();
    $customer = Customer::find() -> with('orders') -> all();
    
    foreach($customer as $row) {
      $order = $row -> orders;
    }
    
    // 根据订单查询顾客信息
    $order = Order::find() -> where('id = :id',[':id' => 1]) -> one();
    $customer = $order -> customer;
  }
  
  
  //
  public function actionDetail()
  {
    return $this -> render('detail');
  }
  
  
  
}
