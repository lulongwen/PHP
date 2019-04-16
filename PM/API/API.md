# PHP API


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