/*雪花飘落  网上找的*/
(function($){
	$.fn.snow=function(options){ 
		var $flake=$('<img />') 
		.css({ 
			'position':'fixed',//'absolute', 
			'top':'-50px', 
			'z-index':'1000' 
		}).attr('src','/Public/img/snow.png'); 
		var documentHeight=document.documentElement.clientHeight;//$(document).height(); 
		var documentWidth=$(document).width(); 
		var defaults={minSize:10,maxSize:20,newOn:500,flakeColor:"#FFFFFF"}; 
		var options=$.extend({},defaults,options); 
		var interval=setInterval(function(){ 
			var startPositionLeft=Math.random()*documentWidth-100; 
			var startOpacity=0.5+Math.random(); 
			var sizeFlake=options.minSize+Math.random()*options.maxSize; 
			var endPositionTop=documentHeight-40; 
			var endPositionLeft=startPositionLeft-100+Math.random()*200; 
			var durationFall=documentHeight*10+Math.random()*5000; 
			$flake.clone().appendTo('body').css({
				left:startPositionLeft, 
				opacity:startOpacity, 
				'width':sizeFlake, 
				'height':sizeFlake, 
				color:options.flakeColor 
			}).animate({
					top:endPositionTop, 
					left:endPositionLeft, 
					opacity:0.2 
				},
				durationFall, 
				'linear', 
				function(){
				$(this).remove(); 
			}); 
		},options.newOn);//interval End 
	};//$.fn.snow End 
})(jQuery); 
$.fn.snow({ minSize: 10, maxSize: 15, newOn: 500});