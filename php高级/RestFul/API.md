# PHP API



## API 介绍
* 扩展性
* 稳定性
* 性能
* 微服务架构
* 移动 APP时代 C/S技术


## API 工程化
* 对 API项目的公共技术抽离，建立有层级的 PHP API项目
* 做好异常处理及监控，保障 API高效稳定提供服务
* API 工程化 & 性能
  * 如何进行 API性能测试
  * 如何定位性能瓶颈
  * 如何解决接口 QPS & TPS问题

* API分层实现方法
  * MVC中的 MC，View因为不涉及 API
  * API性能问题的定位分析与解决能力

* 客户端 & 前端的解耦，并行开发
  * 工程化抽离，整理代码的能力
  * API的传输格式：JSON
  * API调试工具 Postman


## 常规的API
* 用户登录注册接口
* 文章类的接口
* 邮件接口
* 第三方整合的接口
  * 短信
  * 支付
  * Push消息
  * IP地址转换
  * 其它



## 输出数据
* 给前端调用的接口输出 JSON数据，只需要组织好数据，用json_encode($array)



## 获取 Ajax提交的 JSON数据
```php
$GLOBALS['HTTP_RAW_POST_DATA']
file_get_contents('php://input')

$GLOBALS['HTTP_RAW_POST_DATA']
    产生 $HTTP_RAW_POST_DATA 变量包含有原始的 POST数据
$HTTP_RAW_POST_DATA 对于 enctype="multipart/form-data" 表单数据不可用

例如
  header('content-type: application/json;charset=utf-8');
  // 设定默认的时区，不然晚8个小时
  date_default_timezone_set('PRC');

  // 1 引入数据库链接文件
  include './mysqli.php';
  // 获取数据
  $data = json_decode(file_get_contents("php://input"), true);
  // 接收参数
  $sku = $data['sku'];
```


## PHP 识别的数据类型
* PHP识别的数据类型：application/x-www.form-urlencoded标准的数据类型