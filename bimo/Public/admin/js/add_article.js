/* 二级下拉菜单js */
	var articlearea = document.getElementById("articlearea");
	var articletype = document.getElementById("articletype");
//	var num = options.length
//	for(var i=0;i<num;i++){
//		alert(i)
//		articletype.removeChild(options[0]);
//	//	alert(options[0].innerHTML)
//	}
	var arrarea=["动漫","技术","生活","其他"];
	var arrtype=new Array(
			new Array("新闻","人物","其他"),
			new Array("js","php","linux","其他"),
			new Array("学习","旅游","运动","其他"),
			new Array("其他")
			);
	articlearea.onchange=function(){

		var options = document.getElementById("articletype").getElementsByTagName("option");
		var num = options.length
		for(var i=0;i<num;i++){
			articletype.removeChild(options[0]);
		}
		for(var i=0;i<arrarea.length;i++){
			if(articlearea.value == arrarea[i])
				for(var j=0;j<arrtype[i].length;j++){
					var option = document.createElement("option");
					option.vlaue=arrtype[i][j];
					option.innerHTML=arrtype[i][j];
					articletype.appendChild(option);
				}
		}
	}

/* js获取文件  网上参考的 */
var photo=document.getElementById("photo");
var filePath=document.getElementById("filePath");
photo.onchange=function(){
	filePath.value=getFullPath(this);
}
function getFullPath(obj){ 
	if(obj){ 
		 //ie 
		 if (window.navigator.userAgent.indexOf("MSIE")>=1){ 
			 obj.select(); 
		 	return document.selection.createRange().text; 
		 } 
		 return obj.value; 
	} 
} 
/* 推荐指数 */
var isrecommend = myform.isrecommend;
var rec_index = myform.recommendindex;
isrecommend[0].onclick = function(){
	rec_index.value="1";
	rec_index.readOnly=false;
	rec_index.onblur = function(){
		if(!rec_index.value.match(/^\d{1}$/) || rec_index.value <1 || rec_index.value>5){
			alert("推荐指数必须在数字1到5之间");
			myform.recommendindex.focus();
		}
	}
}
isrecommend[1].onclick = function(){
	rec_index.readOnly=true;
	rec_index.value="0";
	rec_index.onblur = function(){}//消除上面的rec_index.onblur函数
}
