<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/20
   * Time: 15:41
   * description: 对象运算符的连用
   * ->
   */
  
  class Student{
    // 对应的普通属性前面需要有 访问修饰符，否则报错
    // php4版本中，var $director  等价于 public $director
    public $name;
    protected $age;
    private $school;
    
    // 静态属性前面可以有访问修饰符 public & protected & private
    // 如果不写，默认 public
    static $total = 100;
    
    // 构造函数
    public function __construct($name, $age, $school) {
      $this->name = $name;
      $this->age = $age;
      $this->school = $school;
    }
    
    
    // school 提供 get*** & set***
    public function getSchool(){
      return $this->school;
    }
    public function setAddress($school){
      return $this->school = $school;
    }
    
    
    // 静态方法只能访问静态变量
    public static function showTotal(){
      echo '<br> 电影票房如下：';
      echo '<br> sales = '. self::$total * 100;
    }
  }
  
  class School{
    public $name;
    public $address;
    private $my_class;
    
    // 构造函数
    public function __construct($name, $address, $my_class){
      $this->name = $name;
      $this->address = $address;
      $this->my_class = $my_class;
    }
    
    
    // my_class set*** & get***
    public function getMyClass(){
      return $this->my_class;
    }
    public function setMyClass($my_class){
      return $this->my_class = $my_class;
    }
  }
  
  class MyClass{
    protected $name;
    protected $num;
    private $intro;
    
    public function __construct($name, $num, $intro){
      $this->name = $name;
      $this->num = $num;
      $this->intro = $intro;
    }
    
    
    // set*** & get***
    public function getIntro(){
      return $this->intro;
    }
    public function setIntro($intro){
      return $this->intro = $intro;
    }
  }
  
  
  // 1 创建班级对象
  $myclass = new Myclass('PHP2期', '58', 'PHP2期班有58人，来自全国各地的学生');
  echo '<pre>';
  var_dump($myclass);
  
  
  // 2 创建学校对象
  $school = new School('神都太学', '神都天街18号', $myclass);
  echo '<pre>';
  var_dump($school);
  
  // 3 创建学生对象
  $student = new Student('刘秀', 32, $school);
  echo '<pre>';
  var_dump($student);
  
  
  echo '<hr><h2>获取学生的学校： $student->getSchool()</h2>';
  var_dump( $student->getSchool() );
  
  echo '<hr><h2>获取学生的班级： $student->getSchool()->getMyClass</h2>';
  var_dump( $student->getSchool()->getMyClass() );
  
  echo '<hr><h2>获取学生的班级的介绍： $student->getSchool()->getMyClass</h2>';
  var_dump( $student->getSchool()->getMyClass()->getIntro() );
  
  
  // 访问类的属性和方法
  // echo Movie:: $total;
  // echo Movie::showTotal();
  
  
  

  