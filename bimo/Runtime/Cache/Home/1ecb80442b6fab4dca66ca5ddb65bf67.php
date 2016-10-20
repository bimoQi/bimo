<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" type="text/css" href="/bimo/Public/mycss/music.css" />
<div id="music" class="hidden-xs">
	<div class="player">
		<dl class="info">
			<dd>
				<div class="song-name float-left"><i class="glyphicon glyphicon-music"></i><span><?php echo ($music[0]['songname']); ?></span></div>
				<div class="song-time float-right"><i class="glyphicon glyphicon-time"></i><span></span></div>
			</dd>
			<dd>
				<div class="singer float-left"><i class="glyphicon glyphicon-user"></i><span><?php echo ($music[0]['singer']); ?></span></div>
				<div class="pattern float-right"><i class="glyphicon glyphicon-retweet"></i>顺序播放</div>
			</dd>
			<dd>
				<div class="special float-left"><i class="glyphicon glyphicon-folder-open"></i><span><?php echo ($music[0]['special']); ?></span></div>
				<div class="sing-switch float-right"><i class="glyphicon glyphicon-ban-circle"></i>歌词关闭</div>
			</dd>
		</dl>
		<div class="controller">
			<i class="glyphicon glyphicon-random" title="随机播放"></i>
			<i class="glyphicon glyphicon-backward" title="上一首" style="margin-left:50px;"></i>
			<i class="glyphicon glyphicon-forward" title="下一首" style="margin-left:140px;"></i>
			<i class="glyphicon glyphicon-retweet active" title="顺序播放" style="margin-left:50px;"></i>
		</div>
		<div class="musicbottom">
			<div class="volume">
				<i class="glyphicon glyphicon-volume-off"></i>
				<div class="move">
					<div class="volume-on"></div>
					<div class="drag"></div>
				</div>
				<i class="glyphicon glyphicon-volume-up" style="float:0px;"></i>
			</div>
			<div class="option">
				<button class="switch-btn" title="歌词">
					<span class="off"></span>
				</button> 
				<i class="glyphicon glyphicon-list list-icon" title="播放列表"></i>
			</div>
		</div>
		<img id="imgpath" src="<?php echo ($music[0]['picpath']); ?>"/>
		<div class="switch">
			<i class="glyphicon glyphicon-pause" title="暂停"></i>
		</div>
	</div>
	<div class="music-slide">
		<div>〉</div>
	</div>
</div>
<div class="container audio">
	<audio autoplay="autoplay" controls="controls">
		<source src="<?php echo ($music[0]['songpath']); ?>" type="audio/mpeg">
	</audio>
</div>
<!-- 播放列表 -->
<div class="music-list">
	<dl>
			<dd class="active">
				<img songname="<?php echo ($music[0]['songname']); ?>" 
				 singer="<?php echo ($music[0]['singer']); ?>" 
				 songpath="<?php echo ($music[0]['songpath']); ?>"
				 special="<?php echo ($music[0]['special']); ?>"
				 src="<?php echo ($music[0]['picpath']); ?>"/>
				 <?php echo ($music[0]['songname']); ?> - <?php echo ($music[0]['singer']); ?>
			</dd>
		<?php for($i=1; $i < count($music); $i++){ ?>
			<dd>
				<img songname="<?php echo ($music["$i"]["songname"]); ?>"
				  singer="<?php echo ($music["$i"]["singer"]); ?>"
				  songpath="<?php echo ($music["$i"]["songpath"]); ?>"
				  special="<?php echo ($music["$i"]["special"]); ?>"
				  src="<?php echo ($music["$i"]["picpath"]); ?>"/>
				 <?php echo ($music["$i"]["songname"]); ?> - <?php echo ($music["$i"]["singer"]); ?>
			</dd>
		<?php } ?>
	</dl>
</div>
<script src="/bimo/Public/js/music.js"></script>