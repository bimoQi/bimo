//按钮
var subm = document.getElementById("submit");
move(subm);
function move(obj){
	obj.onmouseover=function(){
		obj.style.backgroundColor="#1A90C6";
	}
	obj.onmouseout=function(){
		obj.style.backgroundColor="#1EA9E8";
	}
}
//添加图片 和 添加视频
function pic(obj){
	var content = document.getElementsByName('content')[0];
	var url = prompt("请输入正确的图片地址","http://");
	if(url != "http://" && url !=""){
		content.value += "[img]"+url+"[/img]\n";
	}
}
//保存源代码
$('#code').modal('hide');
$('#sub-code').click(function(){
	if($('.modal-body textarea').val() == ''){
		alert("源代码为空！");
		$('.modal-body textarea').focus();
	}
	var old_cont = $("#content").val();
	var new_cont = old_cont+'\n[code]'+$('.modal-body textarea').val()+'[/code]\n';
	$('#content').val(new_cont);
	$('#code').modal('hide');
	$('.modal-body textarea').val('');//清空
})
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
	articlearea.onclick=function(){
		var options = document.getElementById("articletype").getElementsByTagName("option");
		var num = options.length;
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
	