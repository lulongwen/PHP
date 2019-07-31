# Model 模型 rules 验证

* load() 方法可以直接加载 $_POST 等数据,
* 而 POST 的数据下标必须跟 Model 的类名一致的 , 
* 例如 Article::load($_POST)等于加载$_POST['Article']里面的数据 , 
* 另外可以 load 的字段必须出现在 rules 方法的数组中，不然也无法直接赋值

```php
<?php
  $model = new \app\models\Article;
  $model -> load(\Yii::$app->request->post());
?>

```



## Model的 rules验证规则

* rules 验证规则是在 model 调用 validate()的时候进行调用

* rules 有 22 种验证规则 , 常用的有以下几种
  * safe     不验证的字段
  * required 必填的
  * compare  对比，一般用在重置密码
  * double   双精度
  * email    邮箱验证
  * in       范围值
  * integer  整数
  * match    正则
  * string   字符串
  * unique   唯一值
  * captcha  验证码

```php
safe： 不验证的字段
['字段',多个字段可以是数组','safe'],
[['字段' , '字段'] , 'safe' ]


required：不能为空，必须验证
['字段,多个字段可以是数组','required', 'message'=>'不能为空'],
[['字段' , '字段'],多个字段可以是数组','required', 'message'=>'不能为空'],


compare：对比验证
['字段','compare', 'compareValue' => '对比的值','message'=>'提示信息'],
['字段','compare', 'compareAttribute'=> '对比的字段','message'=>'提示信息'],


double：双精度数字验证
['字段','double','min'=>'最小的值','max'=>'最大的值' , 'tooSmall' => '小于最小值的提示',
  'tooBig' => '小于最大值的提示' , 'message'=>'必须是个数字'],


email： 邮箱验证
['字段','email','message'=>'提示信息'],


in： 范围值验证
['字段','in', 'range' => '范围值', 'message'=>'提示信息'],


Integer： 整型数字验证
['字段','integer', 'message'=>'提示信息'],


match： 正则验证
['字段','in', 'pattern' => '/正则/', 'message'=>'提示信息'],


string：字符串验证
['字段','string', 'min' => '字符串最小长度' , 'max' => '字符串最大长度' , 'tooShort'=>'字
符串过短提示' , 'tooLong' => '字符串过长提示'],


unique：唯一验证
['字段','unique','message'=>'提示信息'],


captcha：验证码验证
['字段','captcha', 'captchaAction' => 'login/captcha','message'=>'提示信息'],

```



## 自定义函数验证规则

```php
// ['字段','自定函数' , 'params' => '传入自定义函数 params 的值'],

<?php
// 自定义函数
public function checkPassword($attribute , $params){
  if(empty($this->$attribute)){
    $this->addError($attribute , '不能为空');
  }
}
?>


```



## Model getErrors() 捕获错误

* 当 validate 验证有错误时 ， 可以用 getErrors 获取错误 ，
* 也可以用 getFirstError 或 getFirstErrors 获取

```php

<?php
$model = new Article();
  if (!$model -> validate()){
    print_r($model->getErrors());
  }
?>
```