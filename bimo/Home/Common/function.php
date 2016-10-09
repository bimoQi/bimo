<?php
function my_article($articleid){
	$article = M('article');
	return mb_substr($article->field('title')->find($articleid)['title'],0,5,'utf-8');
}
function remove_pic($content){
	return preg_replace('/\[img\](.*)\[\/img\]/', '', $content);
}
function my_time($time){
	$time = time()-$time;
	$year = floor($time/31536000);
	$month = floor($time/2592000);
	$date = floor($time/86400);//60*60*24
	$hour = floor($time%86400/3600);
	$minute = floor($time%86400/60);
	$second = floor($time%86400%60);
	if($year){
		return $year."年";
	}elseif($month){
		return $month."个月";
	}elseif($date){
		return $date."天";
	}elseif($hour){
		return $hour."小时";
	}elseif($minute){
		return $minute."分钟";
	}elseif($second){
		return $second."秒";
	}
}