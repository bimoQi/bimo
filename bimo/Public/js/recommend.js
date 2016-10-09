var hot1 = document.getElementById("hot1");
var hot_detail1 = document.getElementById("hot_detail1");
var hots = new Array();
var hot_details = new Array();
for(var i=0;i<7;i++){
	hots[i] = document.getElementById("hot"+(i+1)+"");
	hot_details[i] = document.getElementById("hot_detail"+(i+1)+"");
}
function hot_detail_show(obj1,obj2){
	obj1.onmouseover =function(){
		for(var i=0;i<7;i++){
			hot_detail_noshow(hot_details[i]);//将其他详细内容不展现
			obj2.style.display="block";//再将需要展现的显示出来
		}
	}
}
function hot_detail_noshow(obj){
	obj.style.display="none";
}
for(var i=0;i<7;i++){
	hot_detail_show(hots[i],hot_details[i])//函数 用来一一操作
}