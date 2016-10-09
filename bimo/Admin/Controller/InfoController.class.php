<?php
namespace Admin\Controller;

class InfoController extends PublicController{
	public function __construct(){
		parent::__construct();
		$this->is_login();
	}
	private function getFileInfo(){
		if(@ini_get("file_uploads")) {
			$fileupload = "允许 - 文件 ".ini_get("upload_max_filesize")." - 表单：".ini_get("post_max_size");
		} else {
			$fileupload = '<span style="color:red">禁止</font>';
		}
		return $fileupload;
	}
	private function getCurlVersion() {//curl的原理是模拟浏览器的操作，它的效率要比file_get_contents()高出四倍以上
		if (extension_loaded('curl')) {
			$arr = curl_version();
			return $arr['version'] . ' | ' . $arr['ssl_version'] . ' | host: ' . $arr['host'];
		}
		return '<span style="color:red">不支持</span>';
	}
	public function index(){
		$info = array(
			"运行系统" => PHP_OS,
			"服务器标识" => $_SERVER['SERVER_SOFTWARE'],
			"主机名" => $_SERVER['SERVER_NAME'],
			"ip地址" => $_SERVER['REMOTE_ADDR'],
			"服务器端口" => $_SERVER['SERVER_PORT'],
			"PHP版本" => PHP_VERSION,
			"文件信息" => $this->getFileInfo(),
			"CURL" => $this->getCurlVersion(),
			"GD库版本" => gd_info() ? gd_info()['GD Version'] : '<span style="color:red">未知</span>',
			"MySql版本" => mysql_get_server_info(),
		);
		
		$this->assign('info',$info);
		$this->display();
	}
} 