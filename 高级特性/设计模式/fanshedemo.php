<?php
header("Content-type:text/html;charset=UTF-8");
class Person
{
    //这里是对$_allowDynamicAttributes的注释信息
     
    private $_allowDynamicAttributes = false;
 
    //type=primary_autoincrement
    protected $id = 0;
     
    //type=varchar length=255 null 
    protected $name;
     
    //type=text null 
    protected $biography;
 
    public function getId()
    {
         return $this->id;
    }
 
    public function setId($v)
    {
          $this->id = $v;
    }
 
    public function getName()
    {
        return $this->name;
    } 
 
    public function setName($v)
    {
        $this->name = $v;
    }
 
    public function getBiography()
    {
        return $this->biography;
    }
 
    public function setBiography($v)
    {
        $this->biography = $v;
    }
}
 
	$class = new ReflectionClass('Person'); //建立Person这个类的反射类
	$instance = $class->newInstanceArgs();  //相当于实例化Person类
	//var_dump($instance);
	//1 获取属性(Properties):
	echo "<h1>获取属性</h1>";
	$properties = $class->getProperties();
	foreach ($properties as &$property) 
	{
		echo $property->getName()."<BR>";
	}
	//默认情况下，ReflectionClass会取所有的属性，private 和protected的也可以
	//如果只想获取到private属性，就要额外传个参数
	//可用参数列表:
	// $private_properties = $class->getProperties(ReflectionProperty::IS_PRIVATE);
	// 可用参数列表
		//ReflectionProperty::IS_STATIC
		//ReflectionProperty::IS_PUBLIC
		//ReflectionProperty::IS_PROVATE
		//ReflectionProperty::IS_PROECTED
	//如果要同时获取public 和private 属性，就这样写：ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PROTECTED。
 
 
	echo "<h1>获取注释</h1>";
	//获取注释
	foreach($properties as &$property)
	{
		if($property->isProtected())  ////测试该方法是否为protected
		{
			$docblock = $property->getDocComment();
			preg_match('/ type\=([a-z_]*) /', $property->getDocComment(), $matches);  
			echo $matches[1]."<BR><BR>";
	 
		}
	}
 
	//获取类的方法
	//获取方法(methods):通过getMethods()来获取到类的所有methods
	 
	//执行类的方法
	$instance->setBiography(22);
	echo $instance->getBiography(); //执行Person里面的方法getBiography
	 
	//或者
	$ec = $class->getMethod('setName');
	$ec->invoke($instance,'xlc');
	 
	$ec2 = $class->getMethod('getName');
	echo $ec2->invoke($instance);
	 
	?>