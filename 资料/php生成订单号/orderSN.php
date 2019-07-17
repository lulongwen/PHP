<?php
/**
* PHP版本的自动生成有规则的订单号(或编号)
* 生成的格式是: 20130103000001 前面几位为当前的日期,后面6位为系统自增长类型的编号
* 原理: 
* 1.获取当前日期格式化值;
* 2.读取文件,上次编号的值+1最为当前此次编号的值(记录以文件的形式存储)
* (下月会接着这个编号)
*/

class FileEveryDaySerialNumber {
	private $filename; //文件名 
	private $separate; //系统分隔符
	private $width; //自动增长部分的个数
	public function __construct($width, $filename, $separate) {
		$this->width = $width;
		$this->filename = $filename;
		$this->separate = $separate;
	}
	public function getOrUpdateNumber($current, $start) {
		$record = IOUtil::read_content($this->filename);
		$arr = explode($this->separate, $record);
		if($current == $arr[0]){ //如果是同一天,则继续增长
			$arr[1]++;
			IOUtil::write_content("$arr[0],$arr[1]", $this->filename); //将新值存入文件中
			return "$arr[0]".str_pad($arr[1],$this->width,0,STR_PAD_LEFT);
		}else{ //如果两个日期不一样则重新从起始值开始
			$arr[0] = $current;
			$arr[1] = $start;
			IOUtil::write_content("$arr[0],$arr[1]", $this->filename); //将新值存入文件中
			return "$arr[0]".str_pad($arr[1],$this->width,0,STR_PAD_LEFT);
		}
	} 
}


class IOUtil{
	public static function read_content($filename){
		$handle = fopen($filename,"r");
		$content = fread($handle,filesize($filename));
		return $content;
	}
	public static function write_content($content, $filename){
		$handle = fopen($filename,"w");
		fseek($handle,0);
		fwrite($handle, $content);
		return $content;
	}
}


//测试代码
//参数含义分别是日期后自增长数的位数, 存储的文件名称, 日期与自增长数的分割数
$obj = new FileEveryDaySerialNumber(6,"EveryDaySerialNumber.dat",","); 
$current_date = date("Ymd");
echo $obj->getOrUpdateNumber($current_date,1);




/* php 生成随机订单号 */
$code = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
$order_sn = $code[intval(date('Y')) - 2011]
	.strtoupper(dechex(date('m')))
	.date('d')
	.substr(time(), -5)
	.substr(microtime(), 2, 5)
	.sprintf('%02d', rand(0, 99));

echo $order_sn;