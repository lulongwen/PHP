
<?php
    header('content-type:text/html; charset=utf-8');
    /** 处理提交请求的思路
     * 1. 接受用户提交的信息并验证
     * 2. 链接数据库
     * 3. 通过用户名和密码获取当前用户的数据 select语句
     * 4. 如果有用户跳转列表页，如果没有用户，警告
     */

    // 1 接收表单数据
    $loginUser = $_POST['loginUser'];
    $loginPass = $_POST['loginPass'];

    // 2 对数据进行验证
    if(!$loginUser || !$loginPass){
        echo "<script>
                alert('表单不能为空！');
                location.href='../login.html';
              </script>";
        exit;
    }

    // 3 验证用户名和密码对不对，怎么验证？ 链接数据库
    $mysqli = new Mysqli('localhost','root','','message',3306);
    $mysqli->set_charset('utf8'); // 设置编码

    // 3.1 成功返回 0
    if($mysqli->connect_errno){ // 如果有错，返回对应的错误号
        die('链接错误，错误信息是Mysql返回的是：'. $mysqli->connect_error);
    }


    // 4 拼接 sql语句，通过 用户名和密码获取当前用户的信息
    $sql = "SELECT * FROM `admin` WHERE `userName` = '{$loginUser}' AND `userPass` = '{$loginPass}'";

    // 5 执行 sql语句, $res 是 mysqli_result 的对象
    $res = $mysqli->query($sql);
    if(!$res){
        echo '<br> 执行失败， sql语句是'. $sql .'<br> 失败的原因是：'. $mysqli->error;
        exit;
    }

    $row = $res->num_rows; // 能取到一条数据就返回 true，否则 false
    if($row){ // 用户名密码正确跳转到主页面
        echo "<script>location.href = '../list.php';</script>";
    }else{
        echo "<script>location.href = '../login.html';
                alert('用户名或密码错误 ！');
              </script>";
        exit;
    }

    // update & delete 修改是否影响到了数据库的表，例如删除的 id不存在
    // if( $mysqli->affected_rows >0 ){
        // echo '<br> 真正影响到了数据库的表';
        // 获取刚刚添加数据的那个自增长的id的值
        // echo '<br> id='. $mysqli->insert_id;
    // }else{
    //     echo '<br><mark>操作对数据表没有任何影响</mark>';
    // }


    //释放资源，关闭链接
    $res->free();
    $mysqli->close();
?>











