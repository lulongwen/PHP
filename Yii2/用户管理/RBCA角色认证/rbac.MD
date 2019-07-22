# Yii RBAC 基于角色的权限控制
* Role-Based Access Control
* 铁打的营盘，流水的兵
  * 角色就是营盘，角色就是职位，职位是稳定的，不会经常变化
	* 人员就经常流动，流动到那个职位，就赋予他那个角色


* yii RBAC参考资料
```
	https://blog.csdn.net/qq_36172443/article/details/80341808
	https://www.yiichina.com/doc/api/2.0/yii-rbac-dbmanager
```


## 后台登陆
* 复制前台的 SignupForm.php 到后台models 目录
* 重命名为 AdminSignupForm.php 进行修改



## Yii RBAC
* 控制台命令
```
rbac
	./yii migrate --migrationPath=@yii/rbac/migrations/

console/RbacController
  ./yii rbac/init

rbac表之间的关系
  auth_assignment.sql 给用户分配角色的表

  auth_item.sql 存放角色和权限的表

  auth_item_child.sql 体现角色和权限的树树形关系表

  auth_assignment 和 auth_item 关联，要分别作模型类关联

```


