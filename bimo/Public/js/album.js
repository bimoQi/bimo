$(document).ready(function(){
	$(".chuli-sub").children("img.ding").click(function(event){
		$.post("Album/ding",
		  {
		    ding:$(this).attr("alt")
		  },
		  function(data){
		  	if(data.isok == "ok"){
		  		$(event.target).next().html(""+data.dingnum+"");
		  		$(event.target).attr("src","Public/img/ding_yes.png");
//		    	setTimeout(function(){
//		  			alert("感谢您的支持！");
//		  		},300);
		  	}else{
		  		alert("no");
		  	}
		  });
	});
	$(".chuli-sub").children("img.cai").click(function(event){
		$.post("Album/cai",
		  {
		    cai:$(this).attr("alt")
		  },
		  function(data){
		  	if(data.isok == "ok"){
		  		$(event.target).next().html(""+data.cainum+"");
		  		$(event.target).attr("src","Public/img/cai_yes.png");
//		  		setTimeout(function(){
//		  			alert("这样不好吧-_-！");
//		  		},300);
		    	
		  	}else{
		  		alert("no");
		  	}
		  });
	});
	/****  点赞+1动画效果   ****/
	(function($) {
	    $.extend({
	        tipsBox: function(options) {
	            options = $.extend({
	                obj: null,  //jq对象，要在那个html标签上显示
	                str: "+1",  //字符串，要显示的内容;也可以传一段html，如: "<b style='font-family:Microsoft YaHei;'>+1</b>"
	                startSize: "12px",  //动画开始的文字大小
	                endSize: "30px",    //动画结束的文字大小
	                interval: 600,  //动画时间间隔
	                color: "red",    //文字颜色
	                callback: function() {}    //回调函数
	            }, options);
	            $("body").append("<span class='num'>"+ options.str +"</span>");
	            var box = $(".num");
	            var left = options.obj.offset().left + options.obj.width() / 2;
	            var top = options.obj.offset().top - options.obj.height();
	            box.css({
	                "position": "absolute",
	                "left": left + "px",
	                "top": top + "px",
	                "z-index": 9999,
	                "font-size": options.startSize,
	                "line-height": options.endSize,
	                "color": options.color
	            });
	            box.animate({
	                "font-size": options.endSize,
	                "opacity": "0",
	                "top": top - parseInt(options.endSize) + "px"
	            }, options.interval , function() {
	                box.remove();
	                options.callback();
	            });
	        }
	    });
	})(jQuery);
	$(function() {
		$(".chuli-sub").children("img.ding").click(function() {
			$.tipsBox({
				obj: $(this),
				str: "赞+1",
	            callback: function() {
	            }
			});
		});
	});
	$(function() {
		$(".chuli-sub").children("img.cai").click(function() {
			$.tipsBox({
				obj: $(this),
				str: "踩+1",
	            callback: function() {
	            }
			});
		});
	});
});