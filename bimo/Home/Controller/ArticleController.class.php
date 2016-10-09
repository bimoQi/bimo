<?php
namespace Home\Controller;
use Think\Controller;
use Think\Page;

class ArticleController extends Controller{
	public function index(){
		$art = M("article");
		$count = $art->count();
		$page = new Page($count,5);//每页显示5行
		$show = $page->show();//$show是一条html代码
		$list = $art->limit($page->firstRow.','.$page->listRows)->order("id desc")->select();
		//添加评论数 和 处理标签
		$com = M("comment");
		for($i=0;$i<count($list);$i++){
			$condition['articleid'] = $list[$i][id];
			$list[$i]['comment_count'] = $com->where($condition)->count();
			$condition['id'] = $list[$i][id];
			$tag[$i] = $art->where($condition)->getField("tags");
			$list[$i]['tags'] = explode("|", $tag[$i]);
		}
		$page_data=array();
		$page_data["count"]=$count;
		$page_data['page_total'] = ceil($count/5);
		//S('list',null);//删除//缓存处理  缓存为php代码  如果像分页这样多数据多页的不建议用
		
		//调用博主推荐控制器获取推荐内容
		$recommend = R("Recommend/index");
		
		$this->assign ('recommend',$recommend);
		$this->assign('list',$list);
		$this->assign('page_data',$page_data);
		$this->assign('show',$show);
		$this->display("index");
	} 
}