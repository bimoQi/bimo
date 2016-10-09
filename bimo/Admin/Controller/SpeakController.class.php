<?php
namespace Admin\Controller;
use Think\Page;
class SpeakController extends PublicController{
	public function __construct(){
		parent::__construct();
		$this->is_login();
	}
	public function index(){
		$speak = M("speak");
		$count = $speak->count();
		$page = new Page($count,5);
		$show = $page->show();
		$list = $speak->limit($page->firstRow.','.$page->listRows)->order("id desc")->select();
		$this->assign("list",$list);
		$this->display();
	}	
	//新增微语
	public function add_speak(){
		$this->display();
	}
	public function do_add_speak(){
		if($_POST){
			if(trim($_POST['myEditor'])==""){
				$this->assign("error","输入内容不得为空！");
				$this->display("add_speak");
			}else{
				$speak = M("speak");
				$data['content'] = $_POST['myEditor'];
				$data['posttime'] = time();
				if($speak->data($data)->add()){
					$this->success("恭喜你！发布成功",U("Speak/index"));
				}
			}
		}else{
			exit("系统错误");
		}
	}
	//删除微语
	public function del_speak(){
		if($_POST){
			if(M("speak")->where("id = {$_POST['id']}")->delete()){
				$data['isdel'] = "ok";
				$this->ajaxReturn($data);
			}
		}else{
			exit("系统错误");
		}
	}
}