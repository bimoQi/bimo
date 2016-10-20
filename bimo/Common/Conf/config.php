<?php
return array(
	//'配置项'=>'配置值'
	'SHOW_PAGE_TRACE' => true,	//在页面显示trace信息
	'ULR_MODLE'	=> 2,//pathinfo模式
	'MODULE_ALLOW_LIST'		=>	array('Home','Admin','Common'),	//设置允许被访问的模块
	'DEFAULT_MODULT'		=>	'Home',		//设置默认路由模块  可以不写 本身默认就是Home
	'URL_ROUTER_ON' => TRUE,//启动路由规则
	'URL_ROUTE_RULES' => array(
			
	),
	//配置静态路由
	'URL_MAP_RULES' => array(
			//'u' =>'User/index',
	),
	'URL_HTML_SUFFIX'  => 'html',  //将值设为空代表 伪静态的后缀任意  现在只能访问html后缀
	'URL_DENY_SUFFIX'	=> 'ico|png|gif|jpg',
	'TMPL_L_DELIM' => '{',  //模板定界符修改
	'TMPL_R_DELIM' => '}',
		
	//mysql配置
	'DB_TYPE'	=>	'mysql',
	'DB_USER'	=>	'root',
	'DB_PWD'	=>	'123',
	'DB_PREFIX'	=>	't_',
	'DB_DSN'	=>	'mysql:host=localhost;dbname=bimo;charset=UTF8',
		
	'TMPL_ACTION_ERROR'	=>	'./Public/tpl/error.html',
	'TMPL_ACTION_SUCCESS'	=>	'./Public/tpl/error.html',
	
);