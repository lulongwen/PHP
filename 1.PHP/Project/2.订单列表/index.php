<?php
  header('content-type: text/html;charset=utf-8');

  // 1 链接数据库
  include './mysqli.php';

  // 2 发送 sql语句 获取总条数
  $sql = 'select * from list';
  $res = $mysqli-> query($sql);
  // 获取多少条数据
  $total = $res-> num_rows;


  // 获取当前页
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  // 每页显示的数量
  $pagesize = 20;

  // 计算有多少分页，向上取整
  $pagemax = ceil($total/$pagesize);

  // 分页公式
  $offset = ($page-1) * $pagesize;


  // 3 发送 sql语句 limit 放在最后
  $sql = "SELECT * FROM pms_product
  ORDER BY id desc
  LIMIT $offset, $pagesize";

  // 4 获得资源集，要把资源集转换为数组
  $res = $mysqli-> query($sql);

  if (!$res){
    echo '执行失败，sql语句是：'. $sql .'<br>
        失败的原因是：'. $mysqli->error;
    exit;
  }

  // 定义一个空数组来接收数据
  $arr = array();
  while($row = $res-> fetch_assoc()) {
    $arr[] = $row;
  }
?>
<!doctype html>
<html lang="zh-cmn-hans">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>订单列表</title>
  <link rel="stylesheet" href="ripple.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <section class="main" id="app">
    <header>
      <h1>Purchase Management System</h1>
      <div class="searchbar">
        <input type="text" name="sku" v-model="search.sku" placeholder="输入SKU搜索">
        <input type="text" name="number" v-model="search.number" placeholder="输入商品编码搜索">
        <span class="searchbar-btn">
          <button class="btn ripple" @click="fnSearch">搜索</button>
          <button class="btn ripple error" @click="fnResetSearch">重置</button>
        </span>
      </div>
    </header>

    <p class="create-btn">
      <button class="btn w12" @click="fnCreate" v-show="!create">添加</button>
      <span v-show="create">
        <button class="btn ripple" @click="fnSubmit">提交</button>
        <button class="btn ripple error" @click="fnReset">重置</button>
        <button class="btn gray" @click="fnHidden">隐藏</button>
      </span>
    </p>
    <form class="form" v-show="create" ref="form">
      <p v-for="(item ,i ) of label" :key="`item_${i}`">
        <label><span v-if="item.name === 'number'" class="require">*</span>{{item.label}}</label>
        <input type="text" :name="item.name" v-model="form[item.name]">
      </p>
    </form>
    <table>
      <thead>
      <tr>
        <th class="w5">编号</th>
        <th class="w8">缩略图</th>
        <th class="w13">SKU</th>
        <th class="w16">商品编码</th>
        <th class="w10">采购价￥</th>
        <th class="w10">成本价$</th>
        <th class="w7">重量kg</th>
        <th class="w10">货源链接</th>
        <th class="w20">备注</th>
        <th class="w10">未定义</th>
        <th class="w11">操作</th>
      </tr>
      </thead>
      <tbody>
      <tr v-for="(item, i) of arr" :key="`tr_${i}`">
        <td>{{i+1}}</td>
        <td><img
            v-if="item.avatar"
            width="60"
            :src="item.avatar"></td>
        <td>{{item.sku}}</td>
        <td>{{item.number}}</td>
        <td>{{item.purchase_price}}</td>
        <td>{{item.sell_price}}</td>
        <td>{{item.kg}}</td>
        <td><a
            v-if="item.link"
            target="_blank"
            :href="item.link">点击查看</a></td>
        <td>{{item.remark}}</td>
        <td>{{item.undesc}}</td>
        <td class="tac fz-0">
          <button class="btn ripple small" @click="fnUpdate(item)">修改</button>
          <button class="btn ripple error small" @click="fnDelete(item)">删除</button>
        </td>
      </tr>
      </tbody>
    </table>

    <footer class="pagination" v-show="!hidePagination">
      <a class="btn ripple" href="order.php?page=1">首页</a>
      <a class="btn ripple" href="order.php?page=<?php echo ($page <= 1 ? $page : $page-1);?>">上一页</a>
      <a class="btn ripple" href="order.php?page=<?php echo ($page >= $pagemax ? $pagemax : $page+1);?>">下一页</a>
      <a class="btn ripple" href="order.php?page=<?php echo $pagemax;?>">末页</a>
    </footer>

    <div class="mask" v-show="modal.show">
      <div class="modal">
        <h3>{{modal.title}}</h3>
        <p>{{modal.text}}</p>
        <footer class="close">
          <button class="btn error" @click="fnCancel">取消</button>
          <button class="btn" @click="deleteSubmit(modal.id)">确认</button>
        </footer>
      </div>
    </div>
  </section>

  <script src="vue.min.js"></script>
  <script src="axios.min.js"></script>
  <script>
    var arr = <?php echo json_encode($arr);?>;
    console.log('arr',arr[0])
    const list = [
      {
        label: 'SKU：',
        name: 'sku',
        value: '',

      },
      {
        label: '商品编码：',
        name: 'number',
        value: ''
      },
      {
        label: '采购价￥：',
        name: 'purchase_price',
        value: ''
      },
      {
        label: '成本价$：',
        name: 'sell_price',
        value: ''
      },
      {
        label: '货源链接：',
        name: 'link',
        value: ''
      },
      {
        label: '重量：',
        name: 'kg',
        value: ''
      },
      {
        label: '备注：',
        name: 'remark',
        value: ''
      },
      {
        label: '缩略图：',
        name: 'avatar',
        value: ''
      },
      {
        label: '未定义：',
        name: 'undesc',
        value: ''
      },
    ]

    const vm = new Vue({
      el: '#app',
      data: {
        create: false,
        update: false,
        label: {},
        form: {},
        resetForm: {},
        arr,

        search: {
          sku: '',
          number: '',
        },
        modal: {
          show: false,
          title: '确认删除',
          text: '',
          id: ''
        },
        hidePagination: false
      },
      methods: {
        fnSearch() {
          let {sku='', number=''} = this.search
          if (!sku && !number) return window.alert('请输入SKU 或 商品编码')

          this.hidePagination = true
          axios.post('./search.php', {sku, number})
            .then(res => {
              if (res.status !== 200) return
              this.arr = res.data
            })
            .catch(err => {
              console.log(err)
            })
        },
        fnResetSearch() {
          this.search = {sku: '', number: ''}
          this.arr = arr
          this.hidePagination = false
        },

        fnCreate() {
          this.create = true
          this.update = false
        },
        fnUpdate(item) {
          this.create = this.update = true
          this.form = Object.assign({}, this.form, item)
        },
        fnDelete({id, sku, number}) {
          if (!id) return
          this.modal = Object.assign({}, this.modal, {
            id,
            show: true,
            text: `SKU: ${sku}, 商品编码： ${number}`
          })
        },
        fnSubmit() {
          if (!this.form.number) return window.alert('商品编码不能为空！')

          if (this.create && this.update) return this.updateSubmit()
          this.createSubmit()
        },
        // 新建
        createSubmit() {
          axios.post('./create.php', this.form)
            .then(res => {
              if (res.status !== 200) return
              let obj = Object.assign({id: res.data.id}, this.form)
              // console.log('obj', obj, this.arr)
              this.arr.unshift(obj)
              this.fnReset()
            })
            .catch(err => {
              window.alert('添加失败: ', err)
            })
        },
        // 修改
        updateSubmit() {
          axios.post('./update.php', this.form)
            .then(res => {
              if (res.status !== 200) return
              // 删除原来的数据，然后合并数据
              this.arr = [this.form, ...this.arr.filter(item => item.id !== this.form.id)]
              this.update = false
              this.fnReset()
            })
            .catch(err => {
              window.alert('更新失败: ', err)
            })
        },
        deleteSubmit(id) {
          axios.post('./delete.php', {id})
            .then(res => {
              if (res.status !== 200) return
              this.fnCancel()
              this.arr = this.arr.filter(item => item.id !== id)
            })
            .catch(err => {
              this.fnCancel()
              window.alert('删除失败: ', err)
            })
        },
        fnHidden() {
          this.create = false
          this.fnReset()
        },
        fnReset() {
          this.form = JSON.parse(JSON.stringify(this.resetForm))
        },
        fnCancel() {
          this.modal.show = false
          this.modal.id = ''
        },
        init() {
          let form = {}
          this.label = list.map(({label, name, value}) => {
            form[name] = value
            return {label, name}
          })
          this.form = form
          this.resetForm = JSON.parse(JSON.stringify(this.form))
        }
      },
      mounted() {
        window.addEventListener('keydown', ev=> {
          if (ev.key.toLowerCase() === 'enter') this.fnSearch()
          else if (ev.key.toLowerCase() === 'escape') this.fnResetSearch()
        })
      },
      created() {
        this.init()
      }
    })
  </script>
</body>
</html>