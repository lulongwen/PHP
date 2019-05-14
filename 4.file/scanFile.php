<?php
header('Content-type:text/html;charset=utf-8');
//预格式化数组
function FP($arr){
echo '<pre>';print_r($arr);echo '</pre>';}
//转码
function gbk($str){return iconv('utf-8','gbk',$str);}
function utf8($str){return iconv('gbk','utf-8',$str);}
//路径格式化(替换双斜线为单斜线)
function path_formate($str){
	return str_replace('\\\\','\\',$str);
}
//默认获得文件修改时间
function filetime($way,$char='m'){
	date_default_timezone_set('PRC');
	switch($char){
		case 'c':$localtime = date('Y-m-d H:i:s',filectime($way));
		break;
		case 'm':$localtime = date('Y-m-d H:i:s',filemtime($way));
		break;
		case 'a':$localtime = date('Y-m-d H:i:s',fileatime($way));
		break;
	}
	return $localtime;
}
function f_dirname($f_path){
	return substr($f_path,0,strrpos($f_path,'\\'));
}
//判断后缀类型
function suffixtype($f_path){
	$info = pathinfo($f_path);
	$f_type = 'file';
	switch(strtolower(@$info["extension"])){
		case 'jpg':case 'jpeg':case 'gif':
		case 'png':case 'bmp':$f_type = 'image';break;
		case 'pl':case 'c':case 'cpp':case 'log':case 'asp':case 'php':case 'jsp':case 'txt':case 'xml':case 'html':case 'htm':case 'phtml':case 'jhtml':case 'java':case 'cfg':case 'ini':
		case 'text':case 'bat':$f_type = 'text';break;
	}
	return $f_type;
}
//判断路径是文件还是目录
function f_type($f_path){
	return is_dir($f_path)?'dir':suffixtype($f_path);
}
//字节大小格式化
function size_formate($byte){
	if($byte>1073741824)//1024<<20
		$size = round(($byte/1073741824),2).'GB';
	else if($byte>1048576)//1024<<10
		$size = round(($byte/1048576),2).'MB';
	else if($byte>1024)
		$size = round(($byte/1024),2).'KB';
	else $size = $byte.'B';
	return $size;
}
//计算文件或目录字节大小
function bytesize_calc($f_path){
	if(!is_dir($f_path)){
		return sprintf("%u", filesize($f_path));}
	$bytesize = 0;
	$f_arr = scandir($f_path);
	$size = count($f_arr);
	for($i=0;$i<$size;$i++){
		if('.'==$f_arr[$i]||'..'==$f_arr[$i])continue;
		$file_or_dir = $f_path.'/'.$f_arr[$i];
		$bytesize += bytesize_calc($file_or_dir);
	}
	return $bytesize;
}
//获得文件大小
function f_size($f_path){
	return size_formate(bytesize_calc($f_path));
}
$title=<<<EOF
<div class='title'>文件探测器(FileScanner)&nbsp;v2.8&nbsp;作者:PHPkiller</div>
EOF;
$fn='f28.php';//外部文件名
function uploadfile($curdir){
	$upret='';
	switch(@$_FILES['upfile']['error']){
		case 0:$upret='上传成功';break;
		case 1:$upret='大小超过上传约定';break;
		case 2:$upret='大小超过HTML表单限制';break;
		case 3:$upret='只有部分被上传';break;
		case 4:$upret='没有文件被上传';break;
		case 6:$upret='找不到临时文件夹';break;
		case 7:$upret='写入失败';break;
	}
	if(@$_FILES['upfile']['error']>0){
		return $upret;}
	$upfile=@$_FILES['upfile']['tmp_name'];
	if(is_uploaded_file($upfile)){
		$destfile=$curdir.'/'.@$_FILES['upfile']['name'];
		if(!move_uploaded_file($upfile,gbk($destfile))){
			$upret='文件移动失败!';
		}else $upret='上传成功!';
	}else{$upret='非POST上传!';}
	return $upret;
}
//斜线处理
function bias_deal($way){
	$dir =dirname(utf8($way));
	if(substr($dir,-1)=='\\'){$dir = substr($dir,0,2);}
	return urlencode(gbk($dir));
}
//对搜索结果返回json数据
function json_handler($path,$file_name){
	$file_name=utf8($file_name);
	$loca_dir=utf8(str_replace('\\','/',f_dirname($path)));
	$filesize =f_size($path);
	$filetime=filetime($path);
	$f_type = f_type($path);
	$p_utf8 = urlencode($path);
	$f_op = '';
	switch($f_type){
		case 'image':
			$f_op = '<span href="#" onmouseover="sidesame(this)" onmouseout="recover(this)" onclick="ajax_view(this,"'.$p_utf8.'");">预览</span>&nbsp;/&nbsp;';
			break;
		case 'text':
			$f_op = '<a href="#" onclick="ajax_edit("'.$p_utf8.'");">编辑</a>&nbsp;/&nbsp;';
			break;
	}
	$f_op .= '<a href="#" onclick="ajax_del(this,"'.$p_utf8.'");">删除</a>&nbsp;/';
	$f_op .= '&nbsp;<a href="?op=dnd&way='.$p_utf8.'">下载</a></td>';
	$f_info="{f_name:'$file_name',loca_dir:'$loca_dir',f_size:'$filesize',f_time:'$filetime',f_op:'$f_op'}";
	return $f_info.',';
}
//回调函数:正则查找
function preg_find($path,$reg){
	$file_name = basename($path);
	if(preg_match($reg,$file_name)){
		return json_handler($path,$file_name);
	}
	return '';
}
//回调函数:位置查找
function pos_find($path,$key){
	$file_name = basename($path);
	if(strpos($file_name,$key)!==false){
		return json_handler($path,$file_name);
	}
	return '';
}
//目录深度搜索
function search_file($dir,$reg_or_key,$callback)
{
	$dir = gbk($dir);
	if(!is_dir($dir)){
		return $callback($dir,$reg_or_key);
	}
	$f_info_all='';
	$lists = scandir($dir);
	$len = count($lists);
	for($i=0;$i<$len;$i++){
		if('.'==$lists[$i]||'..'==$lists[$i])continue;
		$file_or_dir = utf8($dir.'\\'.$lists[$i]);
		$f_info_all.=search_file($file_or_dir,$reg_or_key,$callback);
	}
	return $f_info_all;
}

/******以下为根据op参数进行相应的操作逻辑**********************/
//类似百度谷歌搜索的建议提示操作
if(!empty($_GET['op']) && $_GET['op']=='query'){
	if(empty($_GET['s_key']))exit();
	$data_arr=array('*.avi','*.jpg','*.gif','*.mp3','*.php','*.txt','*.htm','*.html','*.rmvb','*.wav','avi','mp3','php','gif','jpg','bmp','txt','.avi','.jpg','.gif','.mp3','.php','.txt','.htm','.html','.rmvb','.wav');
	$ret='';
	$key = $_GET['s_key'];
	//$key = utf8($_GET['s_key']);//若关键字中有中文,需要转码
	foreach($data_arr as $data){
		if(($pos =strpos($data,$key))!==false && 0==$pos){
			$ret.=$data.'|';
		}
	}
	echo $ret;
	exit();
}
//删除操作
if(!empty($_GET['op']) && $_GET['op']=='del'){
	if(empty($_GET['way']))exit();
	$way = path_formate($_GET['way']);
	if(!empty($_GET['flag']) && $_GET['flag']=='ajax_del'){
		echo unlink($way)?'1':'0';//echo '1';
		exit();
	}
	if(is_dir($way))
		$ifsucc = rmdir($way)?'成功!':'失败!';
	else
		$ifsucc = unlink($way)?'成功!':'失败!';
	$dirname = bias_deal($way);
	echo '<script>javascript:alert("删除'.$ifsucc.'");location.href="?dir='.$dirname.'"</script>';
	return;
}//下载操作
else if(!empty($_GET['op']) && $_GET['op']=='dnd'){
	if(empty($_GET['way']))exit();
	$file_path = $_GET['way'];
	$file_size =filesize($file_path);
	header('Content-type:application/octet-stream');
	header('Accept-Ranges:bytes');
	header('Accept-Length:'.$file_size);
	header('Content-Disposition:attachment;filename='.basename($file_path));
	readfile($file_path);
	return;
}//预览操作
else if(!empty($_GET['op']) && $_GET['op']=='view'){
	if(empty($_GET['way']))exit();
	//$file_path = $_GET['way'];
	if(!empty($_GET['flag']) && $_GET['flag']=='ajax_view'){
		file_put_contents('tmp.png',file_get_contents($_GET['way']));
		echo 'tmp.png';
		exit();
	}
	header('content-type:image/png');
	echo file_get_contents($_GET['way']);
	exit;
}//编辑操作
else if(!empty($_GET['op']) && $_GET['op']=='edt'){
	if(empty($_GET['way']))exit();
	$way = path_formate($_GET['way']);
	echo utf8($way).'&nbsp;内容：若以下内容出现乱码,请点击';
	if(!empty($_GET['flag']) && $_GET['flag']=='ajax_edt'){
		echo '<a href="#" onclick="ajax_fixcode(\''.urlencode($way).'\')">修正乱码</a>试试!&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		if(is_writable($way)){
		echo '<input type="button" onclick="ajax_save(\''.urlencode($way).'\')" value="保存">&nbsp;';}
		else echo '此文件不可写!';
		echo '<a href="#" onclick="ajax_back()" >返回</a>';
		echo '<textarea id="f_ctx" rows="30" cols="100">';
		if(!empty($_GET['cd']) &&$_GET['cd']='revise')
		echo htmlspecialchars(utf8(file_get_contents($way)));
		else echo htmlspecialchars(file_get_contents($way));
		echo '</textarea>';
		exit();
	}
	echo '<a href="?op=edt&way='.urlencode($way).'&cd=revise">修正乱码</a>试试!<br/>';
	echo '<pre>';
	echo '<form action="?op=save&way='.urlencode($way).'" method="post"><textarea name="f_ctx" rows="30" cols="100">';
	if(!empty($_GET['cd']) &&$_GET['cd']='revise')
		echo htmlspecialchars(utf8(file_get_contents($way)));
	else echo htmlspecialchars(file_get_contents($way));
	echo '</textarea>';
	echo '</pre>';
	$dirname = bias_deal($way);
	if(is_writable($way)){
	echo '<input type="submit" value="保存">&nbsp;';}
	else echo '此文件不可写!';
	echo '<a href="?dir='.$dirname.'">返回</a></form>';
	exit();
}//保存操作
else if(!empty($_GET['op']) && $_GET['op']=='save'){
	if(empty($_GET['way']))exit();
	$way = path_formate($_GET['way']);
	$f_ctx = get_magic_quotes_gpc()?stripslashes($_POST['f_ctx']):$_POST['f_ctx'];
	if(!empty($_GET['flag']) && $_GET['flag']=='ajax_save'){
		echo file_put_contents($way,$f_ctx)?'保存成功!':'保存失败!';
		exit();
	}
	$ifsucc = file_put_contents($way,$f_ctx)?'成功!':'失败!';
	$dirname = bias_deal($way);
	echo '<script>javascript:alert(\'保存'.$ifsucc.'\');location.href="?dir='.$dirname.'";</script>';
	exit();
}//上传操作
else if(!empty($_GET['op']) && $_GET['op']=='up'){
	if(empty($_GET['dir']))exit();
	$curdir =path_formate($_GET['dir']);
	if(!empty($_FILES)){//echo 'sss';
		echo '<script>javascript:alert(\''.uploadfile($curdir).'\');location.href="?dir='.urlencode($curdir).'";</script>';
	}
	exit();
}//计算目录大小ajax
else if(!empty($_GET['op']) && $_GET['op']=='dirsize'){
	if(empty($_GET['calcdir']))exit();
	echo f_size($_GET['calcdir']);exit();
}//文件搜索ajax
else if(!empty($_GET['op']) && $_GET['op']=='filesearch'){
	if(empty($_GET['curdir']))exit();
	if(empty($_GET['seach_key']))exit();
	$s_key = trim($_GET['seach_key']);
	if(''==$s_key)exit();
	$curdir =path_formate($_GET['curdir']);
	$pos = strpos($s_key,'*');
	if($pos!==false){
		switch($pos){
			case 0:
				$s_key = substr($s_key,1);
				$s_key = preg_replace('/(\W)/i','\\\${1}',$s_key);
				$pattern ='/\w*'.$s_key.'$/i';
				break;
			case (strlen($s_key)-1):
				$s_key = substr($s_key,0,-1);
				$s_key = preg_replace('/(\W)/i','\\\${1}',$s_key);
				$pattern ='/^'.$s_key.'\w*/i';
				break;
			default:
				$key1 = substr($s_key,0,$pos);
				$key1 = preg_replace('/(\W)/i','\\\${1}',$key1);
				$key2 = substr($s_key,$pos+1);
				$key2 = preg_replace('/(\W)/i','\\\${1}',$key2);
				$pattern ='/^'.$key1.'.*'.$key2.'$/i';
				break;
		}
		$f_info_all= search_file($curdir,$pattern,'preg_find');
	}else{
		try{
		$f_info_all= search_file($curdir,$s_key,'pos_find');
		} catch (Exception $e) {
			file_put_contents('search_error.log',$e);
		}
	}
	echo (''==$f_info_all)?'empty':$f_info_all;
	exit();
}//新建文件操作
else if(!empty($_GET['op']) && $_GET['op']=='newfile'){
	if(empty($_GET['dir']))exit();
	$dir = path_formate($_GET['dir']);
	if(!empty($_GET['file'])){
		$file = $dir.'\\'.gbk($_GET['file']);
		$ifsucc = touch($file)?'成功!':'失败!';
		echo '<script>javascript:alert(\'创建'.$ifsucc.'\');location.href="?dir='.urlencode($dir).'";</script>';
		return;
	}
	exit();
}//新建目录操作
else if(!empty($_GET['op']) && $_GET['op']=='newdir'){
	if(empty($_GET['dir']))exit();
	$dir = path_formate($_GET['dir']);
	if(!empty($_GET['dirname'])){
		$dirname = $dir.'\\'.gbk($_GET['dirname']);
		$ifsucc = mkdir($dirname)?'成功!':'失败!';
		echo '<script>javascript:alert(\'创建'.$ifsucc.'\');location.href="?dir='.urlencode($dir).'";</script>';
		return;
	}
	exit();
}//其他信息
else if(!empty($_GET['op']) && $_GET['op']=='other'){
	if(empty($_GET['dir']))exit();
	$os = php_uname();
	$s_soft = $_SERVER['SERVER_SOFTWARE'];
	$php_ini = PHP_CONFIG_FILE_PATH;
	$doc_root = $_SERVER['DOCUMENT_ROOT'];
	$s_addr=$_SERVER['SERVER_ADDR'].':'.$_SERVER["SERVER_PORT"];
	$c_addr=$_SERVER['REMOTE_ADDR'].':'.$_SERVER["REMOTE_PORT"];
	$auf_cfg = ini_get('allow_url_fopen')?'YES':'NO';
	$mqg_cfg = ini_get('magic_quotes_gpc')?'YES':'NO';
	$de_cfg = ini_get('display_errors')?'YES':'NO';
	$upsize = ini_get('upload_max_filesize');
	$reg_glo = ini_get('register_globals')?'YES':'NO';
	$sess_auto = ini_get('session.auto_start')?'YES':'NO';
	$sess_savepath = ini_get('session.save_path');
	$sess_savepath = $sess_savepath?$sess_savepath:'C:\WINDOWS\Temp';
	$sess_lifetime = ini_get('session.cookie_lifetime');
	$sess_gc_mlt = ini_get('session.gc_maxlifetime');
$otherinfo = <<<EOF
<span style="color:red;font-size:16px">如果你发现错误或者有好的建议请直接飞秋,我的IP:192.168.1.200.飞秋名"PHPkiller"</span><br/>
<span style="font-size:14px">以下为系统有关信息</span>
<table style="font-size:14px" bgcolor="#e8e6ec"  cellspacing="1" cellpadding="1" border="3" width="100%">
<tr><td>&nbsp;服务器IP</td><td>&nbsp;$s_addr</td></tr>
<tr><td>&nbsp;操作系统</td><td>&nbsp;$os</td></tr>
<tr><td>&nbsp;网站架构</td><td>&nbsp;$s_soft</td></tr>
<tr><td>&nbsp;php.ini路径</td><td>&nbsp;$php_ini</td></tr>
<tr><td>&nbsp;你的IP</td><td>&nbsp;$c_addr</td></tr>
<tr><td>&nbsp;网站根目录</td><td>&nbsp;$doc_root</td></tr>
<tr><td>&nbsp;注册全局变量</td><td>&nbsp;$reg_glo</td></tr>
<tr><td>&nbsp;自动启用session</td><td>&nbsp;$sess_auto</td></tr>
<tr><td>&nbsp;session路径</td><td>&nbsp;$sess_savepath</td></tr>
<tr><td>&nbsp;session生命周期</td><td>&nbsp;$sess_lifetime</td></tr>
<tr><td>&nbsp;session最大生命周期</td><td>&nbsp;$sess_gc_mlt</td></tr>
<tr><td>&nbsp;远程文件访问</td><td>&nbsp;$auf_cfg</td></tr>
<tr><td>&nbsp;对GPC增加斜线</td><td>&nbsp;$mqg_cfg</td></tr>
<tr><td>&nbsp;上传大小限制</td><td>&nbsp;$upsize</td></tr>
<tr><td>&nbsp;显示系统错误</td><td>&nbsp;$de_cfg</td></tr>
</table><br/>
<span style="font-size:14px">以下为更改历史</span><br/>
<table style="font-size:14px" width="100%">
<tr><td>FileScanner2.8 增加类似百度谷歌等搜索提示功能</td></tr>
<tr><td>FileScanner2.7 增加文件搜索查询结果的操作(如预览,编辑等)采用ajax实现,后台数据的返回采用json封装</td></tr>
<tr><td>FileScanner2.6 增加文件搜索普通查询如搜mp3,将会对查询结果关键字高亮显示</td></tr>
<tr><td>FileScanner2.5 搜索框输入关键字后回车即可搜索</td></tr>
<tr><td>FileScanner2.4 增加文件搜索功能,支持*查询,如*.avi</td></tr>
<tr><td>FileScanner2.3 在其他信息中增加session信息</td></tr>
<tr><td>FileScanner2.2 调整部分div+css效果,标题挪到右边显示</td></tr>
<tr><td>FileScanner2.1 增加高亮显示表行js效果及显示目录大小通过ajax实现</td></tr>
<tr><td>FileScanner2.0 增加新建,显示系统信息,界面稍微美化即其它细节问题,改动比较多,升级为2.0</td></tr>
<tr><td>FileScanner1.3 增加上传功能</td></tr>
<tr><td>FileScanner1.2 解决相应操作后应返回当前目录及双斜线显示问题</td></tr>
<tr><td>FileScanner1.1 解决不能文件下载的问题,header函数前不能有输出语句</td></tr>
<tr><td>FileScanner1.0 基本功能的实现,面向过程模式编写,有时间在考虑对象重构</td></tr>
</table>
EOF;
echo $otherinfo;
	$curdir =path_formate($_GET['dir']);
	echo '<a href="?dir='.urlencode($curdir).'">返回</a>&nbsp;';
	exit();
}/**************************************************/
$curdirver ='null';
$catalog = (!empty($_GET['dir']))?$_GET['dir']:getcwd();
$curdir = path_formate($catalog);
echo '<div id="head"><span class="dirinfo"><select id="driver" name="ss" onchange="selectdisk(this.value)";>';
for($i=65;$i<91;$i++){
	$vol = chr($i).':';
	if(is_dir($vol)){
		if(substr($curdir,0,2)==$vol){
			$select ='selected'; 
			$curdirver=$vol;
		}else {$select ='';}
	echo '<option value="'.$vol.'"'.$select.'>'.$vol.'</option>';
	}
}
echo '</select>';
echo '&nbsp;当前目录=><span id="curdir">'.utf8($curdir).'</span></span>';
echo $title;
echo '</div><div id="nav"><hr>';
$para='dir='.urlencode($curdir).'';
echo '||&nbsp;<a href="#" onclick="creatediv(this,3);">上传文件</a>&nbsp;';
echo '||&nbsp;<a href="#" onclick="creatediv(this,1);">新建文件</a>&nbsp;';
echo '||&nbsp;<a href="#" onclick="creatediv(this,2);">新建目录</a>&nbsp;';
/*****网站根目录start****/
$doc_root = str_replace('/','\\',$_SERVER['DOCUMENT_ROOT']);
$rootdir = 'dir='.urlencode($doc_root).'';
echo '||&nbsp;<a href="?'.$rootdir.'">网站根目录</a>&nbsp;||';
/*****网站根目录end****/
echo '&nbsp;<a style="color:#9933ff" href="?op=other&'.$para.'">其他信息</a>&nbsp;||';
/*****上级目录start*****/
$updir = substr($curdir,0,strripos($curdir,'\\'));
echo $updir?'&nbsp;<a href="?dir='.urlencode($updir).'">上级目录</a>':'';
/*****上级目录end*****/
$search_form=<<<EOF
&nbsp;&nbsp;<span id="search"><input class='sear_text' type="text" id="search_key" onkeyup="keyup(event)">&nbsp;<input title='支持模糊查询(如*.avi)' type="button" value="文件搜索" id="f_so" onclick="searchfile()">&nbsp;<span id="s_plan"></span></span>
EOF;
echo $search_form;
echo '<hr></div>';
/*****以下为目录遍历逻辑*******/
$f_arr = @scandir($curdir) or die('failed to open '.$curdir.'!!');
$f_num = count($f_arr);
?>
<div id='showctx'></div>
<table id='result' border='0' cellspacing='1' cellpadding='1' width='100%'>
<tr bgcolor='#b0c4de'><th>名称</th><th>类型</th><th>大小</th>
<th>修改时间</th><th>操作</th></tr>
<?php
$dir_num=0;//记录目录数量
$file_um=0;//记录文件数量
$trcolor='#e8e6ec';
for($i=0;$i<$f_num;$i++){
	if('.'==$f_arr[$i]||'..'==$f_arr[$i])continue;
	$path = $curdir.'\\'.$f_arr[$i];
	$p_utf8 = urlencode($path);
	$f_utf8 = utf8($f_arr[$i]);
	$trcolor = ($trcolor=='#e8e6ec')?'#ffffff':'#e8e6ec';
	//echo $trcolor.'<br/>';
	echo '<tr bgcolor="'.$trcolor.'" onmouseover="blink(this);" onMouseOut="unblink(this);">';
	if(is_dir($path)){
		echo '<td><a href="?dir='.$p_utf8.'">'.$f_utf8.'</a></td>';
		echo '<td>'.f_type($path).'</td>';
		echo '<td>&nbsp;</td>';
		echo '<td>'.filetime($path).'</td>';
		echo '<td><a href="#" onclick="getDirSize(this,\''.$p_utf8.'\');">大小</a>&nbsp;/&nbsp;';

		echo '<a onclick=\'return suredel();\' href="?op=del&way='.$p_utf8.'">删除</a></td>';
		$dir_num++;
	}
	else{
		$f_type = f_type($path);
		echo '<td>'.$f_utf8.'</td>';
		echo '<td>'.$f_type.'</td>';
		echo '<td>'.f_size($path).'</td>';
		echo '<td>'.filetime($path).'</td><td>';
		if($f_type=='image')
		{echo '<a href="?op=view&way='.$p_utf8.'">预览</a>&nbsp;/&nbsp;';}else if($f_type=='text')
		{echo '<a href="?op=edt&way='.$p_utf8.'">编辑</a>&nbsp;/&nbsp;';}
		echo '<a onclick=\'return suredel();\' href="?op=del&way='.$p_utf8.'">删除</a>&nbsp;/';
		echo '&nbsp;<a href="?op=dnd&way='.$p_utf8.'">下载</a></td>';
		$file_um++;
	}
	echo '</tr>';
}
?>
</table>
<div id='tableinfo'>
<?php
echo '当前目录文件总数:'.($f_num-2).',其中目录数:'.$dir_num.',文件数'.$file_um;
echo '&nbsp;.&nbsp;'.$curdirver.'容量:'.size_formate(disk_total_space($curdirver));
echo '&nbsp;&nbsp;'.$curdirver.'剩余:'.size_formate(disk_free_space($curdirver));
?>
</div><!--tableinfo-->
<style type="text/css">
	*{font-size: 14px;}
	a{text-decoration:none;color:#cc6666;}
	a:hover{color:red;text-decoration:underline}
	div#nav a:hover{position:relative;left:1px;top:-5px;
	font-weight:bold;text-decoration:none;}
	#result span{color:#cc6666;}
	div#head{height:1.2em;}
	div#head .dirinfo{float:left;}
	div#head .title{color:red;font-size:1.2em;
	font-weight:bold;text-align:right;}
	.sear_text,#suggest{width:150px;}
	#suggest{background-color:white;position:absolute;
	width:150px;border:1px solid gray;display:none;}
	.vote_w{width:149px;}
	#upform{display:inline;}
</style>
<script type="text/javascript">
<!--
	function $(s_id){return document.getElementById(s_id);}
	function PT(str){return document.write(str+'<br/>');}
	function val(s_id,val){return $(s_id).value=val;}
	function text(s_id,text){return $(s_id).innerText=text;}
	function html(s_id,html){return $(s_id).innerHTML=html;}

	var fn="f28.php";
	function suredel()
	{return confirm('确定删除?此操作不可恢复!');};
	function selectdisk(value){
	$('ff').action = '?dir='+value;
	$('ff').submit();}
	var origin = '';
	function blink(obj)
	{origin=obj.style.backgroundColor;
	obj.style.backgroundColor='#98bcf3';}
	function unblink(obj)
	{obj.style.backgroundColor=origin;}

	//根据传入类型创建相应的div;
	function creatediv(obj,type){
		switch(type){
			case 1:
				with($('div_newfile').style){
					position='absolute';
					top=obj.offsetTop+30;left=obj.offsetLeft-30;
					padding=5;filter = "alpha(opacity=88)";
					opacity = 0.88;background='#d8e1ef';display='';
				}$('div_upform').style.display='none';
				$('div_newdir').style.display='none';break;
			case 2:
				with($('div_newdir').style){
					position='absolute';
					top=obj.offsetTop+30;left=obj.offsetLeft-30;
					padding=5;filter = "alpha(opacity=88)";
					opacity = 0.88;background='#d8e1ef';display='';
				}$('div_newfile').style.display='none';
				$('div_upform').style.display='none';break;
			case 3:
				with($('div_upform').style){
					position='absolute';
					top=obj.offsetTop+30;left=obj.offsetLeft;
					padding=5;filter = "alpha(opacity=88)";
					opacity = 0.88;background='#d8e1ef';display='';
				}$('div_newfile').style.display='none';
				$('div_newdir').style.display='none';break;
		}
	}
	//提交新建文件
	function newfile(){
		if($('file').value.replace(/(^\s*)|(\s*$)/g, '')=='')return;
		$('ff').action='?op=newfile&dir=';
		$('ff').action+=encodeURI($('curdir').innerHTML+'&file='+$('file').value);$('ff').submit();
	}
	//提交新建目录
	function newdir(){
		if($('dirname').value.replace(/(^\s*)|(\s*$)/g, '')=='')return;
		$('ff').action='?op=newdir&dir=';
		$('ff').action+=encodeURI($('curdir').innerHTML+'&dirname='+$('dirname').value);$('ff').submit();
	}
	//提交上传文件
	function upfile(){
		if($('upform').upfile.value.replace(/(^\s*)|(\s*$)/g, '')=='')return;
		$('upform').action='?op=up&dir=';
		$('upform').action+=encodeURI($('curdir').innerHTML);
		$('upform').submit();
	}
	/**********ajax***********/
	function getAjax(){
		var xmlHttp=null;try{xmlHttp=new XMLHttpRequest();}
		catch (e){try{xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");}
		catch (e){xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");}}
		return xmlHttp;
	}
	//封装ajax的get请求,只关心返回来的数据
	function ajax_get(queryurl,callback_Complete){
		var xmlHttp=getAjax();
		if(xmlHttp==null){alert("您的浏览器不支持ajax");
			return;}
		xmlHttp.onreadystatechange=function(){
			if(4==xmlHttp.readyState && 200==xmlHttp.status){
				callback_Complete(xmlHttp.responseText);
			}}
		xmlHttp.open("GET",queryurl,true);xmlHttp.send(null);
	}
	//封装ajax的post请求,只关心返回来的数据
	function ajax_post(url,data,callback_Complete){
		var xmlHttp=getAjax();
		if(xmlHttp==null){alert("您的浏览器不支持ajax");
			return;}
		xmlHttp.onreadystatechange=function(){
			if(4==xmlHttp.readyState && 200==xmlHttp.status){
				callback_Complete(xmlHttp.responseText);
			}}
		xmlHttp.open("POST",url,true);
		xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");xmlHttp.send(data);
	}

	function keyup(event){
		if(event.keyCode==13 && ''==$('s_plan').innerHTML){
			$('f_so').click();$('search_key').blur();
			$('suggest').style.display='none';return;
		}
		var url=fn+"?op=query&s_key="+$('search_key').value;
		var suggest_Complete = function(responseText){
			if(''==responseText){
				$('suggest').style.display="none";return;
			}
			var data_arr = responseText.split('|');
			$('suggest').innerHTML = '';
			if($('search_key').value.indexOf('*')>-1){
				for(var i=0;i<data_arr.length-1;i++){
					$('suggest').innerHTML+='<div class="vote_w" onmouseover="select(this)" onmouseout="select(this)" onclick="fillin(this)">'+data_arr[i]+'</div>';
				}
			}else{
				for(var i=0;i<data_arr.length-1;i++){
					$('suggest').innerHTML+='<div class="vote_w" onmouseover="select(this)" onmouseout="select(this)" onclick="fillin(this)">'+data_arr[i].replace(eval('/('+$('search_key').value+')/'),"<a style='color:red'>$1</a>")+'</div>';
				}
			}
			$('suggest').style.left=$('search_key').offsetLeft;
			$('suggest').style.top=$('search_key').offsetTop+$('search_key').offsetHeight;
			$('suggest').style.cursor="hand";
			$('suggest').style.display="block";
		}
		ajax_get(url,suggest_Complete);
	}
	function select(obj){
		obj.style.backgroundColor = (obj.style.backgroundColor=='#f0f0f0')?'white':'#f0f0f0';
	}
	function fillin(obj){
		$('search_key').focus();
		$('search_key').value = obj.innerText||obj.textContent;
		$('suggest').style.display="none";
	}
	//无刷新删除
	function ajax_del(obj,p_utf8){
		if(!confirm('确定删除?此操作不可恢复!'))return;
		var url=fn+"?op=del&way="+p_utf8+"&flag=ajax_del";
		var del_Complete = function(responseText){
			if('1'==responseText){
				var curtr = obj.parentNode.parentNode;
				curtr.parentNode.removeChild(curtr);
				alert('删除成功');
			}
		}
		ajax_get(url,del_Complete);
	}
	function sidesame(obj){//预览标签span修改其样式和旁边的一样
		obj.style.color='red';
		obj.style.textDecoration='underline';
		obj.style.cursor='pointer';
	}
	function recover(obj){//预览标签span恢复,和anchor效果一样
		obj.style.color='#cc6666';
		obj.style.textDecoration='none';
	}
	////无刷新预览
	function ajax_view(obj,p_utf8){
		var ex = event.clientX;var ey = event.clientY;
		var url=fn+"?op=view&way="+p_utf8+"&flag=ajax_view&q="+Math.random();
		var view_Complete = function(responseText){
			openView(responseText,ex,ey);
		}
		ajax_get(url,view_Complete);
	}
	//打开预览
	function openView(imgsrc,ex,ey){
		var viewer = $("viewer");
		viewer.src = imgsrc+'?q='+Math.random();
			viewer.style.display = "";
			viewer.style.position="absolute";
			viewer.style.left=130;
			viewer.style.left=(viewer.width>=ex)?0:ex -viewer.width-30;
			var yt = ey+document.body.scrollTop;
			var yh =yt+viewer.height;//图片实际y坐标+图片高
			var ch =document.body.clientHeight+document.body.scrollTop;
			viewer.style.top = (yh>ch)?yt-(yh-ch):yt;
	}
	//单击关闭预览
	function closeView(){$('viewer').style.display = "none";}
	//无刷新进入编辑状态
	function ajax_edit(p_utf8){
		var url=fn+"?op=edt&way="+p_utf8+"&flag=ajax_edt&q="+Math.random();
		var edit_Complete = function(responseText){
			$('result').style.display='none';
			$('tableinfo').style.display='none';
			$('showctx').style.display='';
			html('showctx',responseText);
			$('search').style.display='none';
			$('suggest').style.display='none';
		}
		ajax_get(url,edit_Complete);
	}
	//无刷新修正乱码
	function ajax_fixcode(p_utf8){
		var url=fn+"?op=edt&way="+p_utf8+"&flag=ajax_edt&cd=revise";
		var fixcode_Complete = function(responseText){
				html('showctx',responseText);
		}
		ajax_get(url,fixcode_Complete);
	}
	//无刷新保存操作
	function ajax_save(p_utf8){
		var url =fn+"?op=save&way="+p_utf8+"&flag=ajax_save&q="+Math.random();
		var data="f_ctx="+$('f_ctx').innerHTML;
		var save_Complete = function(responseText){
				alert(responseText);
				ajax_back();
		}
		ajax_post(url,data,save_Complete);
	}
	function ajax_back(){
		html('showctx','');
		$('showctx').style.display='none';
		$('result').style.display='';
		$('tableinfo').style.display='';
		$('search').style.display='';
	}
	//无刷新取得目录大小
	function getDirSize(obj,p_utf8){
		var xmlHttp=getAjax();
		if(xmlHttp==null){alert("您的浏览器不支持ajax");
			return;}	
		var url=fn+"?op=dirsize&calcdir="+p_utf8;
		xmlHttp.onreadystatechange=function()
		{var curtr = obj.parentNode.parentNode;
		 var sizeNode=curtr.childNodes[2];
			if(xmlHttp.readyState==1){
			sizeNode.innerHTML='loading...';
			}if(xmlHttp.readyState==4){
			sizeNode.innerHTML=xmlHttp.responseText;
			}}
		xmlHttp.open("GET",url,true);xmlHttp.send(null);
	}
	//模拟加载中效果
	function loading(str){
		var dot='';var timer;
		return function(){
			if(dot=='....'){dot='';}
			if(dot<'....'){
				dot+='.';
				if($('ctx').value!=''){
					clearTimeout(timer);timer=null;dot=null;
					html('s_plan','');
				}else{
					timer = setTimeout(arguments.callee,200);
					html('s_plan',str+dot);
				}
			}
		}
	}
	//无刷搜索文件
	function searchfile(){
		var seach_key=$('search_key').value;
		if(seach_key.replace(/(^\s*)|(\s*$)/g, '')=='')return;
		html('tableinfo','');val('ctx','');
		$('suggest').style.display='none';
		var curdir=$('curdir').innerHTML;
		if(''==curdir){return;}
		xmlHttp=getAjax();
		if(xmlHttp==null){alert("您的浏览器不支持ajax");
			return;}
		url=fn+"?op=filesearch&seach_key="+seach_key+"&curdir="+encodeURI(curdir)+'&q='+Math.random();
		var orig_width = $('f_so').style.width;
		xmlHttp.onreadystatechange=function(){
			if(xmlHttp.readyState==1){
				loading('真正查找,请稍候')();
				$('f_so').style.display="none";}
			if(xmlHttp.readyState==4){
				if(xmlHttp.responseText.indexOf('Fatal error')>0){
					alert('搜索失败!!! 搜索结果或速度取决于你的网络连接和目录嵌套深度,建议搜索嵌套深度相对浅的目录,不怕文件多,只怕目录深 -_-!');
					val('ctx','xxx');
					$('f_so').style.display="";
					return;
				}
				val('ctx','xxx');
				$('f_so').style.display="";
				if('empty'!=xmlHttp.responseText){
					var json =xmlHttp.responseText.substr(0,xmlHttp.responseText.lastIndexOf(','));//alert(json);
					var json_obj = eval('(['+json+'])');
					jsontable(json_obj);
				}else{
					emptytable();
				}
			}
		}
		xmlHttp.open("GET",url,true);xmlHttp.send(null);
	}
	function jsontable(json_obj){
		var table_search=$('result');
		var rowlen=table_search.rows.length;
		for (var i=0;i<rowlen-1;i++){
			table_search.deleteRow(1);
		}
		//修改头部信息,'类型'->'所在目录'
		var head_tr = table_search.rows[0];
		var head_th1=head_tr.cells[1];
		head_th1.innerHTML='所在目录';
		var trcolor = '#e8e6ec';///772 line
		//针对星号是否高亮显示关键字
		var hightlight =($('search_key').value.indexOf('*')=='-1')?1:0;
		//alert(hightlight);
		for(var i=0;i<json_obj.length;i++){
			var tr = table_search.insertRow(i+1);
			trcolor = (trcolor=='#e8e6ec')?'#ffffff':'#e8e6ec';
			tr.style.backgroundColor=trcolor;
			tr.onmouseover=function(){blink(this)}
			tr.onmouseout=function(){unblink(this)}//
			//var f_name = json_obj[i].f_name.replace(eval('/('+$('search_key').value+')/'),"<a style='color:red'>$1</a>");
			var f_name = hightlight?json_obj[i].f_name.replace(eval('/('+$('search_key').value+')/'),"<a style='color:red'>$1</a>"):json_obj[i].f_name;
			var td0 = tr.insertCell(0);td0.innerHTML=f_name;
			var td1 = tr.insertCell(1);td1.innerHTML=json_obj[i].loca_dir;
			var td2 = tr.insertCell(2);td2.innerHTML=json_obj[i].f_size;
			var td3 = tr.insertCell(3);td3.innerHTML=json_obj[i].f_time;
			var f_opi = json_obj[i].f_op.replace(/\(([^"]*)"([^"]*)"\)/g,"($1'$2')");
			var td4 = tr.insertCell(4);td4.innerHTML=f_opi;
		}
	}
	function emptytable(){/***空的情况*******/
		var table_search=$('result');
		var rowlen=table_search.rows.length;
		for (var i=0;i<rowlen-1;i++){
			table_search.deleteRow(1);
		}
		//修改头部信息,'类型'->'所在目录'
		var head_tr = table_search.rows[0];
		var head_th1=head_tr.cells[1];
		head_th1.innerHTML='所在目录';
		var one_tr = table_search.insertRow(1);
		var one_td0 = one_tr.insertCell(0);
		one_td0.colSpan ='5';
		var noret='<a style="color:red">搜索完毕,没有结果可显示!</a>';one_td0.innerHTML=noret;
	}
//-->
</script>
<form id='ff' method='post' action=''></form>
<input type='hidden' id='ctx'>
<img id="viewer" onclick='closeView();' style='display:none'/>
<div id="suggest"></div>
<div id="div_newfile" style='display:none'>
&nbsp;输入文件名(带后缀):<input type="text" id="file">
<input type="button" value="确定" onclick="newfile();"></div>
<div id="div_newdir" style='display:none'>
&nbsp;输入目录名:<input type="text" id="dirname">
<input type="button" value="确定" onclick="newdir();"></div>
<div id="div_upform" style='display:none'>
<input type="button" value="上传" onclick="upfile();">
<form id ='upform' enctype="multipart/form-data" method="post" action="">
<input type="file" name="upfile"></form></div>