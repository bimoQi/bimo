<?php
namespace Home\Controller;
use Think\Controller;
class TestController extends Controller{
	public function index(){
		echo get_mac_addr(PHP_OS);
// 		$string="[img]123[/img]
// 				[img]456[/img]";
// 		$str = preg_replace('/\[img\](.*)\[\/img\]/','<img src="$1"/>',$string);
// 		$string="[pre]123[/pre][pre]456fsfad";
// 		echo $string;
// 		$str = preg_replace('/\[pre\]/','<pre style="border-left:2px solid #008000;background:#EEEEFF;width:550px;white-space:pre-wrap;white-space:-moz-pre-wrap;white-space:-pre-wrap;white-space:-o-pre-wrap;word-wrap:break-word;word-break:break-all;">',$string);
// 		$str = preg_replace('/\[\/pre\]/','</pre>',$str);
// 		echo $str;
//		$this->display();
	}
	public function test(){
		$data["pid"] = M('comment')->where("nickname = 'hello'")->getField("id");
		echo $data["pid"];
// 		$test = D("test");
// 		if($test->create()){
// 			$data['status']  = 1;
// 			$data['content'] = "添加成功";
// 			$this->ajaxReturn(json_encode($data),'JSON');
// 		}else{
// 			$data['content']=$test->getError();
// 			$this->ajaxReturn($data,'JSON');
// 		}
	}
}