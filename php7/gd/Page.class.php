<?php
  /**
   * Created by PhpStorm.
   * User: 卢珑文
   * Date: 2017/12/1
   * Time: 13:19
   * description: Page.class.php 分页
   */

  class Page {
    // 成员属性
    private $_page_total =100; // 总的记录数
    private $_page_size = 9; // 每页显示多少条数据
    private $_page_current = 5; // 当前是第几页
    private $_page_url = ''; // 跳转的页面地址

    // private function __construct($total, $size, $current, $url){
    //   $this->_page_total = $total;
    //   $this->_page_size = $size;
    //   $this->_page_current = $current;
    //   $this->_page_url = $url;
    // }

    // __get & __set 获取值和赋值
    public function __get($attr){
      if( property_exists($this, $attr) )
        return $this->$attr;
    }
    public function __set($attr, $val){
      if( property_exists($this, $attr) )
        return $this->$attr = $val;
    }

    // 提供外部方法
    public function _createPage(){
      // 定义首页的导航按钮
      $first = 1;
      $active = $this->_page_current == 1 ? 'active' : '';
      $url = $this->_page_url .'?page=';
      // 多个个分页
      $_page_count = ceil( $this->_page_total / $this->_page_size );

      // 首页
      $page = <<<HTML
        <nav aria-label="page navigation" class="text-right">
        <span>共 {$_page_count} 页</span>
        <ul class="pagination justify-content-end">
          <li class="page-item $active"><a href="{$url}{$first}" class="page-link">首页</a></li>
HTML;

      // 中间的页面
      for($i= $this->_page_current-3; $i<= $this->_page_current+3; $i++){
        if($i <2 || $i> $_page_count-1) continue;

        $active = $this->_page_current == $i ? 'active' : '';

        $page .= <<<HTML
          <li class="page-item $active"><a href="$url$i" class="page-link">$i</a></li>
HTML;
      }

      // 末页
      $last = $this->_page_current == $_page_count ? 'active' : '';
      $page .= <<<HTML
          <li class="page-item $last"><a href="$url$_page_count" class="page-link">尾页</a></li>
          </ul></nav>
HTML;

      return $page;
    }
  }











