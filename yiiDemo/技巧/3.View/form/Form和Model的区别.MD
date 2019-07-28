# AcitveForm 数据模型 和 表单模型的区别

* ActiveForm 以数据库字段为原型
* Form可以自定义字段

## 相同点
* 都使用 DAO


## 表单模型Form的特点
* form不映射数据表 所以要在类中声名它的属性
* 不需要为每个表单去写一个 form 或者必须要有一个对应的model

```
Form
	public $id;
	public $title;
	public $content;
	public $label_img;
	public $categoryid;
	public $tags;

```