<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
namespace Think\Template\TagLib;
use Think\Template\TagLib;
/**
 * Test标签库解析类  自创的
 */
class Test extends TagLib {
	protected $tags   =  array(
			'mytest'       =>  array('attr'=>'color,border','close'=>1),
	);
	/**
	 * php标签解析
	 * @access public
	 * @param array $tag 标签属性
	 * @param string $content  标签内容
	 * @return string
	 */
	public function _mytest($tag,$content) {
		$color = '';
		$border = '';
		if(isset($tag['color'])){
			$color = 'color:'.$tag['color'];
		}
		if(isset($tag['border'])){
			$border = 'border:'.$tag['border'];
		}
		$css = $color.';'.$border;
		return '<div style="'.$css.'">'.$content.'<div>';
	}
	
}