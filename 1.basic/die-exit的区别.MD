# PHP die 和 exit的区别

```
  die()和exit() 都是中止脚本执行函数
  
  其实exit和die 这两个名字指向的是同一个函数
  
  die() 是exit()函数的别名


区别
	当传递给 exit和 die函数的值为0时，意味着提前终止脚本的执行，通常用exit()这个名字
	echo "1111"; 
  exit(0);

  当程序出错时，可以给它传递一个字符串，它会原样输出在系统终端上
  通常使用die()这个名字
  
  $fp=fopen("./readme.txt","r") or die("不能打开该文件");
```
