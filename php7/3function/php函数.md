
# php 函数
- 函数的概念
    + 为完成某一功能的程序指令（语句）的集合，就叫函数
    + 函数也称之为 方法
    + 在PHP中，函数分为 自定义函数 & 系统函数
        * 系统函数请查看PHP手册
    + php 是以文件为单位执行的，函数调用不分前后
  
    
- 熟练的自定义函数

- PHP中常用的系统函数
    + PHP函数总共有4000多个，不可能每个都用到
    + 只需要掌握最常用的函数
    
## PHP函数的运行机制
1. 只要代码运行，则都需要调入内存
2. 函数没有作用域链，函数内的变量如果没有 global，不会去外面查找变量

## PHP中页面相互调用的区别
- require() & include()

```$xslt
    require() 和 require_once()
    
    include() 和 include_once()
```


    

## PHP 自定义函数

``` 
    // 函数的基本语法
    function 函数名(形式参数列表){
        代码块 // 方法(函数)主体
        
        return 返回值; // 返回值
    }
    
    1. 参数列表：表示函数的输入
    2. 函数主体： 表示为了实现某一个功能的代码块
    3. 函数可以有返回值，也可以没有
    
    // 函数的相关说明
    1. 函数的参数列表可以是多个，中间用 , 逗号隔开
    2. 函数的参数类型可以是任何类型
        array, integer, float, boolean, string, object, null, 资源类型 resource
    3. 函数的命名跟自定义变量一样，首字母只能使用下划线 _ & A-Z & a-z
    4. 一个自定义函数中的变量是局部的，函数外不生效，除非使用 global $a; $a =90 方式来创建全局变量
        - 函数的局部变量就是： 在函数内部定义，其作用域就在函数内部
        
    5. 使用 global全局变量的时候，可使用在函数外的变量
    
    
    
    
    
    $student = Array('age' => 23, 'name' => 'Jim', 'sex'=> 'boy', 'mary'=> true );
    print_r($student);

    // echo 和 print输出数组报错，因为 echo和print是输出 字符串的
    // echo $student;
     echo count($student);
    
    <?php
        $con = mysql_connect('localhost', 'root','root');
        mysql_query('use mes');
        $sql = 'select * form mes_info';
        $res = mysql_query($sql);

    ?>
    // 1 推荐的写法
    <?php foreach (): ?>
        // code
    <?php endforeach; ?>
    &
    <?php
        foreach($array as $elem):
            // do something
        endforeach;
    ?>


    // 2 不推荐的写法，不好排错
    <?php foreach() { ?>
        // code
    <?php }?>



    // 3
    <?php
        foreach ($variable as $key => $val){
            // code
            echo "";
        }
    ?>

```
    
## 为什么要使用函数
    - 通过案例来说明函数的用途，完成以下需求
    
### 1 oper.php & operFun.php
- 输入2个数，再输入一个运算符( + - * /)，进行运算，得到结果

