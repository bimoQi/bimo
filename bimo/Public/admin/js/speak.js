//ajax删除操作
$(document).ready(function(){
	var mystring = location.href;
	var w=mystring.indexOf('/p');
	if(w>0){
		var url = mystring.substr(0,w);
	}
	var url = url?mystring.substr(0,w):location.href;
	$(".del").click(function(){
		var statu = confirm("确认是否删除?");
	    if(!statu){
	        return false;
	    }
		$.post(
		url+"/../del_speak",
		{
			id : $(this).attr("title"),
		},
		function(data){
			if(data.isdel=="ok"){
				alert("删除成功！");
				location=window.location.href;
			}
		}
		);
	});
});



