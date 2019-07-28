# XDebug 配置

* 通过echo、print_r、var_dump函数进行代码调试，但很难准确发现PHP性能方面的问题
* Xdebug是一个非常有用的PHP调试工具



##  1 下载 XDebug
* [下载 XDebug对应的PHP版本](https://xdebug.org/download.php)
* 不清楚安装的PHP版本，可通过 phpinfo()查看
  * 带"ts"是线程安全
  * "nts"的没有标示，如果是nts的要下载没标示的，下载下来的文件名其实是有标示的。
    
* 将下载的 php_xdebug-2.5.5-7.1-vc14.dll复制到PHP安装目录下的ext目录
* 我的是 C:/xampp/php/ext，ext目录专门用来存放PHP扩展库DLL文件。
  ```
  C:/xampp/php/ext/php_xdebug-2.5.5-7.1-vc14.dll
  ```

  

## 2 配置 php.ini
* 默认Xdebug的PHP函数自动跟踪(auto_trace)功能、分析器功能并没有开启，所以要开启
* 创建Xdebug 自动跟踪及分析输出文件的存放目录
  ```
  [Xdebug]
  ;指定Xdebug扩展文件的绝对路径
  zend_extension="C:/xampp/php/ext/php_xdebug-2.5.5-7.1-vc14.dll"
  ;启用性能检测分析
  xdebug.profiler_enable=on
  ;启用代码自动跟踪
  xdebug.auto_trace=on
  ;允许收集传递给函数的参数变量
  xdebug.collect_params=on
  ;允许收集函数调用的返回值
  xdebug.collect_return=on
  ;指定堆栈跟踪文件的存放目录
  xdebug.trace_output_dir="C:/xampp/php/debug"
  ;指定性能分析文件的存放目录
  xdebug.profiler_output_dir="C:/xampp/php/debug"
  xdebug.profiler_output_name = cachegrind.out.%t.%p
  ```
    

## 3 重启Apache服务器，通过phpinfo()函数，可以看到