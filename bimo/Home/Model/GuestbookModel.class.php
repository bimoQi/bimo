<?php
namespace Home\Model;
use Think\Model;

class GuestbookModel extends Model{
	protected $patchValidate = true;
	protected $_validate = array(
			array('nickname','require','昵称不得为空！'),
			array('nickname','checkChar','昵称不得有空格或者特殊字符！',0,'callback',3),
			array('nickname','checkLength','必须在2到10个字符！',0,'function',3,array(2,10)),//0表示有字段时验证3代表新增和编辑时验证，array参数代表传了方法两个参数
			array('email','require','邮箱不能为空'),
			array('email','email','邮箱格式不正确'),
			array('website','url','网址不合法',2),//2表示值不为空时验证
			array('content','require','发表内容不得为空'),
	);
	protected function checkChar($str){
		if(preg_match_all('/[\s|`|\/|\(|\)|-|=|$|!|#|%|^|~|*]/', $str) >= 1){
			return false;
		}else
			return true;
	}
	public function __construct(){
		parent::__construct('guestbook');
	}
	//随机创建头像
	public function headPic(){
		$num = mt_rand(1, 9);
		$this->head_url = __ROOT__.'/Public/img/header/header_'.$num.'.jpg';
		return $this->head_url;
	}
	//得到留言人  根据评论的次数排序
	public function getGuestbook(){
		$arr = $this->order('id desc')->select();
		$count = count($arr);
		for($i=0; $i<$count; $i++){
			$arr[$i]['num'] = 1;
		}
		$arr1 = $arr;
		for($i=0; $i<$count; $i++){
			$email = $arr1[$i]['email'];
			for($j=$i+1; $j<$count;$j++){
				if($arr[$j]['email'] == $email){
					unset($arr[$j]);
					$arr[$i]['num']++;
				}
			}
		}
		foreach($arr as $key1=>$value1){
			foreach($arr as $key2=>$value2){
				if($key2<$key1) continue;
				if($arr[$key1]['num'] < $arr[$key2]['num']){
					list($arr[$key2],$arr[$key1]) = array($arr[$key1],$arr[$key2]);
				}
			}
		}
		return $arr;
	}
	//查询全部评论
	public function getAllGuestbook(){
		$condition ['pid'] = 0;
		$count = $this->count();
		$page = new \Think\Page($count,5);//每页显示5行
		$show = $page->show();//$show是一条html代码
		$comment = $this->where($condition)->limit($page->firstRow.','.$page->listRows)->order("id desc")->select();
		//查询回复评论
		$com_count = count($comment);
		for($i=0; $i<$com_count; $i++){
			$condition['pid'] = $comment[$i]['id'];
			$r_comment = M ( "guestbook" )->where ( $condition )->select ();
			for($j=0; $j<count($r_comment); $j++){
				$comment[$i]['reply'][] = $r_comment[$j];
			}
		}
		$count_pid = $this->where('pid=0')->count();
		return array($comment,$show,$count,$count_pid);
	}
}