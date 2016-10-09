<?php
//文章check检查
function check_title($string){
	$string = html($string);
	return $string;
}
function check_author($string){
	$string = html($string);
	return $string;
}
/*
function check_pic($string){
	$string = html($string);
	$string = substr(strrchr($string, '.'), 1);//strrchr获取字符串'.'最后一次出现的位置
	if($string!='png' || $string!='jpeg' || $string!='jpg' || $string!='gif'){
		return 0;
	}
	return $string;
}*/
function check_content($string){
	return $string;
}