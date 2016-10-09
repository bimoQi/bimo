<?php
namespace Admin\Controller;
class MenuController extends PublicController{
	public function __construct(){
		parent::__construct();
		$this->is_login();
	}
	public function index(){
		C('SHOW_PAGE_TRACE',false);
		$this->assign('admin_name',session("admin_info")['name']);
		$this->display();
	}
}