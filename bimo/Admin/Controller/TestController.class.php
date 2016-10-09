<?php
namespace Admin\Controller;
use Think\Controller;

class TestController extends Controller{
	public function index(){
// 		$file="/ZendStudio/TP_test/ThinkPHP_test/bimo/Uploads/album/风景/576a41b8bd485.png";
// 		preg_match('/Uploads(.)*/', $file ,$arr);
		
// 		$arr[0] = iconv_gb2312($arr[0]);
// 		$dir=$_SERVER['DOCUMENT_ROOT'].iconv_gb2312($file);
// 		echo $dir;
//  		if(unlink($dir)){
//  			echo "ok";
//  		}
// 		$file_name="风";
// 		$dir = APP_PATH."Uploads/album/".$file_name;
// 		$dir = iconv_gb2312($dir);//获取绝对路径
// 		echo $dir;
// 		if(file_exists(APP_PATH."Uploads/")){
// 					echo "ok";
// 		}else 
// 			echo "no";
		
// 		$photo = M("photo");
// 		$condition["id"] = $_POST['id'];
// 		$file_name = $album->where($condition)->getField("name");
		$head = M('user')->where('role = "超级管理员"')->getField('head');
		echo $head;
		//$this->display();
	} 	
}