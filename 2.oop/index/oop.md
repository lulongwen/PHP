
[DOC]
# 面向对象的特性

    ```
    1 封装，就是封装对象
    2 继承，就是继承父类
    3 多态，就是可以重写或扩展继承的方法

    $this 是指类的对象实例 $a = new Person(); $a->
    $this 不是静态的属性和方法，$this 和对象关联
    
    self:: 指当前类的静态变量 & 静态方法 static，self 指向类
        self 和类关联
        :: 范围解析符
        静态属性 Person::$num;
        静态方法 Person::getSum();
            静态方法和静态属性也受到 访问修饰符的限制
            
        静态方法的用途：
            单例模式


    PHP和JS是类 C语言
    
    编程就是把思想转换成 代码
    思想 ==========（锻炼 PHP ＆　JS）============>代码 
    
    网站的瓶颈
        1. 网站的带宽，有钱，就买服务器
        2. 数据库，链接原则，能不连接，就不连接
    ```

- [类与对象](1-class.php)
- [对象传递-值传递](2-obj.php)
- [对象传递-引用传递](3-obj.php)
- [成员属性-成员方法](4-method.php)
- [构造函数 __construct](5-construct.php)
- [析构函数 __destruct](6-destruct.php)

- [访问修饰符 protected-private](7-protected-private.php)
- [property_exists](property_exists.php)


### 魔术方法
- [__get & __set](8-get-set.php)
- [__isset & __unset](9-isset-unset.php)
- [__toString](10-toString.php)
- [__clone](11-clone.php)
- [__call](12-call.php)
- [__callStatic](13-callStatic.php)
- [类的自动加载](14-autoloader.php)

- [类的自动加载](14-autoloader.php)
- [类的自动加载](14-autoloader.php)



###静态变量
- [static 静态属性](15-static.php)
- [static 静态方法](16-static-method.php)
- [单例模式](../desiginPattern/singleton.php)



### 面向对象的特点：抽象，封装，继承
- [对象运算符的连用](extends/obj-operator.php)
- [封装](encapsulation/encapsulation.php)
- [extends 继承](extends/extends.php)
    + [继承属性和方法](extends/extends-methods.php)
    + [多继承](extends/extends-multiple.php)
    + [子类调用父类的方法](extends/extends-parent.php)

- [方法的重载 overload __call](overload/overload-method.php)
- [属性的重载 overload __set & __get](overload/overload-setget.php)

- [方法的重写 override](override/override.php)
    + [类型约束](6-destruct.php)

- [多态](17-polymorphism.php)
    + [变量名也可以 new](18-newvar.php)


## 类与对象的关系

    ```
    class 关键字，首字母大写，类名规范是：大驼峰命名法
        - 类名不区分大小写
        
    new 关键字，实例化一个对象
    
    // 类的定义
    class Person{
        public $name;
        public $age;
    }
    
    // new 实例化一个对象，创建对象，等价于 $person = new Person();
    $person = new Person;
    
    // 给对象赋值
    $person->name = '太白';
    
    // 访问对象的属性
    echo $person->age; 
    ```
    
- 类是抽象的，概念的，代表一类事物，比如 人类，毛类，鱼类
    + 对象是具体的，实际的，代表一个具体实物，比如： 张帆，力帆

- 一个类可以创建多个对象
    + 不同的对象标识符 # 是不一样的
    +　系统在创建对象标识符时，是按编号的顺序分配的
    
- 对象是类的实例化，类是对象的模板
    + 对象是什么？
    + 类是什么？
        * 类是一种数据类型
    + 比如：月饼模子，就是一个类，月饼就是一个对象
        


## 成员属性

- 成员属性是我们在类中定义的变量，也叫特征或字段；
    + 成员属性前面可以有访问修饰符 public & protected & private 来控制它的访问范围
        
    + 成员属性是类的一部分，属性初始化的值可以是任意一种数据类型，public $name; 就是成员属性
        * 一般是基本数据类型（整数，字符串等
        * 也可以是符合类型（对象，数组）
        * 可以资源类型
        * 成员属性如果没有赋值，默认 null

## 成员方法（成员函数）

- 成员方法是在类的内部定义的函数
- 使用时，成员方法前面有访问修饰符，默认是 public，修饰符不一样，调用的时候也不一样
    + 其调用原理和规则和普通函数时一样的
    + 成员函数的参数可以是多个，类型可以是任意类型
    + 成员方法如果没有 return，默认返回 null
    + 成员方法不可以直接调用，只能通过对象的实例调用



## 对象的传递方式

- 默认值传递，即值的拷贝，拷贝的是对象标识符
- & 引用传递，2个对象都指向了同一个对象标识符


## 构造函数 __construct
    ```
    // class 类名
    class Person{
    
        // 构造函数
        public function __construct(形参列表){
            // 对成员属性进行初始化
        }
    }
    ```
- 构造函数就是完成对成员属性的初始化，而不是创建对象本身 // 1 是什么？
- 使用构造函数细节 // 2 用的时候要注意什么？
    + 没有返回值，不要有 return，有return也没有作用
    + 一个类中，构造函数有且只能有一个，如果定义多个就会报错
    + 构造函数时系统调用的，程序员不能显式调用
        * 创建一个类时，系统会自动调用该类的构造函数完成对新对象的初始化
        * OOP编程中，需要对成员属性进行初始化
        
    + __construct 是关键字，不能修改， __ 是2个下划线
    + 访问修饰符可以是 public & protected & private, 默认 public
    
    + 如果没有定义构造函数，那么就会有一个默认构造函数，形式如下
        ```默认构造函数
        class Person{
            
            public $name;
            public function __construct(){
                echo '__construct';
            }
        }
        ```
    + PHP4 & PHP5中，可以使用类名作为构造函数，不推荐，因为类名改变后还要去修改
        ```默认构造函数
        class Person{
            
            public $name;
            public function Person(){
                echo '__construct';
            }
        }
        ```


## 析构函数 __destruct
- 析构函数时系统提供的，是在对象销毁前，由系统自动调用的一个函数
- 在析构函数中，程序员可以销毁该对象创建的某些资源
    + 当没有变量指向某个对象时，这个对象就会被销毁，销毁对象前，析构函数会被调用
    + 析构函数不是销毁对象本身，而是在对象销毁前给我们一个机会，
        我们可以及时回收该对象创建的资源，比如数据库链接等

    ```
    class Person{
        public $name;
        public $age;
        
        // 构造函数
        public function __construct($name, $age){
            $this->name = $name;
            $this->age = $age;
        }
        
        // 析构函数
        public function __destruct(){
            echo '<br> __destruct 析构函数被调用';
        }
    }
    ```
    

## PHP程序执行原理 
    ```
    内存中的分类： 代码区，栈区，数据区
    
    1 所有的代码必须加载到内存（内存中的代码区）才能执行
    2 当我们把一个对象赋给另外一个变量时，也是值拷贝，但拷贝的不是数据本身，而是对象标识符的拷贝
  
    ```


## 垃圾回收机制
- PHP内置的一种机制，当一个对象没有任何引用的时候，垃圾回收机制就会启用，销毁这个对象；
    + 当程序退出前，PHP也将启用垃圾回收机制，将对象销毁
    + 当一个对象没有任何引用的指向它的时候，并不是说一定要 $obj = null; 这种操作，比如 $obj = 'abc';
    也是一样的，还可以是 unset($obj);
    
- 什么时候销毁这个对象呢？
    + 内存中有一个计数器，当有引用的时候，就 +1，撤销一个引用的时候就 -1，为 0的时候就会销毁这个对象
    
    
## 魔术函数 Magic Methods
- 魔术方法不能私有，私有就无法调用，必须是 public
- 魔术方法都是由系统提供，我们调用即可
- 所有的魔术方法都以 __ 开头，是2个下划线，自定义函数时，不要以 __ 开头
- 魔术方法是在在满足某个条件时，由系统自动调用
- 魔术方法和访问修饰符关系密切

    ```
    __construct() 构造函数，只能有一个
    
    __destruct() 析构函数，对象销毁前调用，没有参数
    
    
    __call() 访问一个不存在的方法，或方法是protected, private 触发 __call()
            
    __callStatic()
    
    
    __get() 调用不可访问的属性时，系统就会调用 __get()，1个参数
        不可访问的属性指：
        + 该属性不存在
        + 直接访问了 protected & private
    
    __set() 给不可访问的属性直接赋值，系统就会调用 __set()， 2个参数
    
    
    
     __isset() 判断属性是否存在， isset() & empty() 触发 __isset()，1个参数
     
     __unset() 对不可访问的属性进行 unset() 触发 __unset()， 1个参数
    
    
    __toString()  echo 输出对象时 触发 __toString()，没有参数
        + 要返回一个字符串
    
    __clone() 对象克隆前 触发 __clone()
    
 
    __sleep() 串行化的时候用，涉及到序列化
    
    __wakeup() 反串行化的时候用，涉及到序列化
    
    
    __invoke()
    __set_state()
    
    __debuginfo()
    
    ```
    
    
## 类的自动加载


## 静态属性
    ```PHP
    public static $num =200;
    ```


## 静态方法
- 静态方法不能访问 非静态属性

    ```PHP
    public static function getSum(){
  
    }
    ```



## public & protected & private
    ```
    public    公共的，  属性和方法可以继承和访问，内部OK，外部OK；
    protected 受保护的，属性和方法可以继承和访问，内部OK，外部不可以访问
    private   私有的， 属性和方法不能被继承，内部OK，外部不可以调用
    ```

- intasnceof



## 抽象


## 封装
```php
    封装的细节
    - 普通属性定义为 public & protected & private
    - 如果用 var定义，则视为公有，public类型
    - 静态属性可以不指定访问修饰符，默认 public

```


## 继承
1. 不能继承多个类，子类最多只能继承一个父类（指直接继承）
2. 子类可以继承其父类或者超类的 public & protected 修饰符的属性和方法
3. 在创建某个子类对象时，默认情况下会自动调用其父类的构造函数（前提是子类没有构造函数）
    - 如果子类没有构造函数，则子类就会继承父类的构造函数
    - 如果子类有构造函数，就会重写构造函数，不会继承父类的构造函数，称之为方法的重载

4. 如果在子类中需要访问的起父类的方法（成员方法，构造函数，访问修饰符是 public & protected），可以使用
    parent:: 方法名来完成
    如果重写父类的构造方法 推荐 parent::__construct();
    如果访问父类的普通方法 推荐 $this->方法名();
    
5. 如果子类中的方法和父类中的方法相同，这种现象称之为方法的重写



## 多态
- 重载就是多态的一种现象，多态利于代码的维护和扩展


### 方法的重载 overloading
- 通过魔术函数来实现方法的重载
    + __call 重载非静态方法
    + __callStatic 重载静态方法
    
- 就是多个函数名相同，根据参数不同，可以自动调用对应的函数，就叫方法的重载
- 方法的不建议大量使用


### 属性的重载
- 就是通过魔术函数 动态增加属性
    + __set
    + __get
    
    
### 方法的重写 override
- 就是之类的属性或方法 覆盖父类的属性和方法


### 属性的重写



## 抽象类 abstract

    ```
    abstract class A{
        
        abstract public getSum()；
    }
    ```
    
    
## 接口 interface
- [接口的细节](interface/interface2.php)
- [类和接口的区别](interface/interface3.php)
    ```
    继承是什么?
    接口是什么？
        如果你不太明白，先把概念给解释一下这是一种很巧妙的一种方式
    	别人问你 继承类和接口有什么区别，你先不要跟他谈区别！
        你要先跟他谈下什么是继承，什么是接口，已解释，然后再说实现机制，就OK啦
        继承是指，一个类可以把父类的public & protected属性和方法继承下来，可以直接使用
        实现接口是： 我们把一些抽象方法封装在接口里面，当我们要使用时，我们将接口里面的方法实现
    
    区别：
        继承一个类，不需要去实现这些方法， 可以直接用
        实现接口，必须要重新去写这个方法，重新去实现一把

    工作找的好的，一定是思路很清晰，描述很有技巧，学习是其次

    技术的框架演说：
    1 介绍一下这个技术是什么？
    2 使用的注意事项、特点、经验等？

    tranits 相当于一个代码块，使用的时候， use一下，引进来
    ```























