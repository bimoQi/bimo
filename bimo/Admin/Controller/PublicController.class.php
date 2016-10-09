<?php
namespace Admin\Controller;
use Think\Controller;
/*后台每个页面都要引入*/
class PublicController extends Controller{
	//检查登录
	protected function check_login(){
		$user = M("user");
		$condition['name'] = "{$_POST['username']}";
		$condition['password'] = sha1(md5($_POST['password']));
		$condition['_logic'] = "and"; 
		$info = $user->where($condition)->find();
 		if($info != null){
 			$this->admin_info($info);
 			return "通过";
 		}elseif(!$user->where("name = '{$_POST['username']}'")->select()){
 				return "没有此管理员";
 		}else{
 			return "密码错误";
 		}
	}
	protected function admin_info($info){
		session('admin_info',$info);
	}
	protected function is_login(){
		if(!session("admin_info")){
			exit("小子，这路径都被你发现了，快走开！");
		}
	}
	public function logout(){
		session("admin_info",null);
		$this->redirect("/");
	}
}