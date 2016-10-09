<?php
namespace Admin\Model;
use Think\Model\RelationModel;

class ArticleModel extends RelationModel{
	protected $_link = array(
// 			'Articletype' => array(
// 					'mapping_type'=>self::HAS_ONE,//一对一模式 拥有关系 关联关系用户表里没有任何Articletype信息
// 					'class_name' => 'Articletype',//对应到相关数据表
// 					'mapping_name'=>'Articletype',//数据组
// 					'foreign_key'=>'parentid',//关联外键的名称，会自动对应到当前数据表的id
// 					'mapping_fields'=>'typename',//关联要查询的字段，默认是所有字段
// 					'as_fields'=>'typename', //将关联字段映射到同级字段
// 					//'condition'=>1,//值关联第一个字段
// 			),
	);
}