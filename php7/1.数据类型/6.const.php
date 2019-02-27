
<?php
/* PHP 常量：长久不变的值
    常量的使用范围很广泛，以后定义我们的工作目录，定义一些特点的账户密码，版本好等都会用到常量
    常量语法：name前面没有 $
    - define(name, value)
        define('$title', 'PHP学习');

    常量的值：
    - 常量值只能是 标量
        标量包含 integer、float、string、boolean
        array、object、resource 不是标量
    
    - 常量名推荐大写，小写也不会报错
    - 常量名推荐加引号，不加引号也不会报错  
    - 常量名建议只用 字母和下划线
    - 在字符串中调用常量的时候，必须在 引号外面  


    ## PHP内置常量
    - LINE  当前所在行
    - FILE  当前文件所在服务器的路径
    - FUNCTION 当前函数名
    - CLASS 当前类名
    - METHOD 当前成员方法名
    - PHP_OS PHP运行的操作系统
    - PHP_VERSION 当前PHP版本
    - TRAIT Trait的名字，php5.4新加
    - DIR 文件所在的目录
    - NAMESPACE 当前命名空间的名称，区分大小写


    ### defined()
    defined(常量)
        - 传参是常量，如果常量定义了就返回 true，否则 false
        - 主要是为了防止其他人绕过完全检查文件
        - 用常量限制用户跳过某些文件

*/

    define('Title', 'PHP学习');
    echo Title;
    
    
    

?>