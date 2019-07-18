<?php 
	header ("content-type=text/html,charset=utf-8");
	//抽象工厂  
	//声明一个创建抽象产品对象的接口。通常以接口或抽象类实现，所有的具体工厂类必须实现这个接口或继承这个类。
	interface AnimalFactory { 
		public function createCat();  
		public function createDog(); 
	}  

	//具体工厂  BlackAnimalFactory
	//实现创建产品对象的操作。客户端直接调用这个角色创建产品的实例。这个角色包含有选择合适的产品对象的逻辑。通常使用具体类实现。
	class BlackAnimalFactory implements AnimalFactory {  
		function createCat(){  
			return new BlackCat();  
		} 
		function createDog(){  
			return new BlackDog();    
		}  
	}  
    //具体工厂  WhiteAnimalFactory
	class WhiteAnimalFactory implements AnimalFactory {  
		function createCat(){  
			return new WhiteCat();  
		}   
		function createDog(){  
			return new WhiteDog();  
		}  
	}  

	//抽象产品   
	//声明一类产品的接口。它是工厂方法模式所创建的对象的父类，或它们共同拥有的接口。
	interface Cat {  
		function Voice();  
	} 
	interface Dog {  
		function Voice();     
	}  

	//具体产品  
	//实现抽象产品角色所定义的接口，定义一个将被相应的具体工厂创建的产品对象。其内部包含了应用程序的业务逻辑
	class BlackCat implements Cat {  
		  
		function Voice(){ 
			echo '<br>';
			echo '黑猫喵喵……';  
		}  
	}  
	  
	class WhiteCat implements Cat {  
		  
		function Voice(){  
			echo '<br>';
			echo '白猫喵喵……';  
		}  
	}  

	class BlackDog implements Dog {  
      
    function Voice(){  
		echo '<br>';
        echo '黑狗汪汪……';        
		}  
	}  
  
	class WhiteDog implements Dog {  
		  
		function Voice(){ 
			echo '<br>';
			echo '白狗汪汪……';        
		}  
	}  

    //调用  
	class Client {  
		public static function main() {  
			self::run(new BlackAnimalFactory());  
			self::run(new WhiteAnimalFactory());  
		}  
		  
		public static function run(AnimalFactory $AnimalFactory){  
			$cat = $AnimalFactory->createCat();  
			$cat->Voice();  
			  
			$dog = $AnimalFactory->createDog();  
			$dog->Voice();  
		}  
	}  
	Client::main();  
	?>  
  