<?php
namespace Home\Model;
use Think\Model;
class TestModel extends Model{
	protected $patchValidate = true;
	protected $_validate = array(
			array('user','require','user不得为空！'),
			array('id','email','id不得为空！'),
	);
}