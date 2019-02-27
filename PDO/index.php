
<?php
    /**
     * PDO 类实例化 PDO对象
     * 参数1：数据源
     * 参数2：用户名
     * 参数3：密码
     */
    $dns = 'mysql:host=127.0.0.1;dbname=db2;port=3306;charset=utf8';
    $user = 'root';
    $password = 'root';

    $pdo = new PDO($dns, $user, $password);

    // 增加一条记录：
    $sql = "INSERT INTO employee VALUES(68,'唐让','女','2000-12-20','未知','9000','平面设计师')";
    $row = $pdo -> exec($sql);
    var_dump( $row );

?>