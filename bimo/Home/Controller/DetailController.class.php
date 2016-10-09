<?php

namespace Home\Controller;

use Think\Controller;

class DetailController extends Controller {
	public function index($id) {
		$detail = M ( "article" );
		// print_r($detail->where("id<$id")->order("id desc")->limit(1)->getField("id"));
		// 每次浏览页面浏览数累加1
		$detail->find ( $id ) or die ( "参数错误！" ); // 如果没有id退出
		$map ['id'] = $id;
		$detail->where ( $map )->setInc ( 'viewnum', 1 ); // 累加 setDec累减
		// 查询上一条数据
		if ($id > 1) {
			$pre_data = $detail->where ( "id=" . $detail->where ( "id<$id" )->order ( "id desc" )->limit ( 1 )->getfield ( "id" ) )->select ();
		}
		if ($id < $detail->order ( "id desc" )->limit ( 1 )->getField ( "id" )) {
			// 查询下一条数据
			$next_data = $detail->where ( "id=" . $detail->where ( "id>$id" )->limit ( 1 )->getfield ( "id" ) )->select ();
		}
		// 查询当前id对应的评论
		$comment = M ( "comment" );
		$condition ['articleid'] = $id;
		$condition ['pid'] = 0;
		$comment = $comment->where ( $condition )->select ();
		//查询回复评论
		for($i=0; $i<count($comment); $i++){
			$condition['pid'] = $comment[$i]['id'];
			$r_comment = M ( "comment" )->where ( $condition )->select ();
			for($j=0; $j<count($r_comment); $j++){
				$comment[$i]['reply'][] = $r_comment[$j];
				//print_r($comment[$r_comment[$i]['pid']]);
			}
		}
		$com_count = count ( $comment ); // 查询当前id对应的评论数量
		// 查询当前id所对应的数据
		$arr = $detail->where ( "id=$id" )->select ();
		$arr [0] ['content'] = preg_replace ( '/\[img\](.*)\[\/img\]/', '<img class="detail-img img-responsive" src="$1"/><br/>', $arr [0] ['content'] );
		$arr [0] ['content'] = preg_replace ( '/\[view\](.*)\[\/view\]/', '<embed style="width:480px;height:400px;" src="\1">', $arr [0] ['content'] );
		$arr [0] ['content'] = preg_replace ( '/\[code\]/', '<pre class="prettyprint linenums:1" >', $arr [0] ['content'] );
		$arr [0] ['content'] = preg_replace ( '/\[\/code\]/', "</pre>", $arr [0] ['content'] );
		
		//调用博主推荐控制器获取推荐内容
		$recommend = R("Recommend/index");
		
		$this->assign ('recommend',$recommend);
		$this->assign ( 'arr', $arr [0] );
		$this->assign ( 'pre_data', $pre_data [0] );
		$this->assign ( 'next_data', $next_data [0] );
		$this->assign ( 'comment', $comment );
		$this->assign ( 'com_count', $com_count );
		$this->display ();
	}
}
