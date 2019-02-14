
<?php
  header('content-type:text/html;charset=utf-8');

  class Book{
    public $bookname;
    public $author;
    protected $price;
    private $number;

    public function __construct($bookname, $author, $price){
      $this->bookname = $bookname;
      $this->author = $author;
      $this->price = $price;
    }

    public function setPrice($price){
      if(is_numeric($price) && $price >0.0){
        $this->price = $price;
      }else {
        echo '<br>价格格式错误！';
      }
    }

    public function getPrice(){
      return $this->price;
    }
  }


  // 实例化一个对象
  $book = new Book('镜花缘', '李太白', 59.89);

  // 获取价格
  echo '<br>书的价格是： '. $book->getPrice();

  // 设置价格
  $book->setPrice(88.69);

  echo '<br >更新书的价格是： '. $book->getPrice();

  echo '<pre>';
  var_dump($book);

?>
