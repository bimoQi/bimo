<?php
function html($string){
	if(is_array($string)){
		foreach($string as $var=>$value){
			$string[$var] = html($value);
		}
	}else{
		$string =htmlspecialchars($string);
	}
	return $string;
}
function my_substr($string,$start=0,$length){
	$string = preg_replace('/\[img\](.*)\[\/img\]/','',$string);//让图片不显示
	$string = preg_replace('/\[view\](.*)\[\/view\]/', '',$string);//让视频不显示
	$string = preg_replace('/\[code\]/','',$string);
	$string = preg_replace('/\[\/code\]/', '',$string);
	$string = preg_replace('/(\n)/', '', $string);
	$string = preg_replace('/\[pre\]/','',$string);
	$string = preg_replace('/\[\/pre\]/','',$string);
	$string = preg_replace('/<p>/','',$string);
	$string = preg_replace('/<\/p>/','',$string);
	$string = preg_replace('/&lt;pre&gt;/','',$string);//消除<pre>
	//echo strlen(mb_substr($string, $start,$length,'utf-8'));
	if(mb_strlen($string) <= $length){
			return $string;
	}else{
			return mb_substr($string, $start,$length,'utf-8')."...";
	}
}
function checkLength($string, $min, $max){
	$length = mb_strlen($string,'utf-8');
	if($length<$min || $length>$max){
		return false;
	}else 
		return true;
}
//编码转化
function iconv_gb2312($string){
	return iconv("UTF-8", "gb2312", $string);
}
function iconv_utf8($string){
	return iconv("gb2312", "UTF-8", $string);
}
//删除文件及其文件下所有文件
function deldir($dir) {
	//先删除目录下的文件：
	$dh=opendir($dir);
	while ($file=readdir($dh)) {
		if($file!="." && $file!="..") {
			$fullpath=$dir."/".$file;
			if(!is_dir($fullpath)) {
				unlink($fullpath);
			} else {
				deldir($fullpath);
			}
		}
	}
	closedir($dh);
	//删除当前文件夹：
	if(rmdir($dir)) {
		return true;
	} else {
		return false;
	}
}
//转换表情
function smile($string){
	return preg_replace ( '/\[smile_(\d*)\]/', '<img style="width:30px;height:30px;margin:2px 2px 10px 3px;" src="' . __ROOT__ . '/Public/img/smiles/$1.gif"/>', $string );
}
//获取mac地址
function get_mac_addr($os_type){
	switch ( strtolower($os_type) ){
		case "linux":
			$type = 'linux';
			break;
		case "solaris":
			break;
		case "unix":
			break;
		case "aix":
			break;
		default:
			$type = 'windows';
			break;
	}
	@exec("ipconfig /all",$array);//执行dos命令
	foreach($array as $value){
		if ( preg_match("/[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f][:-]"."[0-9a-f][0-9a-f]/i",$value,
				$mac_addr ) ){
			break;
		}
	}
	return $mac_addr[0];
}

function get_ip_addr($ip) {
	$json = @file_get_contents("http://whois.pconline.com.cn/ipJson.jsp?ip={$ip}");
	$json = iconv('gbk','utf-8',$json);
	$json = substr($json,40,-10);
	return json_decode($json,true);
}
function isMobile(){
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset ($_SERVER['HTTP_X_WAP_PROFILE']))
        return true;
 
    //此条摘自TPM智能切换模板引擎，适合TPM开发
    if(isset ($_SERVER['HTTP_CLIENT']) &&'PhoneClient'==$_SERVER['HTTP_CLIENT'])
        return true;
    //如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
    if (isset ($_SERVER['HTTP_VIA']))
        //找不到为flase,否则为true
        return stristr($_SERVER['HTTP_VIA'], 'wap') ? true : false;
    //判断手机发送的客户端标志,兼容性有待提高
    if (isset ($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array(
            'nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile'
        );
        //从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
            return true;
        }
    }
    //协议法，因为有可能不准确，放到最后判断
    if (isset ($_SERVER['HTTP_ACCEPT'])) {
        // 如果只支持wml并且不支持html那一定是移动设备
        // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
            return true;
        }
    }
    return false;
}








