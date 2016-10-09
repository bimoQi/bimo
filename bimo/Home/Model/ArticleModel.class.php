<?php
namespace Home\Model;
use Think\Model\RelationModel;
class ArticleModel extends RelationModel{
	//文章对评论数是一对一 has_one   文章对评论内容是一对多 has_many  这里是一对一
	protected $_link = array(
			'Comment' => array(
					'mapping_type'=>self::HAS_ONE,
					'mapping_name'=>'commentnum',
					'class_name'=>'Comment',
					'foreign_key'=>'articleid',
					'mapping_fields'=>'count(`content`) as commentnum',
					'as_fields'=>'commentnum',
		),
	);
}
