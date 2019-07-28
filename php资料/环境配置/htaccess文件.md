# htaccess文件



## htaccess文件是什么
	* .htaccess文件是 运行 Apache Web Server的Web服务器的配置文件
	* 对配置和重定向 Apache Web Server文件系统很有用
	* .htaccess文件采用隐藏格式。没有人可以通过URL直接看到它
	* 保存文件.htaccess即可创建 .htaccess文件
	* mod_rewrite 在Apache Web服务器配置中的 php.ini文件中启用扩展



## 禁用目录列表
* 要禁用文件夹文件列表，请包括以下代码
```
＃禁用目录列表 Options All –Indexes
```



## 错误页面
* 为特定错误设置错误页面
```
	errorDocument 
	400 http://www.yourdomain.com/error.htmlerrorDocument
	401 http://www.yourdomain.com/error.htmlerrorDocument
	404 http://www.yourdomain.com/error.htmlerrorDocument
	500 http://www.yourdomain.com/error.html

	如果要在Apache服务器中启用“重写规则”
	则必须编写：RewriteEngine on
		如果要关闭此规则，请将值更改为关闭
		RewriteEngine on

```



## 域名重定向
```
域名重定向
要将yourdomain.com永久重定向到 www.yourdomain.com，添加以下代码：
	RewriteCond％{HTTP_HOST} ^ yourdomain.comRewriteRule（。*）http://www.yourdomain.com / $ 1 [R = 301，L]


子域重定向
子文件重定向映射到该文件夹。这里www.yourdomain.com正在连接到该 website_folder 文件夹。

RewriteCond％{HTTP_HOST} ^ www \ .yourdomain \ .com $RewriteCond％{REQUEST_URI}！^ / website_folder /RewriteRule（。*）/ website_folder / $ 1
	这里 subdomain.yourdomain.com正在连接到该 subdomain_folder 文件夹。

RewriteCond％{HTTP_HOST} ^ subdomain \ .yourdomain \ .com $RewriteCond％{REQUEST_URI}！^ / subdomain_folder /RewriteRule（。*）/ subdomain_folder / $ 1


旧域重定向
用于将旧域（old.com）重定向到新域（new.com）的.htaccess代码。

RewriteCond％{HTTP_HOST} ^ old.comRewriteRule（。*）http://www.new.com/$1 [R = 301，L]RewriteCond％{HTTP_HOST} ^ www \ .old \ .comRewriteRule（。*）http://www.new.com/$1 [R = 301，L]



友好的URL
友好和信息丰富的URL有助于搜索引擎排名。URL是搜索引擎优化过程中非常重要的一部分

个人资料网址
个人资料网址

配置文件参数[ a-zA-Z0-9_- ]会打开此输入
http://gurutechnolabs.com/profile.php?username=test
	成http：// gurutechnolabs.com/test

RewriteRule ^（[a-zA-Z0-9 _-] +）$ profile.php？username = $ 1RewriteRule ^（[a-zA-Z0-9 _-] +）/ $ profile.php？username = $ 1


朋友网址
http://gurutechnolabs.com /friends.php?username=test到http://gurutechnolabs.com/friends/test

RewriteRule ^ friends /（[a-zA-Z0-9 _-] +）$ friends.php？username = $ 1RewriteRule ^ friends /（[a-zA-Z0-9 _-] +）/ $ friends.php？username = $ 1


具有两个参数的朋友URL
第一个参数允许[a-zA-Z0-9_-]，第二个参数只允许数字[ 0-9]

http://gurutechnolabs.com/friends.php?username=test&page=2
	至http://gurutechnolabs.com/friends/test/2

RewriteRule ^ friends /（[a-zA-Z0-9 _-] +）/（[0-9] +）$ friends.php？username = $ 1＆page = $ 2RewriteRule ^ friends /（[a-zA-Z0-9 _-] +）/（[0-9] +）/ $ friends.php？username = $ 1＆page = $ 2

```



## 隐藏文件扩展名
* 不显示网页扩展名
```
	http://www.yourdomain.com/index.html 显示为 http://www.yourdomain.com/index 
	添加以下代码：

	RewriteRule ^（[^ /。] +）/？$ $ 1.html
```



## .htaccess提高网站速度和性能
* 压缩对于减小网页大小非常有用
* 有两种压缩选项：
	* Deflate：非常容易设置。
	* GZIP：功能更强大，您可以预先压缩内容
```
启用Deflate模式
<ifmodulemod_deflate.c>
	AddOutputFilterByType DEFLATE text/text text/html text/plain text/xml text/css application/x-javascript application/javascript text/javascript
</ifmodule>


启用GZIP压缩模式
<ifModule mod_gzip.c>
	mod_gzip_on Yesmod_gzip_dechunk Yesmod_gzip_item_include file .(html?|txt|css|js|php|pl)$mod_gzip_item_include handler ^cgi-script$mod_gzip_item_include mime ^text/.*mod_gzip_item_include mime ^application/x-javascript.*mod_gzip_item_exclude mime ^image/.*mod_gzip_item_exclude rspheader ^Content-Encoding:.*gzip.*
</ifModule>

```



## 添加过期标题：启用浏览器缓存
* Expire标头用于缓存来自浏览器的数据。加速网页是有帮助的
* 因为网页可以从浏览器中检索数据，因此无需从减少HTTP请求的服务器获取数据
```
<IfModule mod_expires.c>ExpiresActive on＃如果要设置默认过期日期ExpiresDefault“访问加1个月”＃对于html文档ExpiresByType text / html“access plus 0 seconds”＃数据ExpiresByType text / xml“access plus 0 seconds”ExpiresByType application / xml“access plus 0 seconds”ExpiresByType应用程序/ json“访问加0秒”＃ RSS订阅ExpiresByType应用程序/ rss + xml“访问加1小时”#Favicon（无法重命名）ExpiresByType image / x-icon“访问加1周”#Media：图像，视频，音频ExpiresByType image / gif“access plus 1 month”ExpiresByType image / png“access plus 1 month”ExpiresByType image / jpg“access plus 1 month”ExpiresByType image / jpeg“access plus 1 month”ExpiresByType视频/ ogg“访问加1个月”ExpiresByType音频/ ogg“访问加1个月”ExpiresByType视频/ mp4“访问加1个月”#CSS和JavaScriptExpiresByType text / css“access plus 1 year”ExpiresByType应用程序/ javascript“访问加1年”ExpiresByType text / javascript“access plus 1 year”<IfModule mod_headers.c>Header append Cache-Control "public"</IfModule></IfModule>

```


## 启用Keep-Alive以减少HTTP请求
* 启用Keep-Alive，服务器告诉Web浏览器不需要为它在站点上检索的每个文件单独请求
* 请确保以减少 HTTP请求的方式对其进行编码
```
<ifModulemod_headers.c> Header Set Connection Keep-alive <ifModule>
```


## 防止垃圾邮件机器人抓取您的网站
* 网站的页面加载速度可能会因主机方案中可用的带宽而降低
* 有时垃圾邮件船会占用您的大部分带宽，而您的网站也会变慢
```
<ifModule mod_setenvif.c>#将垃圾邮件发送者引荐为spambotSetEnvifNoCase Referer spambot1.com spambot=yesSetEnvifNoCase Referer spambot1.com spambot=yes#添加任意数量的内容Order allow,denyAllow from allDeny from env=spambot<ifModule>

```













