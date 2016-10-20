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
<title>议论风生 | 笔墨横姿，几令读者心目俱眩，一个别致的网站！</title>
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




<link rel="stylesheet" type="text/css" href="/bimo/Public/mycss/index.css" />
<script type="text/javascript" src="/bimo/Public/js/index.js"></script>
<!-- 加载轮播插件 -->
<link rel="stylesheet" type="text/css" href="/bimo/Public/mycss/carousel/slick.min.css" />
<link rel="stylesheet" type="text/css" href="/bimo/Public/mycss/carousel/slick-theme.min.css" />
<link rel="stylesheet" type="text/css" href="/bimo/Public/mycss/carousel/index.css" />
<div class="container">
	<div class="slideshow">
	  <div class="slider">
		<div class="item">
		  <img class="img-responsive" src="/bimo/Public/img/1.jpg" />
		</div>
		<div class="item">
		  <img class="img-responsive" src="/bimo/Public/img/2.jpg" />
		</div>
		<div class="item">
		  <img class="img-responsive" src="/bimo/Public/img/3.jpg" />
		</div>
	  </div>
	</div>
</div>
<!-- 轮播js -->
<script src='/bimo/Public/js/carousel/slick.min.js'></script>
<script src='/bimo/Public/js/carousel/index.js'></script>

<section class="container  hidden-xs">
	<div class="row" id="content">
		<!-- 标语banner 切换 -->
		<div id="content_left" class="col-md-4 col-sm-4 col-lg-4" style="padding-left:0">		
			<div class="banner">
			         <img id="ban_img1" class="active img-responsive" src="/bimo/Public/img/4.jpg" alt="秦时明月"/>		
			         <img id="ban_img2" class="img-responsive" src="/bimo/Public/img/5.jpg" alt="秦时明月"/>		
			         <img id="ban_img3" class="img-responsive" src="/bimo/Public/img/6.jpg" alt="秦时明月"/>
			</div>	
			<div class="shadow">
			<!-- 因为float是靠右的所有dot就是倒着排的 -->
					<span id="ban_dot3" class="dot"></span>
					<span id="ban_dot2" class="dot"></span>
					<span id="ban_dot1" class="dot dot-active"></span>
					<span id="ban_title1" class="title active">少司命</span>
					<span id="ban_title2" class="title">章邯</span>
					<span id="ban_title3" class="title">秦时明月</span>
			</div>
		</div>
		<!-- 推荐的动漫 -->
		<div id="content_right" class="col-md-8 col-sm-8 col-lg-8">
			<div class="news col-md-5 col-sm-5">
				<dl>
					<?php if(is_array($recommend['recommend_news'])): foreach($recommend['recommend_news'] as $key=>$vo): ?><dd><a href="/bimo/Detail/index/id/<?php echo ($vo['id']); ?>.html"><?php echo (my_substr($vo['title'],0,20)); ?></a></dd><?php endforeach; endif; ?>
				</dl>
			</div>
			<?php if(is_array($recommend['recommend_figure'])): foreach($recommend['recommend_figure'] as $key=>$vo): ?><div class="figure col-md-7 col-sm-7">
					<div class="figure-picture col-md-6 col-sm-6" id="picture1">
						<a href="/bimo/Detail/index/id/<?php echo ($vo['id']); ?>.html"><img class="img-responsive" src="<?php echo ($vo['imgpath']); ?>"></a>
					</div>
					<div class="describe col-md-6 col-sm-6">
						<dl>
							<dt><a href="/bimo/Detail/index/id/<?php echo ($vo['id']); ?>.html"><?php echo ($vo['title']); ?></a></dt>
							<dd><?php echo (my_substr(remove_pic($vo['content']),0,60)); ?></dd>
						</dl>
					</div>
				</div><?php endforeach; endif; ?>
		</div>
	</div>
</section>
<script type="text/javascript" src="/bimo/Public/js/carousel.js"></script> 

<div class="container">
	<!-- 技术区 -->
	<div id="technology" class="col-md-8 col-xs-12" style="padding-bottom:10px;">
		<div class="head">
				<div class="area-title">技术</div>
				<h4  class="sub col-xs-2" style="background:#67C39C" onclick="techno_change(0)">js</h4>
				<h4  class="sub col-xs-2" style="color:#67C39C;" onclick="techno_change(1)">php</h4>
				<h4  class="sub col-xs-2" style="color:#67C39C;" onclick="techno_change(2)">linux</h4>
				<h4  class="sub col-xs-3 col-sm-2" style="color:#67C39C;" onclick="techno_change(3)">seo优化</h4>
				<h4  class="sub col-xs-2" style="color:#67C39C;" onclick="techno_change(4)">其他</h4>
				<a class="hidden-xs">更多</a>
		</div>
		<div  class="detail">
				<?php if(is_array($techno)): foreach($techno as $key=>$vo): ?><div id="<?php echo ($key); ?>">
					<div class="container-fluid img">
							<?php for($i=0;$i < (count($vo)<4?count($vo):4);$i++){ ?>
								<?php if($vo[$i][imgpath]){ ?>
									<div class="col-sm-3 col-xs-6" style="text-align:center">
										<div class="img-sub" onmouseover="pic_manage_over(this)" onmouseout="pic_manage_out(this)" >
											<a href="/bimo/Detail/index/id/<?php echo ($vo["$i"]["id"]); ?>.html"><span><?php echo (mb_substr($vo["$i"]["title"],0,20,'UTF-8')); ?></span><img src="<?php echo ($vo["$i"]["imgpath"]); ?>"/></a>
										</div>
									</div>
								<?php }else{ ?>
									<div class="col-sm-3 col-xs-6" style="text-align:center">
										<div class="img-sub" onmouseover="pic_manage_over(this)" onmouseout="pic_manage_out(this)">
											<a href="/bimo/Detail/index/id/<?php echo ($vo["$i"]["id"]); ?>.html"><span><?php echo (mb_substr($vo["$i"]["title"],0,20,'UTF-8')); ?></span><img src="/bimo/Public/img/no_pic.png"/></a>
										</div>
									</div>
								<?php } ?>
							<?php } ?>
					</div>
					<div class="area-caption container-fluid" style="padding-bottom:30px">
						<dl>
						<?php for($i=4;$i < (count($vo)<14?count($vo):14);$i++){ ?>	
							<div class="col-xs-12 col-sm-6 col-md-4">
								<dd class="col-xs-10 text-overflow"><a href="/bimo/Detail/index/id/<?php echo ($vo["$i"]["id"]); ?>.html"><?php echo (mb_substr($vo["$i"]["title"],0,20,'UTF-8')); ?> </a></dd>
							</div>
						<?php } ?>
						</dl>
					</div>
				
				</div><?php endforeach; endif; ?>
		</div>
	</div>

	<!-- 时事热点 -->
	<div class="col-md-4 hidden-xs hidden-sm" style="padding-right:0">
		<div id="hotsport">
			<h4>时事热点</h4>
			<dl>
			<?php for($i=0;$i<(7>count($heat)?count($heat):7);$i++){ ?>
				<dd id="hot<?php echo ($i+1); ?>" class="hot<?php echo ($i+1); ?> text-overflow"><span><?php echo ($heat[$i]['heat']); ?></span><a href="/bimo/Detail/index/id/<?php echo ($heat[$i]['id']); ?>.html"><?php echo ($heat[$i]['title']); ?></a></dd>
				<dd id="hot_detail<?php echo ($i+1); ?>" class="hot-detail"><a href="/bimo/Detail/index/id/<?php echo ($heat[$i]['id']); ?>.html"><div><img src="<?php echo ($heat[$i]['imgpath']); ?>"/></div></a><h5><?php echo (my_substr($heat[$i]['content'],0,50)); ?></h5></dd>
			<?php } ?>
			</dl>
		</div>
	</div>
</div>
<script type="text/javascript" src="/bimo/Public/js/hotsport.js"></script>

<div class="container">
	<!-- 生活区 -->
	<div id="life" class="col-md-8 col-xs-12" style="padding-bottom:10px;">
		<div class="head">
					<div class="area-title">生活</div>
					<h4  class="sub col-xs-2" style="background:#67C39C" onclick="life_change(0)">学习</h4>
					<h4  class="sub col-xs-2" style="color:#67C39C;" onclick="life_change(1)">旅游</h4>
					<h4  class="sub col-xs-2" style="color:#67C39C;" onclick="life_change(2)">运动</h4>
					<h4  class="sub col-xs-2" style="color:#67C39C;" onclick="life_change(3)">实习</h4>
					<h4  class="sub col-xs-2" style="color:#67C39C;" onclick="life_change(4)">其他</h4>
					<a class="hidden-xs">更多</a>
		</div>
		<div  class="detail">
			<?php if(is_array($life)): foreach($life as $key=>$vo): ?><div id="<?php echo ($key); ?>">
				<div class="container-fluid img">
						<?php for($i=0;$i < (count($vo)<4?count($vo):4);$i++){ ?>
							<?php if($vo[$i][imgpath]){ ?>
								<div class="col-sm-3 col-xs-6" style="text-align:center">
									<div class="img-sub" onmouseover="pic_manage_over(this)" onmouseout="pic_manage_out(this)" >
										<a href="/bimo/Detail/index/id/<?php echo ($vo["$i"]["id"]); ?>.html"><span><?php echo (mb_substr($vo["$i"]["title"],0,20,'UTF-8')); ?></span><img src="<?php echo ($vo["$i"]["imgpath"]); ?>"/></a>
									</div>
								</div>
							<?php }else{ ?>
								<div class="col-sm-3 col-xs-6" style="text-align:center">
									<div class="img-sub" onmouseover="pic_manage_over(this)" onmouseout="pic_manage_out(this)">
										<a href="/bimo/Detail/index/id/<?php echo ($vo["$i"]["id"]); ?>.html"><span><?php echo (mb_substr($vo["$i"]["title"],0,20,'UTF-8')); ?></span><img src="/bimo/Public/img/no_pic.png"/></a>
									</div>
								</div>
							<?php } ?>
						<?php } ?>
				</div>
				<div class="area-caption container-fluid" style="padding-bottom:30px">
					<dl>
					<?php for($i=4;$i < (count($vo)<14?count($vo):14);$i++){ ?>	
						<div class="col-xs-12 col-sm-6 col-md-4">
							<dd class="col-xs-10 text-overflow"><a href="/bimo/Detail/index/id/<?php echo ($vo["$i"]["id"]); ?>.html"><?php echo (mb_substr($vo["$i"]["title"],0,20,'UTF-8')); ?> </a></dd>
						</div>
					<?php } ?>
					</dl>
				</div>
			
			</div><?php endforeach; endif; ?>
		</div>
	</div>
	<!-- 最新评论-->
	<div class="col-md-4 hidden-xs hidden-sm" style="padding-right:0">
		<div id="new-comment">
			<h4>最新评论</h4>
			<?php if(is_array($comment)): foreach($comment as $key=>$comm): ?><div class="container-fluid">
					<img src="<?php echo ($comm['headpic']); ?>" class="col-xs-3" style="padding:0"></img>
					<dl class="col-xs-9" style="height:70px">
						<dd class="comment-user"><b><?php echo ($comm["nickname"]); ?></b>&nbsp;在 <a href="/bimo/Detail/index/id/<?php echo ($comm["articleid"]); ?>"><?php echo my_article($comm['articleid']);?></a> 于<?php echo my_time($comm['posttime']);?>前：</dd>
						<dd class="comment-content"><?php echo (smile(my_substr($comm["content"],0,10))); ?></dd>
					
					</dl>
				</div><?php endforeach; endif; ?>
		</div>
	</div>
</div>
<script type="text/javascript" src="/bimo/Public/js/change/change.js"></script>
<!-- 添加音乐部件 -->
<?php echo W('Music/index');?>

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