
<?php
    $username = $_GET['username'];

    $psd = $_GET['password'];

    $phone = $_GET['phone'];

    echo $username .'<br>'. $psd .'<br>'. $phone;

    // user.php?username=啥地方&password=678678&phone=营业日
    // get 传值密码是可见的

?>