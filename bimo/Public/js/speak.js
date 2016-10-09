function load(obj){
		$(obj).remove();
		$(".main").append("<img class='load-gif' src='Public/img/load.gif'/>");
		$.post(
			'Speak/load_more',
			{
				id:$("#speak li:last").attr("id")
			},
			function(data){
				if(data.length >0 ){
					for(var i=0; i<data.length; i++){
						$("#speak").append(
								' <li class="li" id="'+data[i]["id"]+'"> '
								+'	<div class="calendar-year">'+data[i]["year"]+'</div> '
								+'	<div class="calendar-sub"> '
								+'		<div class="calendar-month">'+data[i]["month"]+'</div> '
								+'		<div class="calendar-day">'+data[i]["day"]+'</div> '
								+'	</div> '
								+'	<div class="head"> '
								+'		<img src="'+data[i]["head"]+'"/> '
								+'	</div> '
								+'	<div class="line"></div> '
								+'	<div class="content" > '
								+'		<div class="detail"> '
								+'			<div class="p">'+data[i]["content"]+'</div> '
								+'			<div class="chuli"> '
								+'				<span class="glyphicon glyphicon-thumbs-up" style="color: rgb(255, 140, 60);">顶('+data[i]["dingnum"]+')</span> '
								+'				<span class="glyphicon glyphicon-thumbs-down" style="color: rgb(148, 130, 70);">踩({'+data[i]["cainum"]+'})</span> '
								+'			</div> '
								+'		</div> '
								+'	</div> '
								+'</li> '
								);
					}
				}else{
					window.more = 0;
				}
				$(".load-gif").remove();
				if(window.more == 0)
					$(".main").append('<button onclick="load(this)" class="btn btn-block m-btn disabled">没有数据了</button>');
				else
					$(".main").append('<button onclick="load(this)" class="btn btn-block m-btn">点击加载更多</button>');
			}
		);
}
$(document).ready(function(){
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
		$(".ding").click(function(event) {
			$.tipsBox({
				obj: $(this),
				str: "顶+1",
	            callback: function() {
	            }
			});
			$(this).css("text-shadow","0 0 1px #FD9044");
			$.post(
				'Speak/chuli',
				{
					type:"ding",
					id:$(this).parents("li").attr("id")
				},
				function(data){
					if(data["isok"] == 'ok'){
						$(event.target).html("顶("+data.dingnum+")");
					}
				}
			);
		});
		$(".cai").click(function(event) {
			$.tipsBox({
				obj: $(this),
				str: "踩+1",
	            callback: function() {
	            }
			});
			$(this).css("text-shadow","0 0 1px #948246");
			$.post(
				'Speak/chuli',
				{
					type:"cai",
					id:$(this).parents("li").attr("id")
				},
				function(data){
					if(data["isok"] == 'ok'){
						$(event.target).html("踩("+data.cainum+")");
					}
				}
			);
		});
	});
});
