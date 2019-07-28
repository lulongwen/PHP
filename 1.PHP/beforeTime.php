<?php
/**
 * 获取已经过了多久
 * PHP时间转换
 * 刚刚、几分钟前、几小时前
 * 今天昨天前天几天前

    time() Unix时间戳格式, 1970年1月1日0:00:00到当前的秒数
    想得到当前时间的微秒数 用microtime(true)

    time() 1564216737 秒
    Date.now() 1564216768220 毫秒

    Date.now() 1970年1月1日 00:00:00 UTC 到当前时间的毫秒数

 * @param  string $time 时间戳
 * @return string
 */

function getBeforetime($time)
{
    // 今天最大时间
    $oneday = strtotime(date('Y-m-d 23:59:59'));

    $agoTimeTrue = time() - $time;
    $agoTime = $oneday - $time;
    $agoDay = floor($agoTime / 86400);

    if ($agoTimeTrue < 60) {
        $result = '刚刚';
    } 
    elseif ($agoTimeTrue < 3600) {
        $result = (ceil($agoTimeTrue / 60)) . '分钟前';
    } 
    elseif ($agoTimeTrue < 3600 * 12) {
        $result = (ceil($agoTimeTrue / 3600)) . '小时前';
    } 
    elseif ($agoDay == 0) {
        $result = '今天 ' . date('H:i', $time);
    } 
    elseif ($agoDay == 1) {
        $result = '昨天 ' . date('H:i', $time);
    } 
    elseif ($agoDay == 2) {
        $result = '前天 ' . date('H:i', $time);
    } 
    elseif ($agoDay > 2 && $agoDay < 16) {
        $result = $agoDay . '天前 ' . date('H:i', $time);
    } 
    else {
        $format = date('Y') != date('Y', $time) ? "Y-m-d H:i" : "m-d H:i";
        $result = date($format, $time);
    }

    return $result;
}

// 传值是秒，不要传值毫秒
$days = getBeforetime(1563869399);
echo $days;