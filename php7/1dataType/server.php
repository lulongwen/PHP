
<?php
/* PHP 环境变量 
    $_SERVER 

    $_ENV 已废弃

    环境变量不用记，知道在哪儿能找到环境变量的 key 和 value 值就行
        _SERVER['中间的值'] 是需要掌握的

        显示当前访问的这个 phpinfo() 页面文件放在那里，就可以执行
            $_SERVER['SCRIPT_FILENAME'];


    ### 环境变量的 key 和 value值
        $_SERVER["REQUEST_METHOD"]	请求当前PHP页面的方法
        $_SERVER["REQUEST_URI"]	请求的URI
        $_SERVER["SERVER_SOFTWARE"]	用的是哪一种服务器
        $_SERVER["REMOTE_ADDR"]	客户的IP地址
        $_SERVER["SERVER_ADDR"]	当前服务器的IP地址
        $_SERVER["SCRIPT_FILENAME"]	主前请求文件的路径
        $_SERVER["HTTP_USER_AGENT"]	当前访问这个网址的电脑和浏览器的情况
        $_SERVER["HTTP_REFERER"]	上级来源（用户从哪个地址进入当前网页的）
        $_SERVER["REQUEST_TIME"]	当前的时间

        - URI 和 URL都是网址，区别：
            + URL带有 主机地址部分
            + URI不带主机地址，例如：
            https://s.taobao.com/search?q=设计 是 URL
            s.taobao.com/search?q=设计 是URI，不带主机和 https://

            URL是URI的一种
            让URI成为 URL 当然就是那个访问机制，网络位置，例如：https://  , ftp://


  

*/
    echo $_SERVER['SCRIPT_FILENAME'];
    echo $_SERVER["REQUEST_TIME"];

    phpinfo();

    
    
?>