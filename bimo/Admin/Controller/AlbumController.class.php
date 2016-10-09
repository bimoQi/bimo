<?php
namespace Admin\Controller;
use Think\Page;

class AlbumController extends PublicController{
	public function __construct(){
		parent::__construct();
		$this->is_login();
	}
	public function index(){
		$album = M("album");
		$count = $album->count();
		//分页
		$page = new Page($count,10);
		$show = $page->show();
		$list = $album->limit($page->firstRow.','.$page->listRows)->select();
		$page_data=array();
		$page_data["count"]=$count;
		$page_data['page_total'] = ceil($count/10);
		$this->assign('list',$list);
		$this->assign('page_data',$page_data);
		$this->assign('show',$show);
		$this->display();
	}
	//编辑相册
	public function edit_album(){
		if($_GET["id"]){
			$photo = M("photo");
			$condition["pid"] = $_GET["id"];
			$count = $photo->where($condition)->count();
			//分页
			$page = new Page($count,7);
			$show = $page->show();
			$list = $photo->where($condition)->limit($page->firstRow.','.$page->listRows)->select();
			
			$page_data=array();
			$page_data["count"]=$count;
			$page_data['page_total'] = ceil($count/7);
			$this->assign('list',$list);
			$this->assign('page_data',$page_data);
			$this->assign('show',$show);
			//查找相册名称
			$album = M("album");
			unset($condition);
			$condition["id"] = $_GET["id"];
			$album_name = $album->where($condition)->getField("name");
			$this->assign("album_name",$album_name);
			$this->assign("list",$list);
			$this->display("Album/edit_album");
		}else{
			exit("非法操作！");
		}
	}
	//添加相册
	public function add_album(){
		if(session("error")){
			$this->assign("error",session("error"));
			$this->assign("album_name",session("album_name"));
			session("error",null);
			session("album_name",null);
		}
		$this->display();
	}
	public function do_add_album(){
		if($_POST['album']){
			$album = M("album");
			//查看有没有相同值
			$data["name"] = trim($_POST['album']);
			if(!$album->where($data)->select()){
				if($album->data($data)->add()){
					$this->success("添加成功",U("Album/index"));
				}else 
					$this->error("添加失败",U("Album/add_album"));
			}else{
				session("error","该相册已经拥有请重新添加!");
				session("album_name",$_POST['album']);
				header("location:add_album");
			}
		}else{
			session("error","添加内容不符合");
			header("location:add_album");
		}
	}
	//删除相册
	public function del_album(){
		if($_POST['id']){
			$album = M("album");
			$file_name = $album->where("id = {$_POST['id']}")->getField("name");//得到相册名 用来删除目录
			if($album->delete($_POST['id'])){
				//删除相册下对应的所有图片
				$photo = M("photo");
				$photo->where("pid = {$_POST['id']}")->delete();
				//删除目录
				$dir = APP_PATH."Uploads/album/".$file_name;
				$dir = iconv_gb2312($dir);//获取绝对路径
				deldir($dir);//删除文件夹函数
				$data["isdel"] = "ok";
				$this->ajaxReturn($data);
			}
		}
	}
	//上传图片
	public function add_photo(){
		$album = M("album");
		$album_arr = $album->select();
		$this->assign("album_arr",$album_arr);
		if(session("info")){
			$this->assign("info",session("info"));
			session("info",null);
		}
		$this->display("Album/add_photo");
	}
	//上传图片操作
	public function upload() {
		$sbu_path_utf8 = $_POST['album'];
		$sbu_path_gb2312 = iconv_gb2312($_POST['album']);//路径转化为中文的
		$upload =new \Think\Upload();//实例化上传类
		$upload->maxSize = 3145728;	//设置上传大小，字节
		$upload->replace = true;//同名文件覆盖
		$upload->exts = array('jpg','gif','png','jpeg');   //限定后缀
		$upload->savePath = '/album/'.$sbu_path_gb2312.'/';	//在根目录Uploads下
		$upload->subName = "";//将子目录设置为空 就不会有日期子目录了
		$info = $upload->upload();	//执行上传方法
		if (!$info) {
			$this->error($upload->getError());	//错误了
		}
		$imgPath = __ROOT__."/Uploads".$info['photo']["savepath"].$info['photo']['savename'];
		//保存数据库
		$photo = M("photo");
		$data["name"] = $info['photo']['savename'];
		$data["imgpath"] = iconv_utf8($imgPath);
		$data["imgsize"] = round($info["photo"]["size"]/1024,2)."kb";
		$data["describe"] = $_POST['describe'] ? $_POST['describe'] : "暂无描述";
		$data["posttime"] = time();
		//查找对应相册id
		$album = M("album");
		$condition["name"] = $sbu_path_utf8;
		$pid = $album->where($condition)->getField("id");
		$data["pid"] = $pid;
		if($photo->data($data)->add()){
			//上传成功后相册中photonum字段加1
			$map["id"] = $pid;
			$album-> where( $map )-> setInc ( 'photonum', 1 ); // 累加 
			$info["success"] = "恭喜你！上传成功！继续上传";
			$info["album_data"] = $sbu_path_utf8;
			session("info",$info);
			R("album/add_photo");
		}else{
			print_r($photo->getError());
		}
	}
	//删除图片
	public function del_photo(){
		if($_POST['id']){
			$photo = M("photo");
			$pid = $photo->where("id = {$_POST['id']}")->getField("pid");//查询出其相册id
			$imgpath = $photo->where("id = {$_POST['id']}")->getField("imgpath");
			if($photo->delete($_POST['id'])){
				//删除图片后相册中photonum字段减1
				$album = M("album");
				$map["id"] = $pid;
				$album->where($map)->setDec('photonum',1); // 累减
				//删除服务器上的图片文件
				$dir=$_SERVER['DOCUMENT_ROOT'].iconv_gb2312($imgpath);//获取绝对路径
				unlink($dir);//删除文件
				$data["isdel"] = "ok";
				$this->ajaxReturn($data);
			}
		}
	}
}
