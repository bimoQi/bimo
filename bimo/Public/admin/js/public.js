$(document).ready(function(){
	$("#page li").mouseenter(function(){
		$(this).css("background","#3B8DD1");
		$(this).children().css("color","#fff");
	});
	$("#page li").mouseleave(function(){
		$(this).css("background","#fff");
		$(this).children().css("color","#3B8DD1");
	});
	//单独为当前页的页码做修饰 使其离开时颜色不变
	$("#active").mouseleave(function(){
		$(this).css("background","#3B8DD1");
		$(this).children().css("color","#fff");
	});
});