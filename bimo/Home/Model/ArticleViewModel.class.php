<?php
namespace Home\Model;
use Think\Model\ViewModel;

class ArticleViewModel extends ViewModel{
	//使用关联查询，显示 User 表且包含 Card 表关联的数据，未关联的则忽略。
	//如果想把未关联的查询出来，可以使用 LEFT 左查询。
	public $viewFields = array(
			//表名不包括前缀 => array(字段)
			'Article'=>array('id','title','imgpath','content','viewnum','_type'=>'LEFT'),
			'Comment'=>array('_on'=>'Comment.articleid=Article.id'),
			//'Content'=>array('content', '_on'=>'User.id=Content.uid'),
	);
}