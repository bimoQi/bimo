<?php
namespace Home\Controller;
use Think\Controller;
class SpeakController extends Controller{
	public function index(){
		$speak = M('speak');
		$count = $speak->count();
		$arr = $speak->order("id desc")->limit("5")->select();
		$head = M('user')->where('role = "超级管理员"')->getField('head');
		for($i=0; $i<count($arr); $i++){
			$arr[$i]['head'] = $head;
		}
		$this->assign('count',$count);
		$this->assign('arr',$arr);
		$this->display();
	}
	public function load_more(){
		if($_POST["id"]){
			$data = M('speak')->where("id < {$_POST['id']}")->limit(5)->select();
			$head = M('user')->where('role = "超级管理员"')->getField('head');
			for($i=0;$i<count($data);$i++){
				$data[$i]['year'] = date("Y",$data[$i]['posttime']);
				$data[$i]['month'] = date("n",$data[$i]['posttime']);
				$data[$i]['day'] = date("d",$data[$i]['posttime']);
				$data[$i]['head'] = $head;
			}
			$this->ajaxReturn($data);
		}else{
			exit("系统错误！");
		}
	}
	//处理顶 踩
	public function chuli(){
		if($_POST){
			$speak = M('Speak');
			$condition['id'] =  $_POST['id'];
			if($_POST['type'] == 'ding'){
				if($speak->where($condition)->setInc("dingnum",1)){
					$data['isok'] = "ok";
					$data['dingnum'] = $speak->where($condition)->getField("dingnum");
					$this->ajaxReturn($data);
				}
			}else{
				if($speak->where($condition)->setInc("cainum",1)){
					$data['isok'] = "ok";
					$data['cainum'] = $speak->where($condition)->getField("cainum");
					$this->ajaxReturn($data);
				}
			}
		}else{
			exit("系统错误！");
		}
	}
}