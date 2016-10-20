<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<meta name="viewport" content="width=device-width, 
                                     initial-scale=1.0, 
                                     maximum-scale=1.0, 
                                     user-scalable=no">
<meta name="author" content="笔墨"/>
<meta name="description" content="议论风生,笔墨横姿，几令读者心目俱眩，哈哈哈哈！"/>
<meta name="keywords" content="笔墨博客，个人网站，博客日志，留言系统，网络相册"/>
<link rel="shortcut icon" href="http://www.bimoxx.com/favicon.ico"/>
<link rel="bookmark" href="http://www.bimoxx.com/favicon.ico"/>
<title>相册 | 笔墨横姿，几令读者心目俱眩，一个别致的网站！</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="/bimo/Public/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="/bimo/Public/mycss/header.css" />
<script src="/bimo/Public/js/jquery.min.js"></script>
<script src="/bimo/Public/js/bootstrap.min.js"></script>
<script src="/bimo/Public/js/snow.js"></script>
<div class="y-nav">
	<div class="y-width">
		<div class="y-nav-left">
			<a href="/bimo/">笔墨</a>
		</div>
		<div class="y-nav-right">
		</div>
	</div>
</div>
<header id="header" class="container-fluid">
	<div class="container">
	<div class="row">
		<div class="col-md-3 col-sm-3 col-xs-3">
			<img class="img-responsive" src="/bimo/Public/img/title1.png">
		</div>
		<div class="col-md-9 col-sm-9 col-xs-9 m-form">
			<form role="form" action="/bimo/Search/index" method="post">
				<div class="col-sm-8 m-search">
					<div class="input-group my-col-xs-input" style="margin-top:10px">
						<input name="search" class="form-control" type="text"  placeholder="搜索" autocomplete="off" x-webkit-speech lang="zh-CN" x-webkit-grammar="bUIltin:search"/>
						<span class="input-group-btn">
							<button type="submit" class="btn btn-primary">搜索</button>
						</span>
					</div>
				</div>
				<div class="col-sm-4 hidden-xs">
					<img id="url" class="img-responsive" src="/bimo/Public/img/url.png"/>
				</div>
			</form>
		</div>
	</div>
	</div>
</header>
<nav id="nav" class="navbar navbar-default" role="navigation">
	<div class="container">
		<div class="row">
			<div class="navbar-header visible-xs">
				<a href="#" class="navbar-brand"><strong>导航栏</strong></a>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="mynav">
				<ul class="nav navbar-nav">
					<li><a href="/bimo/"><span class="glyphicon glyphicon-home nav-icon"></span>主页</a></li>
					<li><a href="/bimo/Article"><span class="glyphicon glyphicon-list-alt nav-icon"></span>文章</a></li>
					<li><a href="/bimo/Tag"><span class="glyphicon glyphicon-tags nav-icon"></span>标签</a></li>
					<li><a href="/bimo/Album"><span class="glyphicon glyphicon-picture nav-icon"></span>相册</a></li>
					<li><a href="/bimo/Speak"><span class="glyphicon glyphicon-book nav-icon"></span>微语</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-link nav-icon"></span>链接</a></li>
					<li><a href="/bimo/Guestbook"><span class="glyphicon glyphicon-comment nav-icon"></span>留言</a></li>
				</ul>
			</div>
		</div>
	</div>
</nav>
<!-- top按钮 -->
<div id="top-button"></div>
<script type="text/javascript" src="/bimo/Public/js/header.js"></script>




<link rel="stylesheet" type="text/css" href="/bimo/Public/mycss/album.css" />
<script type="text/javascript" src="/bimo/Public/js/album.js"></script>
	<div class="container">
		<div class="album">
			<h3>相册专辑</h3>
			<div class="container-fluid padding-none">
			<?php if(is_array($alibum_arr)): foreach($alibum_arr as $key=>$alibum_arr): ?><div class="m-group">
					<dl>
						<dt>
							<a href="/bimo/Album/photo/id/<?php echo ($alibum_arr['id']); ?>.html">
								<?php if($alibum_arr['imgpath']){ ?>
								<img src="<?php echo ($alibum_arr['imgpath']); ?>"/>
								<?php }else{ ?>
								<img src="/bimo/Public/img/no_pic.png"/>
								<?php } ?>
							</a>
						</dt>
						<dd class="title"><a href="#"><?php echo ($alibum_arr["name"]); ?></a></dd>
						<dd class="detail"><?php echo ($alibum_arr["photonum"]); ?>张照片</dd>
						<dd class="chuli">
							<div class="chuli-sub"><img class="ding" alt="<?php echo ($alibum_arr['id']); ?>" src="/bimo/Public/img/ding_no.png"/><span><?php echo ($alibum_arr["dingnum"]); ?></span></div>
							<div class="chuli-sub"><img class="cai" alt="<?php echo ($alibum_arr['id']); ?>" src="/bimo/Public/img/cai_no.png"/><span><?php echo ($alibum_arr["cainum"]); ?></span></div>
						</dd>
					</dl>
				</div><?php endforeach; endif; ?>
			</div>
		</div>
	</div>

<link rel="stylesheet" type="text/css" href="/bimo/Public/mycss/footer.css" />
<footer class="container-fluid">
	<div class="row" style="background-color:#333">
	<div class="container" >
	<div class="row" style="padding-top:10px">
		<p>
			<a href="#">常见问题</a>
			<a href="#">意见反馈</a>
			<a href="#">联系我们</a>
			<a href="#">关于我们</a>            
		</p>
	    <p>
				<span>Copyright © 2012-2016</span>
				<span class="hidden-xs">京ICP备11011334号</span>
				<span class="hidden-xs">京公网安备110105007294</span>
	    </p>
	    <p>
				<span>qq:1303445410</span>
				<span>微信:qi12345678</span>
				<span>微博:墨晨ol</span>
		</p>
    </div>
    </div>
    </div>
</footer>
</body>
</html>