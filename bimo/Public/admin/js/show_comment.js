function view_reply(id){
	var mystring = location.href;
	var w=mystring.indexOf('/p');
	if(w>0){
		var url = mystring.substr(0,w);
	}
	var url = url?mystring.substr(0,w):location.href;
	$.post(
		url+"/../view_reply",
		{
			id : id
		},
		function(data){
			if(data.length != 0){
				//添加信息
				for(var i=0;i<data.length;i++){
					$(".r-box table tbody").append(
						'<tr class="t-body padding10">'
					  + '<td>'+data[i]["nickname"]+'</td>'
					  + '<td><img class="head-pic" src="'+data[i]["headpic"]+'"/></td>'
					  + '<td>'+data[i]["email"]+'</td>'
					  + '<td>'+data[i]["content"]+'</td>'
					  + '<td>'+data[i]["posttime"]+'</td>'
					  + '</tr>'
					);
				}
				//显示回复消息框
				$(".r-reply").css("display","block");
				$(".r-box").css("display","block");
			}
		}
	);
}
$(document).ready(function(){
	$(".del").click(function(){
		//alert(location.href);
		var mystring = location.href;
		var w=mystring.indexOf('/p');
		if(w>0){
			var url = mystring.substr(0,w);
		}
		var url = url?mystring.substr(0,w):location.href;
		var statu = confirm("确认是否删除?");
	    if(!statu){
	        return false;
	    }
		$.post(
			url+"/../del_comment",
			{
				id : $(this).attr("title")
			},
			function(data){
				if(data.isdel == "ok"){
					alert("删除成功！");
					location = location.href; 
				}
			}
		);
	});
	$(".m-close").click(function(){
		$(".r-box table .t-body").remove();
		$(".r-box").css("display","none");
		$(".r-reply").css("display","none");
	});
});
