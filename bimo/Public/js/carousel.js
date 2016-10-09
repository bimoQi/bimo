/* 轮播图js */
/*	
var sub1 = document.getElementById("sub1");
var sub2 = document.getElementById("sub2");
var sub3 = document.getElementById("sub3");
sub1.style.opacity=1;
sub1.style.filter="progid:DXImageTransform.Microsoft.Alpha(opacity=100)";//兼容ie浏览器
var time = setTimeout("carousel_sub1()");
function carousel_sub1(){
	clearTimeout("time");
	sub1.style.display="block";
	sub2.style.display="block";
	sub3.style.display="none";
	sub1.style.opacity=1;
	sub1.style.filter="progid:DXImageTransform.Microsoft.Alpha(opacity=100)";//兼容ie浏览器		
	var time = setTimeout("touming1(0)",200);
}
function touming1(i){
	clearTimeout("time");
	var time=setTimeout("shezhi1("+i+")",100);
}
function shezhi1(i){
	clearTimeout("time");
	sub1.style.opacity=(10-i)*0.1;
	sub1.style.filter="progid:DXImageTransform.Microsoft.Alpha(opacity="+(100-i*10)+")";//兼容ie浏览器	
	sub2.style.opacity=i*0.1;
	sub2.style.filter="progid:DXImageTransform.Microsoft.Alpha(opacity="+i*10+")";//兼容ie浏览器
	if(i<=10){
		var time=setTimeout("touming1("+(++i)+")");
	}else
		var time = setTimeout("carousel_sub2()",1000);
}
function carousel_sub2(){
	clearTimeout("time");
	sub1.style.display="none";
	sub2.style.display="block";
	sub3.style.display="block";
	sub2.style.opacity=1;
	sub2.style.filter="progid:DXImageTransform.Microsoft.Alpha(opacity=100)";//兼容ie浏览器
	var time = setTimeout("touming2(0)",200);
}
function touming2(i){
	clearTimeout("time");
	var time=setTimeout("shezhi2("+i+")",100);
}
function shezhi2(i){
	clearTimeout("time");
	sub2.style.opacity=(10-i)*0.1;
	sub2.style.filter="progid:DXImageTransform.Microsoft.Alpha(opacity="+(100-i*10)+")";//兼容ie浏览器
	sub3.style.opacity=i*0.1;
	sub3.style.filter="progid:DXImageTransform.Microsoft.Alpha(opacity="+i*10+")";//兼容ie浏览器
	if(i<=10){
		var time=setTimeout("touming2("+(++i)+")");
	}else
		var time = setTimeout("carousel_sub3()",1000);
}
function carousel_sub3(){
	clearTimeout("time");
	sub1.style.display="block";
	sub2.style.display="none";
	sub3.style.display="block";
	sub3.style.opacity=1;
	sub3.style.filter="progid:DXImageTransform.Microsoft.Alpha(opacity=100)";//兼容ie浏览器
	var time = setTimeout("touming3(0)",200);
}
function touming3(i){
	clearTimeout("time");
	var time=setTimeout("shezhi3("+i+")",100);
}
function shezhi3(i){
	clearTimeout("time");
	sub3.style.opacity=(10-i)*0.1;
	sub3.style.filter="progid:DXImageTransform.Microsoft.Alpha(opacity="+(100-i*10)+")";//兼容ie浏览器
	sub1.style.opacity=i*0.1;
	sub1.style.filter="progid:DXImageTransform.Microsoft.Alpha(opacity="+i*10+")";//兼容ie浏览器
	if(i<=10){
		var time=setTimeout("touming3("+(++i)+")");
	}else
		var time = setTimeout("carousel_sub1()",1000);
}*/
/* 标语切换操作 */
var ban_img=new Array();
var ban_title=new Array();
var ban_dot=new Array();
for(var i=0;i<3;i++){
 ban_img[i] = document.getElementById("ban_img"+(i+1)+"");
 ban_title[i]= document.getElementById("ban_title"+(i+1)+"");
 ban_dot[i]= document.getElementById("ban_dot"+(i+1)+"");
}
for(var i=0;i<3;i++){
	dot_over(ban_dot[i],ban_img[i],ban_title[i]);
}
function dot_over(dot,img,title){
	dot.onmouseover=function(){
		for(var i=0;i<3;i++){
			ban_img[i].style.display="none";//所有的图片都不显示
			ban_title[i].style.display="none";
			ban_dot[i].style.backgroundColor="#fff";
		}
		img.style.display="block";//将当前的图片显示
		title.style.display="block";
		dot.style.backgroundColor="#F0A771";
	}
}





