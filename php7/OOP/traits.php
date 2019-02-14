<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/23
   * Time: 14:56
   * description: traits 代码段
   */

  // 定义 traits 代码段
  trait getSum{
    function getSum($n, $n2){
      echo 'trait里面的 getSum()';
      return $n + $n2;
    }

    function getSub($n, $n2){
      return $n - $n2;
    }

    function getMax($n, $n2, $n3){
      return max($n, $n2, $n3);
    }
  }


  class Person{
    function getSum($n, $n2){
      echo 'Person getSum()';
      return $n * $n2;
    }
  }

  class Child extends Person{
    /** 使用 traits
     * 如果父类中有和 trait代码段相同的方法时，那么trait中的代码会覆盖父类中的方法
     * trait中的代码优先级高
     */
    use getSum;
  }

  class Kids extends Person{
    use getSum;
  }

  class Baby extends Person{

  }

  class Goods{
    use getSum;
  }

  $child = new Child();
  echo '<br> '. $child->getSum(60, 30);
  echo '<br> '. $child->getSub(100, 30);

