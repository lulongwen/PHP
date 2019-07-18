<?php 
	header ("content-type=text/html,charset=utf-8");
	//核心思想：通过传递不同的参数，获取不同的对象
	abstract class Product {
	//1.抽象基类：类中定义抽象一些方法，用以在子类中实现  getName
	//这里采用了面向对象的继承特性，首先声明一个虚拟基类，在基类中指定子类务必实现的方法
	abstract public function getName();
	}
	//2.继承自抽象基类的子类：实现基类中的抽象方法
    class ProductA extends Product {
		public function getName() {
			echo '我是商品A<br>';
		}
	}
    class ProductB {
		public function getName() {
			echo '这是商品B<br>';
		}
	}
	//3.工厂类用来生产不同的对象,用以实例化对象
	////设计工厂类,有一个静态的方法，通过该方法可以获得指定类的对象
	class ProductFactory {
		public static function create($num) {
			switch($num) {
				case 1:
					return new ProductA();
				case 2:
					return new ProductB();
				default:
					return 'error';
			}
		}
	}

	//创建对象 要对象，我们就去找工厂
	//1就是对应的$num
	$objA=ProductFactory::create(1);
	var_dump($objA);	//object(ProductA)#1 (0) { } 
	echo '<hr>';
	$objB=ProductFactory::create(2);
	var_dump($objB);	//object(ProductB)#2 (0) { }




	//单例模式+工厂模式
	class DB_Factory {
			private static $_db;
			private function __clone() {}
			private function __construct(){}
					public static function getInstance() {
					if(! (self::$_db instanceof Driver_DB_Mysql)) {
							self::$_db = new Driver_DB_Mysql();
					}
					return self::$_db;
			}
	}
	//使用
	function foo() {
	$db = DB_Factory::getInstance();
	}





