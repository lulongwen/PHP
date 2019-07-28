# Yii进阶

## 1 Basic应用模板的安装
* composer 安装
* 下载 压缩文件安装
* Yii 参考手册的使用


## Yii 前台页面的动手实践
1. 前台配置
	* Gii创建前台目录下文章的 CRUD
	* config/main.php 全局设置
		* 设置 cookie的验证字符串
	* layouts/main.php 的模板设置

2. 文章列表页设置
	* 用 ListView 展示文章列表
	* etUrl 方法给标题添加链接
	* 添加发表时间，作者，截取文章的描述
	* 设置自定义的面包屑导航

3. 文章详情页
	* 显示文章标签，点击标签跳转相同标签的搜索列表
	* 显示评论，点击跳转文章详情页评论的位置
		* detail.html#comments
	* 添加修改时间