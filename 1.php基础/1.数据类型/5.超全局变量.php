
<?php
/* PHP 外部变量， 外部变量也是超全局变量

    $_GET
        - 作用：得到 get传值的数据
        $_GET['username'] 就得到了
        表单 <input type="text" name="username" /> 的值


    $_POST
        - 作用： 得到post传值的数据
        - $_POST['username'] 就得到了
        表单 <input type="text" name="username" /> 的值


    $_REQUEST
        - 作用：得到 get & post传值的数据
        - $_REQUEST 可以接收 get传值，也可以接收 post传值


    ### 其它外部变量，超全局变量

    $_COOKIE 得到会话中 cookie传值

    $_SESSION 得到会话中 session的值

    $_FILES  得到文件上传的结果

    $_GET 得到 get传值的结果
 
    $_POST 得到post传值的结果

    $_REQUEST 既能得到get传值，也能得到 post传值
    

    ### 
    1. 从用户输入过来的所有数据都是不可信的，要进行限制和过滤

    2. 提交数据时有 get 和post
        - get 传值在 URL中可见
        get传值密码，密码会在地址栏里面显示过后，在浏览器的历史记录里会记录你访问过的地址
        通过查看你的浏览历史记录得到你输入的密码，因此不能使用 get来传值密码

        - post 传值在 URL中不可见
        post传值是通过 浏览器的header头部将数据发送给指定服务器，
        需要通过专门的工具才能看到post发送的值

*/
$main = <<<Main
    <meta charset="UTF-8">
    <form action="dist/get.php" method="get">
        <input type="text" name="username" id=""><br><br>
        <input type="text" name="password" id=""><br><br>
        <input type="text" name="phone" id=""><br><br>
        <button type="submit">提交</button>
    </form>
Main;
    // echo $main;


$post = <<<Post
    <meta charset="UTF-8">

    <form action="dist/post.php" method="post">
        <input type="text" name="username" id=""><br><br>
        <input type="text" name="password" id=""><br><br>
        <input type="text" name="phone" id=""><br><br>
        <button type="submit">提交</button>
    </form>
Post;
    // echo $post;



$post = <<<Post
    <meta charset="UTF-8">

    <form action="dist/post.php" method="post">
        <input type="text" name="username" id=""><br><br>
        <input type="text" name="password" id=""><br><br>
        <input type="text" name="phone" id=""><br><br>
        <button type="submit">提交</button>
    </form>
Post;


$request = <<<Request
    <meta charset="UTF-8">

    <form action="dist/request.php" method="get">
        <input type="text" name="username" id=""><br><br>
        <input type="text" name="password" id=""><br><br>
        <input type="text" name="phone" id=""><br><br>
        <button type="submit">提交</button>
    </form>
Request;
    echo $request;
    
?>