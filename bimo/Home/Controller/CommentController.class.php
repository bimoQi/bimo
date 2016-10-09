<?php
namespace Home\Controller;
use Think\Controller;

class CommentController extends Controller{
	public function post(){
		$comment = D("comment");
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