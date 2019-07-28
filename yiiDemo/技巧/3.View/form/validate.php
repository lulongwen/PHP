<?php

/* Model的 rule验证规则
	rules 验证规则是在 model调用 validate() 时进行调用的
	rules 有 22 种验证规则，常用的有
	* safe  不验证的字段
	* required 必填的字段
	* compare 对比验证
	* double 双精度验
	* email 邮箱
	* in 范围值
	* integer 整数
	* match 正则
	* string 字符串
	* unique 唯一值
	* captcha 验证码

* 更多验证信息
	https://www.yiiframework.com/doc/api/2.0/yii-validators-validator
	

safe  不验证的key 字段
	['key', 'key', 'safe'],
	[['多个key可以是数组', 'key'], 'safe']

required 必填的key 字段
	['key', 'key', 'required', 'message' => '不能为空'],
	[['多个key可以是数组', 'key'], 'required', 'message' => '不能为空'],

compare 对比验证
	['key', 'compare', 'compareValue' => '对比的值', 'message' => '输入不一致'],
	['key', 'compare', 'compareAttribute' => '对比的属性', 'message' => '输入不一致'],

double 双精度验
	['key', 'double', 'min' => '最小值', 'max' => '最大值',
	'tooSamll' => '小于最小值提示', 'tooBig' => '大于最大值提示', message' => '必须是数字'],

email 邮箱
	['key', 'email', 'message' => '邮箱错误'],

in 范围值
	['key', 'in', 'range' => '范围值', 'message' => '超出范围'],

integer 整数
	['key', 'integer', 'message' => '不是整数'],

match 正则
	['key', 'in', 'pattern' => '/正则/', 'message' => '匹配错误'],

string 字符串
	['key', 'string', 'min' => '最小长度', 'max' => '最大长度',
	'tooShort' => '小于最小长度提示信息', 'tooLong' => '超出最大长度提示'],

unique 唯一值
	['key', 'unique', 'message' => '已经存在'],

captcha 验证码
	['key', 'captcha', 'captchaAction' => 'login/captcha', 'message' => '验证码'],


*/



class Post extends ActiveRecord
{
	
	public function rules() {
		return [
			[],
			[],
		];
	}
}