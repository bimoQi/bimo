<?php
namespace Home\Controller;
use Think\Controller;

class GuestbookController extends Controller{
	public function index(){
		$guestbook = D('guestbook');
		//得到评论人的信息 根据邮箱的评论次数     进行排序
		$arr = $guestbook->getGuestbook();
		//普通查询 当前评论（包括回复的）
		list($comment,$show,$count,$count_pid) = $guestbook->getAllGuestbook();
		//显示一些分页信息
		$page_data=array();
		$page_data["count"]=$count;
		$page_data['page_total'] = ceil($count_pid/5);//显示多少页 根据没有不是回复的留言总数
		$this->assign('post',$arr);
		$this->assign ('comment', $comment );
		$this->assign('show',$show);
		$this->assign('page_data',$page_data);
		$this->display();
	}
	public function post(){
		if($_POST){
			$comment = D("guestbook");
			if($comment->create()){
				$data = $comment->create();
				$data["posttime"] = time();
				$data['headpic'] = $comment->headPic();
				if($_POST['replyid']){//如果有回复人
					$data["pid"] = $_POST['replyid'];
				}
				if($comment->data($data)->add()){//如果增加数据成功就读取数据以json形式返回客户端
					$data['add']  = "ok";//成功状态为1
					$data['posttime'] = date("Y-m-d   H:i:s",$data["posttime"]);
					$data['content'] = preg_replace('/\[smile_(\d*)\]/','<img style="width:30px;height:30px;margin:2px 2px auto 3px;" src="'.__ROOT__.'/Public/img/smiles/$1.gif"/>', $data['content']);
					$this->ajaxReturn($data,'JSON');
				}
			}else{//如果创建失败就返回页面
				$data['add']  = "error";//表示失败
				$data['info'] = $comment->getError();
				$this->ajaxReturn($data,'JSON');
			}
		}
	}
}