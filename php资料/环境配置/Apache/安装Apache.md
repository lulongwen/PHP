# 安装 Apache



## 配置虚拟主机

1. hosts文件
  * 文件目录
  C:\Windows\System32\drivers\etc\hosts
  
  ```
  127.0.0.1 www.shop.com
  127.0.0.1 www.yii.com
  127.0.0.1 admin.yii.com
  ```

2. httpd-vhosts.conf
  * *文件目录
  * C:\xampp\apache\conf\extra\httpd-vhosts.conf


## PHP 处理模块

```php
179行，粘贴以下代码
  # 告诉 Apache 怎样去加载 PHP处理模块
  LoadModule php5_module "{php路径}/php5.6.3/php5apache2_4.dll"
  <FilesMatch \.php$>
      SetHandler application/x-httpd-php
  </FilesMatch>
  # php.ini的路径
  PHPIniDir "{php路径}/php5.6.3"


php 911 行
  ; 这里，需要指定 php的各个模块的路径
  extension_dir= "C:/myWamp/php5.6.3/ext"

然后，重启Apache
  httpd.exe -k restart

```