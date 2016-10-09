<?php
namespace Home\Widget;
use Think\Controller;
class MusicWidget extends Controller {
	public function index(){
		if(!isMobile()){
			$music = M("music");
			$music = $music->select();
			$this->assign('music',$music);
			$this->display('Widget:music');
		}
	}
}