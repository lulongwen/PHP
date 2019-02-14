
        /**
        *  废除的 mysql链接，该函数用于链接数据库， 用 mysqli & PDO
        *      - Deprecated: mysql_connect()

           // 1 链接数据库
        *  $con = @mysql_connect('localhost', 'root', 'root');
        *      - localhost 主机名
        *      - root 用户名
        *      - root 密码
        *
        *  // 2 选择数据库
        *  mysql_select_db('dbName');
        *       mysql_query(use db.sql'); // 使用 .sql文件

           // 3 设置编码
           mysql_query('set mames utf8');

        *  // 4 拼接 sql语句给 dbms，执行得到结果
        *  $sql = "INSERT INTO tableName VALUES()";
        *
        *  // 5 发送 sql语句
        *  $res = mysql_query($sql);

           if(!$res){
                echo "添加失败";
           }
        */

