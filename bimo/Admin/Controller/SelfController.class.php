<?php
namespace Admin\Controller;
class SelfController extends PublicController{
	public function __construct(){
		parent::__construct();
		$this->is_login();
	}
	public function index(){
		$this->assign('admin_info',session("admin_info"));
		$this->display();
	}
	public function modif(){
		if($_POST){
			$user = M("user");
			$data = $user->create();
			$data['password'] = sha1(md5($data['password']));
			if($user->where("id = $data[id]")->data($data)->save()){
				$data = session("admin_info");
				$data['name'] = $_POST['name'];
				$data['email'] = $_POST['email'];
				session("admin_info",$data);
				$this->success("修改成功！",U("Self/index"));
			}
		}else{
			exit("系统错误");
		}	
	}
}