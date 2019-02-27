
<?php
    header('content-type:text/html; charset=utf-8');
    /** 处理提交请求的思路
     * 1. 接收这个 ID，对 id记录进行删除操作
     * 2. 链接数据库，delete 语句 where id= 这个ID
     */

    // 1 接收表单数据
    $delId = $_GET['page'];

    // 2 对ID 进行验证
    if(empty($delId)){
        echo "<script>
                alert('错误的 ID！');
                location.href='../list.html';
              </script>";
        exit;
    }

    // 3 链接数据库
    $mysqli = new Mysqli('localhost','root','','message',3306);
    $mysqli->set_charset('utf8'); // 设置编码

    // 3.1 成功返回 0, 有错，返回对应的错误号
    if($mysqli->connect_errno){
        die('链接错误，错误信息是Mysql返回的是：'. $mysqli->connect_error);
    }


    // 4 拼接 sql语句，通过 用户名和密码获取当前用户的信息
    $sql = "DELETE FROM `mes_info` WHERE `Id` = '{$delId}'";

    // 5 执行 sql语句, $res 是 mysqli_result 的对象
    $res = $mysqli->query($sql);
    if(!$res){
        echo '<br> 执行失败， sql语句是'. $sql .'<br> 失败的原因是：'. $mysqli->error;
        exit;
    }else{
        // update & delete 修改是否影响到了数据库的表，例如删除的 id不存在
        if( $mysqli->affected_rows >0 ){
            echo "<script>
                alert('真正影响到了数据库的表, 删除成功');
                location.href='../list.php';
               </script>";
        }else{
            echo "<script>
                alert('操作对数据表没有任何影响');
                location.href='../list.php';
               </script>";
        }

    }





    //释放资源，关闭链接
    $res->free();
    $mysqli->close();
?>











