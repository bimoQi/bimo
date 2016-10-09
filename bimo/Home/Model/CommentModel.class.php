<?php
namespace Home\Model;
use Think\Model;
class CommentModel extends Model{
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
	//随机创建头像
	public function headPic(){
		if($_POST['headpic'] == 'null' || !$_POST['headpic']){
			$num = mt_rand(1, 9);
			$this->head_url = __ROOT__.'/Public/img/header/header_'.$num.'.jpg';
		}else{
			$this->head_url = $_POST['headpic'];
		}
		return $this->head_url;
	}
}


