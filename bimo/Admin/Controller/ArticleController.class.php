<?php
namespace Admin\Controller;
use Think\Page;

class ArticleController extends PublicController{
	public function __construct(){
		parent::__construct();
		$this->is_login();
	}
	//查
	public function show_article(){
		$article = M("article");
		$count = $article->count();
		//分页
		$page = new Page($count,5);
		$show = $page->show();
		$list = $article->limit($page->firstRow.','.$page->listRows)->order("id desc")->select();
		$comment = M("comment");
		for($i=0;$i<count($list);$i++){
			//$list[$i]['content'] = preg_replace('/^\<p\>\(.*)<\\p\>/',"$1",$list['content']);
			$list[$i]['comment_count'] = $comment->where("articleid={$list[$i]['id']}")->count();
		}
		$page_data=array();
		$page_data["count"]=$count;
		$page_data['page_total'] = ceil($count/5);
		$this->assign('list',$list);
		$this->assign('page_data',$page_data);
		$this->assign('show',$show);
		$this->display();
	}
	//增
	public function add_article(){
		$this->display();
	}
	public function do_add_article(){
		$arr = $_POST;
		$arr["title"] = check_title($arr["title"]);
		$arr["author"] = check_author($arr["author"]);
		if($_POST["filePath"]){//如果有图片选中
			R("Article/upload");//上传文件
			//将图片缩略图写入content
			$arr["content"] ="[img]".session("imgpath")."[/img]".$arr["content"];
		}
		//上传成功后 写入数据库
		$data["title"] = $arr["title"];
		$data["author"] = $arr["author"];
		$data["tags"] = $arr["tags"];
		$data["isrecommend"] = $arr["isrecommend"];
		$data["content"] = $arr["content"];
 		$data["posttime"] = time();
		$data["imgpath"] = session("imgpath");//imgpath不能大写  要与数据库字段对应
		$data["articlearea"] = $arr["articlearea"];
		$data["articletype"] = $arr["articletype"];
 		session("imgpath",null);//注意大小写
 		$article = D("article");
 		if($article->add($data)){//如果添加成功
 			$this->success("添加成功！",U("Article/show_article"));
 		}
		//如果发布的文章格式错误就返回并提示信息
		if(session("error")){
			header("location:add_article");
		}
	}
	//上传函数
	public function upload() {
		$upload =new \Think\Upload();//实例化上传类
		$upload->maxSize = 3145728;	//设置上传大小，字节
		$upload->exts = array('jpg','gif','png','jpeg');   //限定后缀
		$upload->savePath = '/img/';	//在根目录Uploads下
		$upload->subName = "";//将子目录设置为空 就不会有日期子目录了
		$info = $upload->upload();	//执行上传方法
		if (!$info) {
			$this->error($upload->getError());	//错误了
		}
		$imgPath = __ROOT__."/Uploads".$info['photo']["savepath"].$info['photo']['savename'];
		session("imgpath" , $imgPath);
	}
	//改
	public function upd_article(){
		if(!$_POST){
			if(!$_GET['id']){
				$this->error("非法操作");
			}
			$article = M("article");
			$art = $article->where("id = {$_GET['id']}")->select();
			$this->assign("art",$art[0]);
		}else{
			$arr = $_POST;
			//过滤
			$arr["title"] = check_title($arr["title"]);
			$arr["content"] = check_content($arr["content"]);
			//修改
			$data["title"] = $arr["title"];
			$data["tags"] = $arr["tags"];
			$data["isrecommend"] = $arr["isrecommend"];
			$data["content"] = $arr["content"];
			$data["articlearea"] = $arr["articlearea"];
			$data["articletype"] = $arr["articletype"];
			$data["recommendindex"] = $arr["recommendindex"];
			$map['id'] = $arr["artid"];
			$article = M("article");
			if($article->where($map)->data($data)->save()){
				$this->success("恭喜你，更新成功！",U("Article/show_article"));
				exit();
			}else{
				$this->error("更新失败！");
			}
		}
		$this->display();
	}
	//删
	public function del_article(){
		if($_POST['id']){
			//删除该文章
			$article = D('article');
			$imgpath = $article->where("id={$_POST['id']}")->getField("imgpath");
	 		if( $article->delete($_POST['id'])){
	 			//删除评论
	 			$comment = M("comment");
				$comment->where("articleid={$_POST['id']}")->delete();
	 			//删除服务器上对应的图片文件
				$dir=$_SERVER['DOCUMENT_ROOT'].iconv_gb2312($imgpath);//获取绝对路径
				unlink($dir);//删除文件
	 			$data['isdel'] = "ok";
	 			$this->ajaxReturn($data);
	 		}
		}
	}
}