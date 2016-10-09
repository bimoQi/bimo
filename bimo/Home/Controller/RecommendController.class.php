<?php
namespace Home\Controller;
use Think\Controller;

//博主推荐
class RecommendController extends Controller{
	public function index(){
// 		$article = D("article");
// 		$arr = $article->relation(true)->field("id,title")->order("id desc")->select();
// 		print_r($arr);
		$article = M("article");
		$condition['isrecommend'] = '1';
		$recommend = $article->where($condition)->order("recommendindex desc")->select();
		return $recommend;
	}	
}