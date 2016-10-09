<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;
class SearchController extends Controller{
	public function index(){
		$search = $_POST['search']?$_POST['search']:$_GET['info'];
		$search = html($search);
		$art = M("article");
		$condition['title'] = array("like",array("%$search%"));
		$condition['tags'] = array("like",array("%$search%"));
		$condition['_logic'] = "or";
		$count = $art->where($condition)->count();
		$page = new Page($count,5);//每页显示5行
		$show = $page->show();//$show是一条html代码
		$list = $art->where($condition)->limit($page->firstRow.','.$page->listRows)->order("id desc")->select();
		unset($condition);
		//添加评论数 和 处理标签
		$com = M("comment");
		for($i=0;$i<5;$i++){
			if($list[$i]){
			$condition['articleid'] = $list[$i][id];
			$list[$i]['comment_count'] = $com->where($condition)->count();
			$condition['id'] = $list[$i][id];
			$tag[$i] = $art->where($condition)->getField("tags");
			$list[$i]['tags'] = explode("|", $tag[$i]);
			unset($condition);
			}
		}
		$page_data=array();
		$page_data["count"]=$count;
		$page_data['page_total'] = ceil($count/5);
		
		//调用博主推荐控制器获取推荐内容
		$recommend = R("Recommend/index");
		
		$this->assign ('recommend',$recommend);
		$this->assign("search",$search);
		$this->assign('list',$list);
		$this->assign('page_data',$page_data);
		$this->assign('show',$show);
		$this->display("index");
	}
}