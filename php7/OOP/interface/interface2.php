<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/22
   * Time: 11:10
   * description: interface 接口
   * 接口细节：
   * 1. 接口不能被实例化， 不能有 new
   * 2. 接口中所有的方法，都不能实现，即不能有方法体 {}
   * 3. 一个类可以实现多个接口，则需要把实现的接口的所有方法都实现
   * 4. 一个接口中，可以有属性，但必须是常量
   *
   * 5. 接口的方法都必须是 public，默认就是public
   * 6. 一个接口可以去继承其它的接口，可以多继承，中间使用 逗号隔开
   * 7. 接口之间是继承关系，接口可以继承接口
   */


  // 定义一个接口，定义规范/方法
  interface iPerson {
    // 写上方法的声明
    public function say();
    public function like();
  }

  // 再定义一个接口
  interface iFruit{
    const NAME = 'banner';
    public function eat();
  }


  // 2 使用接口，要把实现的接口的所有方法都实现
  class Child implements iPerson, iFruit {
    public function say() {
      echo '<br> say() 小学生上三年级了';
    }

    public function like(){
      echo '<br>like() 小学生喜欢学习';
    }

    public function eat(){
      echo '<h3>eat() 小学生喜欢吃香蕉</h3>';
    }
  }

  $p1 = new Child();
  $p1->say();
  $p1->like();




  // 接口之间是继承关系，使用接口要把接口的所有方法都实现
  interface iA{ }
  interface iB{ }

  // 接口继承接口
  interface iC extends iA, iB{ }



  // 实现接口
  class Baby implements iPerson{
    public function say() {
      echo '<hr><br>Baby say() 啦啦啦';
    }

    public function like(){
      echo '<br>like() Baby喜欢游戏';
    }
  }

  class Student implements iPerson{
    public function say() {
      echo '<hr><br>我是高中生 say()';
    }

    public function like(){
      echo '<br>like() 高中生喜欢读历史';
    }
  }

  // 多态，接口体现多态
  class Study{
    public function work($iPerson){
      $iPerson->say();
      echo '<p><mark>iPerson 接口工作</mark></p>';
      $iPerson->like();
    }
  }

  $baby = new Baby();
  $baby->say();
  $baby->like();

  $student = new Student();
  $student->say();
  $student->like();


  // 一个实现接口的对象，是不是接口的实例
  $study = new Study();
  $study->work($baby);
  $study->work($student);



