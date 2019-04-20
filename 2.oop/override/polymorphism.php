<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/21
   * Time: 16:29
   * description: 多态
   */
  
  // 创建动物类
  class Animal{
    public $name;
    
    public function __construct($name){
      $this->name = $name;
    }
  }
  
  class Cat extends Animal{
    public function say(){
      echo '<br>Cat，我是一只 '. $this->name;
    }
  }
  
  class Dog extends Animal{
    public function say(){
      echo '<br>Dog，我是一只 '. $this->name;
    }
  }
  
  class Sheep extends Animal{
    public function say(){
      echo '<br>Sheep，我是一只 '. $this->name;
    }
  }
  
  
  
  // 创建食物
  class Food{
    public $name;
    public function __construct($name){
      $this->name = $name;
    }
  }
  
  class Fish extends Food{
    public function say(){
      echo 'Fish say() '. $this->name .'<hr>';
    }
  }
  
  class Bone extends Food{
    public function say(){
      echo 'Bone say() '. $this->name .'<hr>';
    }
  }
  
  class Grass extends Food{
    public function say(){
      echo 'Grass say()'. $this->name .'<hr>';
    }
  }
  
  
  class Eating{
    public function feed(Animal $animal, Food $food){
      $animal->say();
      echo ' 喜欢吃 ';
      $food->say();
    }
  }
  
  
  // 创建动物
  $cat  = new Cat('猫猫');
  $dog  = new Dog('小狗');
  $sheep  = new Sheep('洋洋');
  
  
  // 创建食物
  $fish = new Fish('鲤鱼');
  $bone = new Bone('排骨');
  $grass = new Grass('青青草');
  
  // Eating 对象
  $eat = new Eating;
  // dog
  $eat->feed($dog, $bone);
  // cat
  $eat->feed($cat, $fish);
  // sheep
  $eat->feed($sheep, $grass);
