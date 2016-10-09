/* 置顶按键top */
var top_button = document.getElementById("top-button");
top_button.onmouseover = function(){
	top_button.style.backgroundPosition="0 48px";
}
top_button.onmouseout = function(){
	top_button.style.backgroundPosition="0 0";
}
top_button.onclick = function(){
	pageScroll();
}
function pageScroll(){
    //把内容滚动指定的像素数（第一个参数是向右滚动的像素数，第二个参数是向下滚动的像素数）
    window.scrollBy(0,-100);
    //延时递归调用，模拟滚动向上效果
    scrolldelay = setTimeout('pageScroll()',50);
    //获取scrollTop值，声明了DTD的标准网页取document.documentElement.scrollTop，否则取document.body.scrollTop；因为二者只有一个会生效，另一个就恒为0，所以取和值可以得到网页的真正的scrollTop值
    var sTop=document.documentElement.scrollTop+document.body.scrollTop;
    //判断当页面到达顶部，取消延时代码（否则页面滚动到顶部会无法再向下正常浏览页面）
    if(sTop==0) clearTimeout(scrolldelay);
}
//判断是否出现top按钮  使用window窗口监听
window.onscroll=function(){
	if(document.documentElement.scrollTop+document.body.scrollTop <= 130){
		top_button.style.display="none";
	}else{
		top_button.style.display="block";
	}
}

