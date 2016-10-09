onload=function(){
	/* 实现触发图片透明度 */
	var picture1 = document.getElementById("picture1");
	var picture2 = document.getElementById("picture2");
	function pic(obj){
		obj.onmouseover=function(){
			obj.style.opacity="0.6";
			//兼容ie浏览器 的透明
			obj.style.filter="progid:DXImageTransform.Microsoft.Alpha(opacity=60)";
		}
		obj.onmouseout=function(){
			obj.style.opacity="0.9";
			obj.style.filter="progid:DXImageTransform.Microsoft.Alpha(opacity=90)";
		}
	}
	
	
}