<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;

/***** 相册控制器  *****/
class AlbumController extends Controller{
	public function index(){
		$album = M("album");
		$alibum_arr = $album->select();
		for($i=0;$i<count($alibum_arr);$i++){
			if($alibum_arr[$i]['photonum'] != 0){
				$photo = M("photo");
				$imgpath = $photo->where(array("pid"=>"{$alibum_arr[$i]['id']}"))->limit(1)->getField("imgpath");
				$alibum_arr[$i]['imgpath'] = $imgpath;
			}
		}
		$this->assign("alibum_arr",$alibum_arr);
		$this->display();
	}	
	//显示相册里图片
	public function photo($id){
		if($id){
			$photo = M("photo");
			$condition['pid'] = $id;
			$count = $photo->where($condition)->count();
			$page = new Page($count,15);
			$show = $page->show();
			$list = $photo->where($condition)->limit($page->firstRow.','.$page->listRows)->select();
			$page_data["count"]=$count;
			$page_data['page_total'] = ceil($count/15);
			
			$album = M("album");
			$album_name = $album->where(array("id"=>$_GET['id']))->getField("name");
			$this->assign("album_name",$album_name);
			$this->assign("page_data",$page_data);
			$this->assign("show",$show);
			$this->assign("list",$list);
			$this->display();
		}else{
			exit("非法操作！");
		}
	}
	//处理“顶”
	public function ding(){
		if($_POST['ding']){
			$album = M("album");
			// 累加
			if($album->where("id={$_POST['ding']}")->setInc('dingnum', 1) !== "false"){
				$data["dingnum"] = $album->where("id={$_POST['ding']}")->getField("dingnum");
				$data["isok"] = "ok";
				$this->ajaxReturn($data);
			} 
		}
	}
	//处理“踩”
	public function cai(){
		if($_POST['cai']){
			$album = M("album");
			// 累加
			if($album->where("id={$_POST['cai']}")->setInc('cainum', 1) !== "false"){
				$data["cainum"] = $album->where("id={$_POST['cai']}")->getField("cainum");
				$data["isok"] = "ok";
				$this->ajaxReturn($data);
			}
		}
	}
}