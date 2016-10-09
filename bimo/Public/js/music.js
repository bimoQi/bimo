if($("body").innerWidth() > 670){
		
	var audio = $("audio")[0];
	audio.volume = 0.5; //初始化音量
	//可以播放时
	audio.oncanplay=function(){
		$(".switch i").removeClass("glyphicon-play").addClass("glyphicon-pause");
	}
	//控制控制器的显示与隐藏
	$(".music-slide").click(function(){
		if((parseInt($("#music").css('left')) == 0) && (parseInt($("#music").css('bottom')) > 80)){
			$('.music-list').animate({left:'-=378px'},500,function(){
				$("#music").animate({bottom:'-=280px'},1000,function(){
					$("#music").animate({
						left:'-=370px',
					},1000);
					$(".music-slide div").css({
						transform:'rotate(180deg)',
					});
				});
			});
		}else if(parseInt($("#music").css('left')) == 0){
			$("#music").animate({
				left:'-=370px',
			},1000);
			$(".music-slide div").css({
				transform:'rotate(180deg)',
			});
		}else{
			$("#music").animate({
				left:'+=370px',
			},1000);
			$(".music-slide div").css({
				transform:'rotate(0deg)',
			});
		}
	});
	//控制音量
	var down=false;//鼠标没按下
	$(".drag").mousedown(function(){
		$("#music").css('cursor','pointer');
		down=true;
	});
	$(document).mouseup(function(){
		down=false;
		$("#music").css('cursor','');
	});
	$(".move").delegate('.drag','mousemove',function(){ 
		$(document).mousemove(function(e){
			if(down){
				var X = e.pageX;
				var mouse = X-10;
				var minVolume = 30;
				var maxVolume = 122;
				var number = 0;//音量
				if(mouse<=minVolume){
					$(".drag").stop().animate({left:minVolume},0);
					$(".volume-on").css("width",'0%');
				}else if(mouse>=maxVolume){
					$(".drag").stop().animate({left:maxVolume},0);
					$(".volume-on").css("width",'100%');
					number = 1;
				}else{
					$(".drag").stop().animate({left:mouse},0);
					number = (mouse-30)/(maxVolume-minVolume);
					$(".volume-on").css("width",''+number*100+'%');
				}
				audio.volume = number;
			}
		});
	});
	//控制播放时间
	var maxduration = 0;//设置音频时长
	audio.ondurationchange=function(){  //当音频加载完成后
		maxduration = audio.duration;
		m = parseInt(maxduration%60)<10 ? '0'+parseInt(maxduration%60) :parseInt(maxduration%60);
		f = parseInt(maxduration/60)<10 ? '0'+parseInt(maxduration/60) :parseInt(maxduration/60);
		//s = parseInt(maxduration/1200)<10 ? '0'+parseInt(maxduration/1200) :parseInt(maxduration/1200);
		maxduration = f+':'+m;
	}
	audio.ontimeupdate=function(){ //当播放位置发生改变时触发（实时监控）
		var currentTime = audio.currentTime;
		m = parseInt(currentTime%60)<10 ? '0'+parseInt(currentTime%60) :parseInt(currentTime%60);
		f = parseInt(currentTime/60)<10 ? '0'+parseInt(currentTime/60) :parseInt(currentTime/60);
		currentTime = f+':'+m;
		$('.song-time span').html(currentTime+'/'+maxduration);
	}
	//控制歌词
	$(".switch-btn").click(function(){
		if($(this).children().hasClass("off")){
			$(this).children().removeClass().addClass("on");
			$(this).css("backgroundColor",'green');
			$('.sing-switch').html('<i class="glyphicon glyphicon-ok-circle"></i>歌词开启');
		}else{
			$(this).children().removeClass().addClass("off");
			$(this).css("backgroundColor",'');
			$('.sing-switch').html('<i class="glyphicon glyphicon-ban-circle"></i>歌词关闭');
		}
	});
	//控制播放、暂停
	$('.switch').click(function(){
		if($(this).children().hasClass("glyphicon-play")){
			$(this).children().removeClass("glyphicon-play").addClass("glyphicon-pause").attr("title","暂停");
			audio.play();
		}else{
			$(this).children().removeClass("glyphicon-pause").addClass("glyphicon-play").attr("title","播放");
			audio.pause();
		}
	});
	//控制播放模式
	var pattern = 0;//0顺序播放 1随机播放
	$('.glyphicon-random').click(function(){
		$(this).addClass('active');
		$('.glyphicon-retweet').removeClass('active');
		$('.pattern').html('<i class="glyphicon glyphicon-random"></i>随机播放');
		pattern = 1;
	});
	$('.glyphicon-retweet').click(function(){
		$(this).addClass('active');
		$('.glyphicon-random').removeClass('active');
		$('.pattern').html('<i class="glyphicon glyphicon-retweet"></i>顺序播放');
		pattern = 0;
	});
	audio.onended = function(){ //播放完成后自动播放下一首
		if(pattern == 0){ 
			var nextsong = $(".music-list dl dd[class='active']").removeClass("active")
			.next().addClass("active")
			.children().attr("songpath");
		}else{
			var oldsong = $(".music-list dl dd[class='active']").removeClass("active");
			var num = parseInt(Math.random()*$(".music-list dl dd").length);
			var nextsong = $(".music-list dl dd:eq("+num+")" ).addClass("active")
			.children().attr("songpath");
		}
		$("audio").html('<source src="'+nextsong+'" type="audio/mpeg">');
		audio.load();//重新加载音乐
		update(); //更新控制信息
	}
	//下一首
	$('.glyphicon-forward').click(function(){
		if(pattern == 0){ 
			var nextsong = $(".music-list dl dd[class='active']").removeClass("active")
			.next().addClass("active")
			.children().attr("songpath");
		}else{
			var oldsong = $(".music-list dl dd[class='active']").removeClass("active");
			var num = parseInt(Math.random()*$(".music-list dl dd").length);
			var nextsong = $(".music-list dl dd:eq("+num+")" ).addClass("active")
			.children().attr("songpath");
		}
		//如果没有音乐了
		if(!nextsong){
			$(".music-list dl dd[class='active']").removeClass("active");
			nextsong = $(".music-list dl dd:first-child").addClass("active").children().attr("songpath");
		}
		$("audio").html('<source src="'+nextsong+'" type="audio/mpeg">');
		audio.load();//重新加载音乐 
		update(); //更新控制信息
	});
	//上一首
	$('.glyphicon-backward').click(function(){
		if(pattern == 0){ 
			var prevsong = $(".music-list dl dd[class='active']").removeClass("active")
			.prev().addClass("active")
			.children().attr("songpath");
		}else{
			var oldsong = $(".music-list dl dd[class='active']").removeClass("active");
			var num = parseInt(Math.random()*$(".music-list dl dd").length);
			var prevsong = $(".music-list dl dd:eq("+num+")" ).addClass("active")
			.children().attr("songpath");
		}
		//如果没有音乐了
		if(!prevsong){
			$(".music-list dl dd[class='active']").removeClass("active");
			prevsong = $(".music-list dl dd:last-child").addClass("active").children().attr("songpath");
		}
		$("audio").html('<source src="'+prevsong+'" type="audio/mpeg">');
		audio.load();//重新加载音乐
		update(); //更新控制信息
	});
	//控制播放列表
	$('.list-icon').click(function(){
		if(parseInt($("#music").css('bottom')) < 50){
			$("#music").animate({bottom:'+=280px'},1000,function(){
				$('.music-list').animate({left:'+=378px'},1000);
			});
		}else{
			$('.music-list').animate({left:'-=378px'},500,function(){
				$("#music").animate({bottom:'-=280px'},1000);
			});
		}
	});
	//手动选择歌曲
	$('.music-list dd').click(function(){
		$(".music-list dl dd[class='active']").removeClass("active");
		var thissong = $(this).addClass("active").children().attr("songpath");
		$("audio").html('<source src="'+thissong+'" type="audio/mpeg">');
		audio.load();//重新加载音乐
		update();//更新控制信息
	});
	//改变信息
	function update(){
		var songname = $(".music-list dl dd[class='active']").children().attr("songname");
		var singer = $(".music-list dl dd[class='active']").children().attr("singer");
		var special = $(".music-list dl dd[class='active']").children().attr("special");
		var picpath = $(".music-list dl dd[class='active']").children().attr("src");
		$(".song-name").find("span").html(songname);	//更新歌名
		$(".singer").find("span").html(singer);	//更新歌手
		$(".special").find("span").html(special); //更新专辑
		$("#imgpath").attr("src",picpath); //更新图片
		audio.ondurationchange; //获取音乐时长
		audio.ontimeupdate; //监听音乐播放时间
	}
}else {
	$("#music").remove();
	$("audio").remove();
}
	//监听 用来循环、顺序播放
	/* audio.onended=function(){
		if(pattern == 0){
			$("audio sourse").attr('src','__PUBLIC__/music/韩安旭 - 多幸运.mp3');
		}
	} */