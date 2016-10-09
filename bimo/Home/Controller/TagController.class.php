<?php
namespace Home\Controller;
use Think\Controller;

class TagController extends Controller{
	public  function index(){
		$tag = M("tags");
		$tag = $tag->select();
		//调用博主推荐控制器获取推荐内容
		$recommend = R("Recommend/index");
		
		$this->assign ('recommend',$recommend);
		$this->assign("tag",$tag);
		$this->display();
	}	
}