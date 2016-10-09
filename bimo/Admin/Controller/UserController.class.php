<?php
namespace Admin\Controller;

class UserController extends PublicController{
	public function __construct(){
		parent::__construct();
		$this->is_login();
	}
	public function index(){
		$user = M("user");
		$list = $user->select();
		
		$this->assign("list",$list);
		$this->display();
	}	
	//添加用户
	public function add_user(){
		echo sha1(md5("qi272700323"));
		$this->display();
	}
}