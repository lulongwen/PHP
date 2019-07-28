# PHP 设计模式
* 设计模式是PHP面向对象的最佳实战
* [设计模式参考](https://segmentfault.com/a/1190000007797208)

exit & die & return 的区别
https://www.cnblogs.com/lxwphp/p/9144054.html

## 1 创建型模式
* 单例模式
* 工厂模式
* 抽象工厂模式
* 原型模式
* 建造者模式


### 1.1 Singleton Pattern 单例模式
* 确保一个类只有一个实例存在，必须自己创建对象，给其他对象提供这个实例；
    + 一旦创建，就会一直存在于内存中

* 为防止对单例模式的 clone，提供一个 private 的 __clone() 空函数
* 应用场景：数据库类设计
  * 只连接一次数据库，防止打开多个数据库链接

### 1.2 Factory Pattern 工厂模式
* 定义一个用于创建对象的接口，让子类决定实例化那一个类，工厂方法是一个类的延迟到其子类


### 1.3 Abstract Factory Pattern 抽象工厂模式


### 1.4 Prototype Pattern 原型模式


### 1.5 Builder Pattern 建造者模式


#Decorator - 装饰器模式
1.在不改变已有对象,添加新功能

2.使用子类继承会导致子类过多

3.装饰器模式,可以提供对对象内容的非侵入式修改

#Singleton - 单例模式
1.避免大量的new

2.可以在类中设置钩子,输出日志,避免var_dump或echo
 
###实现方式

1.私有化一个属性存放唯一的实例

2.私有化构造器,私有化克隆方法,来创建并至只创建一个实例

3.公有化静态方法,向系统提供实例

#Factor- 工厂模式

1.可以将对象从new 一个对象变成调用工厂方法生产.

2.通过今天方法在类内部实现实例化.

#Builder - 建造者模式
1.对象的声场需要复杂的初始化,使用该模式可以把初始化工作封装起来

2.对象的生成时可根据初始化的顺序或数据不同,而生成不同的角色

#Prototype - 原型模式

1.多个类似的大对象,直接通过new,开销大

2.原型模式通过clone 创建新的对象


***


## 2 结构行模式
* 桥梁模式
* 亨元模式
* 外观模式
* 适配器模式
* 装饰器模式
* 组合模式
* 代理模式
* 过滤器模式


### 2.1 Bridge Pattern 桥梁模式


### 2.2 Flyweight Pattern 亨元模式


### 2.3 Facade Pattern 外观模式


### 2.4 Adapter Pattern 适配器模式


### 2.5 Decorator Pattern 装饰器模式


### 2.6 Composite Pattern 组合模式


### 2.7 Proxy Pattern 代理模式


### 2.8 过滤器模式


***

## 3 行为型模式
* 模板模式
* 策略模式
* 状态模式
* 观察者模式
* 责任链模式
* 访问者模式
* 解释器模式
* 备忘录模式
* 命令模式
* 迭代器模式
* 中介者器模式
* 空对象模式


### 3.1 Template Method Pattern 模板模式


### 3.2 Strategy Pattern 策略模式


### 3.3 状态模式


### 3.4 Observer Pattern 观察者模式


### 3.5 责任链模式


### 3.6 Visitor Pattern 访问者模式


### 3.7 Interpreter Pattern 解释器模式


### 3.8 Memento Pattern 备忘录模式


### 3.9 命令模式


### 3.10 Iterator Pattern 迭代器模式


### 3.11 Mediator Pattern 中介者模式


### 3.12 空对象模式

