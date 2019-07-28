# XAMPP 新建多个站点

* 一般情况下，网站程序放到xampp目录下，然后在浏览器中输入 localhost 或 127.0.0.1 就能访问了；
* 缺点： 只能建立一个网站。
* 如果要测试不同的程序，就要添加多站点支持，方法如下



## 只需3步，轻松搞定多站点支持

1. 在htdocs目录下新建文件夹
  想在本地运行 bootstrap, foundation, lulongwen 3个域名
  www.bootstrap.com, www.foundation.com, www.lulongwen.com 分别指向 
  htdocs目录下的 bootstrap, foundation, lulongwen文件夹

2. 在 hosts文件中设置IP映射
  C:\Windows\System32\drivers\etc\hosts

3. 在文件的最后面，添加2行域名映射记录
  每行一个域名，前面是IP地址，用空格或Tab键隔开
  127.0.0.1 www.bootstrap.com
  127.0.0.1 www.foundation.com
  127.0.0.1 www.lulongwen.com

  然后保存，如果遇到hosts文件无法修改，解决方法：
  先备份hosts文件，然后把hosts文件复制到桌面上，桌面打开修改好之后替换hosts文件



## 以上操作说明：
* 和正常域名一样，这2个域名并不存在，也需要进行解析，否则浏览器不知道去哪儿找服务器；
* 我们使用 hosts文件解决这个问题，hosts文件用来指定域名和IP之间的映射关系，将一些常用的网址域名与其对应的IP地址建立一个关联的数据库；
* 当我们在浏览器中输入一个网址进行访问时，系统首先会在hosts文件中查找对应的IP地址，一旦找到，系统会立即打开对应网页，如果没找到，系统会再将网址提交DNS域名解析服务器进行IP地址的解析。
* 所以，hosts相当于域名解析的高速缓存文件。



## apache 中添加多域名支持，让apache绑定多个域名 
1. 打开文件
  C:\xampp\apache\conf\extra\httpd-vhosts.conf
  
  * 首先找到 NameVirtualHost *:80 ，去掉前面的注释符号 ##，一般在 20行，如果没有，手动添加。
  * 找到以下代码，一般在37行
```php

##<VirtualHost *:80>
    ##ServerAdmin webmaster@dummy-host.example.com
    ##DocumentRoot "C:/xampp/htdocs/dummy-host.example.com"
    ##ServerName dummy-host.example.com
    ##ServerAlias www.dummy-host.example.com
    ##ErrorLog "logs/dummy-host.example.com-error.log"
    ##CustomLog "logs/dummy-host.example.com-access.log" common
##</VirtualHost>

去掉注释符号 ##，修改为

<VirtualHost *:80>
    ServerAdmin postmaster@lulongwen.com
    DocumentRoot "C:/xampp/htdocs/lulongwen.com"
    ServerName www.lulongwen.com
    ErrorLog "logs/www.lulongwen.com-error.log"
    CustomLog "logs/www.lulongwen.com-access.log" common
</VirtualHost>

添加之后，保存该文件

```

2. 重启Apache验证多域名
    重启 apache服务，在浏览器中输入 www.lulongwen.com 域名访问，可以看到，说明成功

3. 让localhost再次生效
  上述操作后，发现使用 localhost直接定位到了 www.bootstrap.com下了，
  默认的是定位到 xampp\htdocs 下的内容，
  解决方法是：把 localhost的配置在 httpd-vhosts.com 中给配置回来，
  在文件的最后添加以下内容，并重启 apache
```php
<VirtualHost *:80>
    ServerAdmin postmaster@lulongwen.com
    DocumentRoot "C:/xampp/htdocs"
    ServerName localhost
</VirtualHost>

```