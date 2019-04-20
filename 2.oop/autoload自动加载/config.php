
<?php
  /** 类名和路径的映射关系数组定义好，就加载不同文件夹下的类
   * 将公共的类名数据配置写入到 config.php中，在需要的时候，引入即可
   *
   * '类名' => '类名的URL';
   *
   * 配置时，要注意路径的正确性
   */
  
  $class_map = array(
    'Tigger' => './control/Tigger.class.php',
    'Pig' => './model/Pig.class.php',
    'Cat' => './Cat.class.php'
  );

?>