<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/11/20
   * Time: 17:36
   * description: 抽象，模拟银行账户抽象
   * 公有属性：
   *  账号号码，密码，余额
   * 公有方法：
   *  存款，取款，查询，转账
   */
  
  class Bank{
    public $number;
    private $pwd;
    private $money;
    
    // 构造函数,$pwd= '123456' 默认值
    public function __construct($number, $pwd= '123456', $money='0.0'){
      $this->number = $number;
      $this->pwd = $pwd;
      $this->money = $money;
    }
    
    // 存款，要输入密码，金额
    public function saveMoney($pwd, $amount){
      // 判断密码输入是否正确
      if( $pwd !== $this->pwd ){
        echo '密码错误';
        return;
      }else if($amount <= 100 ){
        echo '存款金额必须大于100 元';
        return;
      }else{
        $this->money += $amount;
        echo '<h2><mark>存款成功， 存入的金额是： '. $amount .'</mark></h2>';
      }
    }
    
    // 取款，要输入密码，金额
    public function getMoney($pwd, $amount){
      // 判断密码和金额是否正确
      if($pwd !== $this->pwd){
        echo '<p><b>密码不正确</b></p>';
        return;
      }else if( $this->money < $amount ){
        echo '<br> 账户余额不足';
        return;
      }else{
        $this->money -= $amount;
        echo '<h2>取款成功,取款的金额是： '. $amount .'</h2>';
      }
    }
    
    // 查询余额，要输入密码
    public function queryMoney($pwd){
      if($pwd == $this->pwd){
        echo '<br> 您的账号是： '. $this->number .'<br> 余额是： '. $this->money;
      }else
        echo '<br><mark>您输入的密码不正确！</mark>';
    }
  }
  
  $bank = new Bank('1234 5678', '123456', '999999999');
  
  // 查询，要传入密码
  $bank->queryMoney('123456');
  
  
  // 取款，要传入密码，取款金额
  $bank->getMoney('123456', 2999999);
  // 取款后，查询
  $bank->queryMoney('123456');
  
  
  // 存款，要传入密码，取款金额
  $bank->saveMoney('123456', 9999);
  // 存款后，查询
  $bank->queryMoney('123456');