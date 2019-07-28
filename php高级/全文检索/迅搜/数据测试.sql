-- 商品分类表
drop table if exists kang_category;
create table kang_category (
  category_id int unsigned auto_increment,
  title varchar(32) not null default '',
  parent_id int unsigned not null default 0,
  sort_number int not null default 0,
  image varchar(255) not null default '', -- 分类图片
  image_thumb varchar(255) not null default '', -- 分类图片缩略图
  -- 前台展示
  is_used boolean not null default 1, -- tinyint(1)
  is_nav tinyint not null default 1, -- 针对顶级分类
  goods_type_id int unsigned not null default 0, -- 商品类型typeID 
  -- SEO优化
  meta_title varchar(255) not null default '',
  meta_keywords varchar(255) not null default '',
  meta_description varchar(1024) not null default '',
  primary key (category_id),
  index (parent_id),
  index (sort_number)
) charset=utf8;


-- 品牌表
create table kang_brand (
  brand_id int unsigned not null auto_increment,
  title varchar(32) not null default '',
  primary key (brand_id)
) charset=utf8;



-- 商品表
drop table if exists kang_goods;
create table kang_goods (
  goods_id int unsigned auto_increment,
  name varchar(64) not null default '',
  image varchar(255) not null default '',
  image_thumb varchar(255) not null default '',
  SKU varchar(16) not null default '', -- 库存单位
  UPC varchar(255) not null default '', -- 通用商品代码
  price decimal(10, 2) not null default 0.0,
  goods_type_id int not null default 0, -- 商品类型typeID
  tax_id int unsigned not null default 0, -- 税类型ID
  quantity int unsigned not null default 0, -- 库存
  minimum int unsigned not null default 1, -- 最小起订数量
  subtract tinyint not null default 1, -- 是否减少库存
  stock_status_id int unsigned not null default 0, -- 库存状态ID
  shipping tinyint not null default 1, -- 是否允许配送
  date_available date not null default '0000-00-00', -- 供货日期
  length int unsigned not null default 0,
  width int unsigned not null default 0,
  height int unsigned not null default 0,
  length_unit_id int unsigned not null default 0, -- 长度单位
  weight int unsigned not null default 0,
  weight_unit_id int unsigned not null default 0, -- 重量的单位
  status tinyint not null default 1, -- 是否可用
  sort_number int not null default 0, -- 排序
  description text, -- 商品描述
  -- SEO优化
  meta_title varchar(255) not null default '',
  meta_keywords varchar(255) not null default '',
  meta_description varchar(1024) not null default '',

  brand_id int unsigned not null default 0, -- 所属品牌ID
  category_id int unsigned not null default 0, -- 所属分类ID

  create_at int not null default 0,
  update_at int not null default 0,

  is_deleted tinyint not null default 0, -- 是否被删除
  primary key (goods_id),
  index (brand_id),
  index (category_id),
  index (tax_id),
  index (stock_status_id),
  index (length_unit_id),
  index (weight_unit_id),
  index (sort_number),
  index (name),
  index (price),
  unique key (UPC)
) charset=utf8;
insert into kang_category values (1, '未分类', 0, -1, '', '', 0, 0, 0, '', '', '');-- 默认分类
insert into kang_category values (2, '手机', 0, 0, '', '', 1, 1, 0, '', '', '');
insert into kang_category values (3, '安卓', 2, 0, '', '', 1, 0, 0, '', '', '');
insert into kang_category values (4, 'iOS', 2, 0, '', '', 1, 0, 0, '', '', '');


insert into kang_brand values (1, '索尼');
insert into kang_brand values (2, '华为');
insert into kang_brand values (3, '苹果');


  insert into kang_goods (name, description, UPC, price, quantity, sort_number, brand_id, category_id, status) values ('Z2', '作为索尼2014年度旗舰手机，索尼Xperia Z2较上一代产品Xperia Z1有了不少升级。屏幕方面，索尼Xperia Z2采用了IPS材质全高清屏幕，尺寸提升至5.2英寸，并采用了“LiveColor LED”显示技术。索尼表示，Xperia Z2的色彩饱和度达到前所未有的程度，屏幕的可视角度比市场上任何设备的可视角度还要很广阔，显示效果甚至 索尼Xperia Z2 索尼Xperia Z2 (7张) 优于iPhone和iPad。外观方面，索尼Xperia Z2与上代产品Xperia Z1相比则没有太大变化，同样采用铝合金框架和双玻璃镜面材质，机身尺寸为146.8x73.3x8.2mm，重163g，有黑色、白色、紫色三种颜色可选。 配置方面，索尼Xperia Z2该机采用5.2英寸1920x1080分辨率IPS屏幕，像素密度为424ppi，搭载最新的高通Snapdragon 801四核处理器，主频达2.3GHz，提供3GB超大内存和16GB存储空间，支持MicroSD卡扩展，配备2070万像素的索尼G镜头和220万像素前置摄像头，内置1/2.3英寸的Exmor RS堆栈式结构传感器，拥有f2.0大光圈和27mm广角，支持4K视频录制，配置3200毫安时（mAh）不可拆卸式电池，运行基于Android 4.4操作系统定制的Xperia界面，支持IP55/58精密防尘防水功能，支持NFC连接，支持TD-LTE/WCDMA/GSM网络等。 此外，索尼Xperia Z2还新增了无线充电、双击唤醒屏幕、手套模式、智能手势等人性化功能，添加了SteadyShot功能，减少用户在拍摄时因手的抖动而引起的成像不清等现象，并加入了S-Front环绕音效和数字降噪技术（配备全新的降噪耳塞，降噪能力达到98%）,在嘈杂的环境下依然可以收听高品质音乐。 作为Xperia Z1的升级版，这款手机搭载了5.2英寸1080p的IPS屏幕，并搭载了索尼顶级电视上才会有的Sony Triluminos Display 特丽魅影原色技术，该技术能在拓展色域的同时，保持颜色的真实自然。2.3GHz主频的骁龙801处理器，3GB的运行内存，装备G镜头2070万像素的堆栈式摄像头以及3200毫安的电池无疑已经达到了当前的顶配。外观上和Xperia Z1还是比较相似。当然同样具备了IP58级别的三防功能', '12345678', 1234, 100, 10, 1, 3, 1);
insert into kang_goods (name, description, UPC, price, quantity, sort_number, brand_id, category_id, status) values ('Z5', '索尼Xperia Z5是由索尼于2015年9月2日在柏林发表的旗舰手机，该机搭载5.2寸屏幕、高通骁龙810八核心处理器、3GB内存和32G存储空间，2300万像素 25mm 索尼G镜头。支持IP65/68防水、防尘功能，配有指纹识别传感器。分为Xperia Z5、Xperia Z5 Compact及Xperia Z5 Premium三款机型发布。[1]  为Xperia Z系列最后一款旗舰，由Xperia X系列替代。[2] 继索尼Xperia Z3+的发热教训后，索尼Xperia Z5将采用双热管+硅脂散热。 该系列获得IFA2015最佳手机奖。', '23456789', 2345, 110, 20, 1, 3, 1);
insert into kang_goods (name, description, UPC, price, quantity, sort_number, brand_id, category_id, status) values ('mate8', '华为Mate8[1-2] 集中了华为最尖端的技术，是华为2015年最旗舰、最高端、最重磅的武器。继承Mate 7大屏DNA,采用6英寸FHD屏幕。[3] 一体化金属外观全面升级，使用52道工艺，线条更硬朗流畅。同时金属机身表面覆盖了2.5D钻石切割玻璃[3] ，金属与玻璃采用基本一致的钻石切割技术，两者结合更完美平滑，刚柔并济，机身更俊朗有品位。搭载的麒麟950处理器。该机支持全新的指纹2.0识别技术，指关节2.0技术。搭载了4000mAh超大容量电池，同时还支持快充技术，充电5分钟通话两小时，更好的解决了用户用电问题。', '34567890', 3456, 120, 20, 2, 3, 1);
  insert into kang_goods (name, description, UPC, price, quantity, sort_number, brand_id, category_id, status) values ('P9', '华为P9是华为2016年推出的首款旗舰新机，延续P系列时尚精致的高端旗舰定位，是P系列首款指纹手机。P9与德国相机品牌徕卡达成深度合作，配置徕卡双摄像头，重新定义手机摄影。P9锁定高端小屏旗舰手机，采用5.2寸2.5D玻璃屏幕，拥有更好握持感和使用体验。机身工艺采用业界首创金属陶瓷效果与雕刻纹理抛光效果。处理器再次升级，首次搭载麒麟955处理器，主频高达2.5GHz。', '45678901', 4567, 130, 20, 2, 3, 1);
  insert into kang_goods (name, description, UPC, price, quantity, sort_number, brand_id, category_id, status) values ('6S', '北京时间2015年9月10日，美国苹果公司发布了iPhone 6s。[1]  iPhone 6s有金色、银色、深空灰色、玫瑰金色。屏幕采用高强度的Ion-X玻璃，处理器采用苹果A9处理器，CPU性能比A8提升70%[2]  ，图形性能提升90%，后置摄像头1200万像素，前置摄像头500万像素。摄像头对焦更加准确，CMOS 为了降噪采用“深槽隔离”技术，支持4K视频摄录。数据连接方面，支持23个频段的LTE网络和2倍速度的WIFI连接。于2015年9月25日中国大陆与海外同步发售。', '56789012', 5678, 140, 20, 3, 3, 1);
  insert into kang_goods (name, description, UPC, price, quantity, sort_number, brand_id, category_id, status) values ('6SPlus', '北京时间2015年9月10日发布iPhone 6S Plus。除了原有的金色，银色，深空灰并推出 玫瑰金（粉色），屏幕采用高强度的Ion-X玻璃，处理器采用A9+M9处理器，CPU性能比A8提升70%，图形性能提升90%，后置摄像头1200万像素，前置摄像头 500万像素。摄像头对焦更加准确，CMOS 为了降噪采用“深槽隔离”技术，支持4K视频摄录。数据连接方面，支持23个频段的LTE网络，和2倍速度的WIFI连接。2015年9月25日发售', '67890123', 6789, 140, 20, 3, 3, 1);



sql

select g.goods_id, g.name, g.description, g.price, g.quantity, b.title brand, c.title category from kang_goods g left join kang_brand b on g.brand_id=b.brand_id left join kang_category c using(category_id); --using(category_id) 相当于 On g.category_id=c.category_id

php sdk/php/util/Indexer.php --project=test --rebuild --source=mysql://root:hellokang@127.0.0.1:3306/php7search --sql="select g.goods_id, g.name, g.description, g.price, g.quantity, b.title brand, c.title category from kang_goods g left join kang_brand b on g.brand_id=b.brand_id left join kang_category c using(category_id)"