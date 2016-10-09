// 分页 
var lis = document.getElementById("page").getElementsByTagName("li");
for(var i=0;i<lis.length;i++){
	pic(lis[i]);
}
function pic(obj){
		obj.onmouseover=function(){
			obj.style.backgroundColor="#3B8DD1";
			obj.getElementsByTagName("a")[0].style.color="#fff";
		}
		obj.onmouseout=function(){
			obj.style.backgroundColor="transparent";
			obj.getElementsByTagName("a")[0].style.color="#3B8DD1";
		}
		obj.onclick=function(){
			obj.getElementsByTagName("a")[0].style.color="#fff";
			obj.style.backgroundColor="#3B8DD1";
		}
	}
//单独为当前页的页码做修饰 使其离开时颜色不变
var active = document.getElementById("active");
active.onmouseout=function(){
			obj.style.backgroundColor="transparent";
			obj.getElementsByTagName("a")[0].style.color="#3B8DD1";
		}