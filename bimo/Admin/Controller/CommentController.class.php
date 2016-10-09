<?php
namespace Admin\Controller;
use Think\Page;

class CommentController extends PublicController{
	public function __construct(){
		parent::__construct();
		$this->is_login();
	}
//查
	public function show_comment(){
		$comment = M("comment");
		$count = $comment->where("pid = 0")->count();
		//分页
		$page = new Page($count,5);
		$show = $page->show();
		$list = $comment->where("pid = 0")->limit($page->firstRow.','.$page->listRows)->order("id desc")->select();
		//所属文章、回复量
		$article = M('article');
		for($i=0;$i<count($list);$i++){
			$list[$i]['article'] = $article->where("id = {$list[$i]['articleid']}")->getField("title");
			$list[$i]['tongguo'] = $list[$i]['tongguo'] ? '通过' : '未通过';
			$list[$i]['reply'] = M("comment")->where("pid = {$list[$i]['id']}")->select();
		}
		$page_data=array();
		$page_data["count"]=$count;
		$page_data['page_total'] = ceil($count/5);
		$this->assign('list',$list);
		$this->assign('page_data',$page_data);
		$this->assign('show',$show);
		$this->display("Comment/show_comment");
	}
	//查看回复
	public function view_reply(){
		if($_POST['id']){
			$reply_arr = M("comment")->where("pid = {$_POST['id']}")->select();
			$data = $reply_arr;
			for($i=0;$i<count($data);$i++){
				$data[$i]['content'] = smile($data[$i]['content']);
				$data[$i]['posttime'] = date("Y-m-d",$data[$i]['posttime']);
			}
			$this->ajaxReturn($data);
		}
	}
	//删
	public function del_comment(){
		if($_POST['id']){
			if(M('comment')->delete($_POST['id'])){
				M('comment')->where("pid = {$_POST['id']}")->delete();
				$data['isdel'] = 'ok';
				$this->ajaxReturn($data);
			}
		}
	}
}