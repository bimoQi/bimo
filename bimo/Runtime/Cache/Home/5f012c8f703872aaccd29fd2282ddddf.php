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
<title>详细内容 | 笔墨横姿，几令读者心目俱眩，一个别致的网站！</title>
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




<!-- 引入prettify插件 代码高亮 -->
<link rel="stylesheet" type="text/css" href="/bimo/Public/mycss/prettify/prettify.css" />
<script type="text/javascript" src="/bimo/Public/js/prettify/prettify.js"></script>
<link rel="stylesheet" type="text/css" href="/bimo/Public/mycss/detail.css" />

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div id="detail">
				<div class="contanier-fluid padding-none">
					<div class="head"><?php echo ($arr["title"]); ?></div>
					<div class="line"><span class="glyphicon glyphicon-user"></span> <?php echo ($arr["author"]); ?> &nbsp;&nbsp;<span class="glyphicon glyphicon-time"></span> <?php echo (date("Y-m-d H:i:s",$arr["posttime"])); ?>  &nbsp;<span class="glyphicon glyphicon-eye-open"></span>（<font color="#000"><b><?php echo ($arr["viewnum"]); ?></b></font>）<span class="glyphicon glyphicon-comment"></span>（<font color="#000"><b><?php echo ($com_count); ?></b></font>）</div>
					<div class="content"><?php echo ($arr["content"]); ?></div>
				</div>
			</div>
			<div class="change">
				<div class="container-fluid padding-none">
					<div class="col-xs-6 article-toggle">
						<?php if($pre_data["title"]){ ?>
						<a href="/bimo/Detail/index/id/<?php echo ($pre_data["id"]); ?>.html">
							<p>&lt;上一篇</p>
							<p><?php echo (my_substr($pre_data["title"],0,20)); ?></p>
						</a>
						<?php }else{ ?>
						<a>
							<p style="padding:12px">没有文章了！</p>
						</a>	
						<?php } ?>
					</div>
					<div class="col-xs-6 article-toggle">
						<?php if($next_data["title"]){ ?>
						<a href="/bimo/Detail/index/id/<?php echo ($next_data["id"]); ?>.html">
							<p>下一篇&gt;</p>		
							<p><?php echo (my_substr($next_data["title"],0,20)); ?></p>
						</a>
						<?php }else{ ?>
						<a>
							<p style="padding:12px">没有文章了！</p>
						</a>	
						<?php } ?>
					</div>
				</div>
			</div>
			<!-- 评论区 -->
			<div class="comment">
				<div class="container-fluid padding-none">
					<div class="com-title"><span class="glyphicon glyphicon-comment" style="color:green"></span> 评论区</div>
					<?php if(is_array($comment)): foreach($comment as $key=>$comm): ?><div class="container-fluid">
						<div class="media">
							<div class="peo-head pull-left">
								<img src="<?php echo ($comm["headpic"]); ?>"/>
							</div>
							<div class="media-body">
								<h5 class="media-heading">
									<input type="hidden" value="<?php echo ($comm["id"]); ?>"/>
									<div class="figure"><?php echo ($comm["nickname"]); ?></div>
									<div class="time"><?php echo (date("Y-m-d",$comm["posttime"])); ?>
									</div>
									<span><em class="text-success" style="color:#333;text-shadow:1px 1px 3px #aaa;font-weight:100;"><?php echo ($key+1); ?>#</em>&nbsp;<a href="javascript:;" class="reply">回复</a></span>
								</h5>
								<div class="peo-cont">
									<p><?php echo (smile($comm["content"])); ?></p>
								</div>
								<?php if($comm['reply']){ for($j=0; $j < count($comm['reply']); $j++){ ?>
								<div class="media reply-media">
									<div class="peo-head pull-left">
										<img src="<?php echo ($comm['reply'][$j]["headpic"]); ?>"/>
									</div>
									<div class="media-body">
										<h5 class="media-heading">
											<div class="figure"><?php echo ($comm['reply'][$j]["nickname"]); ?></div>
											<div class="time"><?php echo (date("Y-m-d ",$comm['reply'][$j]["posttime"])); ?>
											</div>
										</h5>
										<div class="peo-cont">
											<p><?php echo (smile($comm['reply'][$j]["content"])); ?></p>
										</div>
									</div>
								</div>
								<?php }} ?>
							</div>
						</div>
					</div><?php endforeach; endif; ?>
				</div>
			</div>

			<!-- 发表评论  -->
			<div  id="post_comment" class="post-comment">
				<div class="container-fluid padding-none">
					<div class="post-title"><span class="glyphicon glyphicon-edit" style="color:green"></span> 发表评论</div>
					<form name="form" class="form-horizontal" role="form" method="post">
						<div class="form-group">
							<div class="col-xs-10 col-sm-6" style="padding-left:37px">
								<input class="nickname form-control" placeholder="昵称" style="padding-left:30px" type="text" name="nickname"/>
							</div>
							<span class="col-xs-2 col-sm-6 control-label nickname-info text-left"></span>
						</div>
						<div class="form-group">
							<div class="col-xs-10 col-sm-6" style="padding-left:37px">
								<input class="email form-control" placeholder="邮箱" style="padding-left:30px" type="text" name="email"/>
							</div>
							<span class="col-xs-2 col-sm-6 control-label email-info text-left"></span>
						</div>
						<div class="form-group">
							<div class="col-xs-10 col-sm-6" style="padding-left:37px">
								<input class="website form-control" placeholder="网址（可不填）" style="padding-left:30px" type="text" name="website"/>
							</div>
							<span class="col-xs-2 col-sm-6 control-label website-info text-left"></span>
						</div>
						<div class="form-group">
							<div class="col-xs-12" style="padding:0 37px;">
								<textarea name="content" class="content form-control" placeholder="填写评论" id="content"></textarea>
							</div>
						</div>
						<div class="form-group">
							<input type="hidden" class="articleid" name="articleid" value="<?php echo ($arr["id"]); ?>"/>
							<input type="hidden" class="replyid" name="replyid">
							<div class="col-xs-10 col-sm-6" style="padding-left:37px">
								<button type="button" id="submit" class="btn btn-success btn-block" name="submit">提交</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- 加载博主推荐栏目  -->
		<!-- 推荐区 -->
<link rel="stylesheet" type="text/css" href="/bimo/Public/mycss/recommend.css" />
<div id="recommend" class="col-md-4 hidden-xs hidden-sm">
	<div class="container-fluid">
	<h3>博主推荐</h3>
	<dl>
	<?php $time = count($recommend)<7?count($recommend):7; for($i=0;$i<$time;$i++){ ?>
	<div class="container-fluid" style="padding:0">
		<dd id="hot<?php echo ($i+1); ?>" class="hot<?php echo ($i+1); ?>"><a href="/bimo/Detail/index/id/<?php echo ($recommend[$i]['id']); ?>"><?php echo ($recommend[$i]['title']); ?></a>
			<div>
				<?php for($j=0;$j < $recommend[$i]['recommendindex'];$j++){ ?>
				<img style="width:20px;height:20px;" src="/bimo/Public/img/index4.png"/>
				<?php } ?>
			</div>
		</dd>
	</div>
	<div class="container-fluid" style="padding:0">
		<dd id="hot_detail<?php echo ($i+1); ?>" class="hot-detail">
			<div class="container-fluid" style="padding:0">
				<a class="trans-img col-xs-4"  style="padding:0" href="/bimo/Detail/index/id/<?php echo ($recommend[$i]['id']); ?>"><img src="<?php echo ($recommend[$i]['imgpath']); ?>"/></a>
				<h5 class=" col-xs-8"><?php echo (my_substr($recommend[$i]['content'],0,50)); ?></h5>
			</div>
		</dd>
	</div>
	<?php } ?>
	</dl>
	</div>
</div>
<script type="text/javascript" src="/bimo/Public/js/recommend.js"></script>
	</div>
</div>
<script type="text/javascript" src="/bimo/Public/js/detail.js"></script>
<script>
// 高亮
prettyPrint();
</script>

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