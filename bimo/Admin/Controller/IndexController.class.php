<?php
namespace Admin\Controller;

class IndexController extends PublicController{
	public function index(){
		exit("系统错误！");
	}	
	public function login(){
		if($_POST){
			$return_info = $this->check_login();
			if($return_info == "通过"){
				$this->redirect("Menu/index");
			}else{
				$this->assign('info',$_POST);
				$this->assign('error',"<script>alert('".$return_info."')</script>");
				$this->display();
			}
		}else{
			$this->display();
		}
	}
}