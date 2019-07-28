
<?php
    $username = $_REQUEST['username'];

    $psd = $_REQUEST['password'];

    $phone = $_REQUEST['phone'];

    echo $username .'<br>'. $psd .'<br>'. $phone;

    // user.php 通过看不见的浏览器的请求头文件传递的数据。所以在URL栏不可见。
    // post 传值密码是 看不到的

?>