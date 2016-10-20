<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $ip_data['ip_addr'] = get_client_ip();
        if($ip_data['ip_addr'] !='117.34.28.13' && $ip_data['ip_addr']!='117.34.28.15' && $ip_data['ip_addr']!='117.27.149.15' && $ip_data['ip_addr']!='117.27.149.14' && $ip_data['ip_addr']!='183.61.236.14'  && $ip_data['ip_addr']!='69.58.178.56'){
            $ip_data['name'] = get_ip_addr($ip_data['ip_addr'])['addr'];
            $ip_data['time'] = date("Y-m-d H:i:s", time());
            M('client_ip')->data($ip_data)->add();
        }
    	$article = M("article");
    	//删选动漫（推荐）
    	$techno = array();
    	$condition["articlearea"]="动漫";
    	$condition["articletype"]="新闻";
    	$recommend["recommend_news"] = $article->where($condition)->order("id desc")->select();
    	$condition["articletype"]="人物";
    	$recommend["recommend_figure"] = $article->where($condition)->order("id desc")->select();
    	//筛选技术区
    	$techno = array();
    	$condition["articlearea"]="技术";
    	$condition["articletype"]="js";
    	$techno["techno_js"] = $article->where($condition)->order("id desc")->select();
    	$condition["articletype"]="php";
    	$techno["techno_php"] = $article->where($condition)->order("id desc")->select();
    	$condition["articletype"]="linux";
    	$techno["techno_linux"] = $article->where($condition)->order("id desc")->select();
    	$condition["articletype"]="seo优化";
    	$techno["techno_seo"] = $article->where($condition)->order("id desc")->select();
    	$condition["articletype"]="其他";
    	$techno["techno_other"] = $article->where($condition)->order("id desc")->select();
    	//筛选生活区
    	$life = array();
    	$condition["articlearea"]="生活";
    	$condition["articletype"]="学习";
    	$life["life_study"] = $article->where($condition)->order("id desc")->select();
    	$condition["articletype"]="运动";
    	$life["life_sport"] = $article->where($condition)->order("id desc")->select();
    	$condition["articletype"]="旅游";
    	$life["life_travel"] = $article->where($condition)->order("id desc")->select();
    	$condition["articletype"]="实习";
    	$life["life_practice"] = $article->where($condition)->order("id desc")->select();
    	$condition["articletype"]="其他";
    	$life["life_other"] = $article->where($condition)->order("id desc")->select();

    	//最新评论
    	$comment = M("comment");
    	$comment = $comment->limit("5")->order("id desc")->select();
    	
    	//时事热点
    	$article = D("ArticleView");//视图模板 用于jion查询
    	//按 评论数x9+浏览数x2 的计算热度排名
    	$heat = $article->field("id,title,imgpath,content,(count('id')*9+viewnum*2) as heat")->order("heat desc")->group('id')->select();
    	
    	$this->assign("comment",$comment);
    	$this->assign("recommend",$recommend);
    	$this->assign("techno",$techno);
    	$this->assign("life",$life);
    	$this->assign("heat",$heat);
		$this->display();
    }
}