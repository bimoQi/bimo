$(document).ready(function(){
	$("form .nickname").val(localStorage.nickname);
	$("form .email").val(localStorage.email);
	$("form .website").val(localStorage.website);
});
/*处理发表评论js*/
$("#content").focus(function(){
	if(!$(".smiles").html()){
		$("textarea").before('<div class="smiles"></div>');
		for(var i=0;i<15;i++){
			var smile = document.createElement("img");
			smile.src="./Public/img/smiles/"+i+".gif";
			smile.title=i;
			$(".smiles").append(smile);
			smile.onclick = function(){
				form.content.value += "[smile_"+this.title+"]";
			}
		}
		//$("textarea").height(function(n,c){return c+30;});
		$("#post_comment").height(function(n,c){return c+30;});
	}
});

/* 回复 */
$(".reply").click(function(){
	var figure = $(this).parents("h5").children('.figure').html();
	var replyid = $(this).parents("h5").children('input').val();
	if($(".reply-figure").html() == undefined){
		$("textarea").before('<div class="reply-figure">正在回复 '+figure+'<a onclick="no_reply()" href="javascript:;">取消</a></div>');
		$("textarea").height(function(n,c){return c+30;});
		$("#post_comment").height(function(n,c){return c+30;});
	}else{
		$(".reply-figure").html('正在回复 '+figure+'<a onclick="no_reply()" href="javascript:;">取消</a>');
	}
	$("#content").attr("placeholder","回复"+figure+"");
	$("#content").focus();
	$(".replyid").val(replyid);
});
/* 取消回复 */
function no_reply(obj){
	$(".reply-figure").remove();
	$("#content").attr("placeholder","");
	$(".m-textarea").height(function(n,c){return c-30;});
	$("#post_comment").height(function(n,c){return c-30;});
	$(".replyid").val("");
}
function check(obj,info,node,fun){
	var val = obj.val();
	if(fun(val)){
		obj.css('border-color','green');
		node.html("<span class='glyphicon glyphicon-ok'></span> ");
		node.css('color','green');
	}else{
		obj.css('border-color','red');
		node.html("<span class='glyphicon glyphicon-remove'></span> "+"<span class='hidden-xs'>"+info+"</span>");
		node.css('color','red');
	}
}
$('.nickname').bind('input propertychange', function() {
	check($(this),'长度在2到10之间，并且不能有特殊字符',$('.nickname-info'),function(val){
		if(val.length<2 || val.length>10 || val.match(/[\s|`|\/|\(|\)|-|=|$|!|#|%|^|~|*|\?|,|\.|。|，|>|<|《|》]/)){
			return false;
		}else{
			return true;
		}
	})
});
$('.email').bind('input propertychange', function() {
	check($(this),'邮箱格式不正确',$('.email-info'),function(val){
		if(val.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+$/)){
			return true;
		}else{
			return false;
		}
	})
});
$('.content').bind('input propertychange', function() {
	if($(this).val().match(/^(\s)*$/)){
		$(this).css('border-color','red');
	}else{
		$(this).css('border-color','green');
	}
});
$('.website').bind('input propertychange', function() {
	check($(this),'网址格式不正确',$('.website-info'),function(val){
		if(val.match(/^\S+$/) && val.match(/^((http|ftp|https):\/\/)?[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&amp;:\/~\+#]*[\w\-\@?^=%&amp;\/~\+#])?$/i
			)){
			return true;
		}else{
			return false;
		}
	})
	if($(this).val().length == 0){
		$(this).css('border-color','');
		$('.website-info').html('');
	}
});
$("#submit").click(function(){
	var flag = true;
	check($('.nickname'),'长度在2到10之间，并且不能有特殊字符',$('.nickname-info'),function(val){
		if(val.length<2 || val.length>10 || val.match(/[\s|`|\/|\(|\)|-|=|$|!|#|%|^|~|*|\?|,|\.|。|，|>|<|《|》]/)){
			flag = false;
			return false;
		}else{
			return true;
		}
	})
	check($('.email'),'邮箱格式不正确',$('.email-info'),function(val){
		if(val.match(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+$/)){
			return true;
		}else{
			flag = false;
			return false;
		}
	})
	check($('.website'),'网址格式不正确',$('.website-info'),function(val){
		if(val.length==0 || val.match(/^\S+$/) && val.match(/^((http|ftp|https):\/\/)?[\w\-_]+(\.[\w\-_]+)+([\w\-\.,@?^=%&amp;:\/~\+#]*[\w\-\@?^=%&amp;\/~\+#])?$/i
			)){
			return true;
		}else{
			flag = false;
			return false;
		}
		if($(this).val().length == 0){
			$(this).css('border-color','');
			$('.website-info').html(' ');
		}
	})
	//单独验证
	if($('#content').val().match(/^(\s)*$/)){
		flag = false;
		$('#content').css('border-color','red');
	}else{
		$('#content').css('border-color','green');
	}

	if(flag == true){
			/* Ajax返回信息并处理*/ 
			$.post("./Guestbook/post",
			{
				nickname:$("form .nickname").val(),
				email:$("form .email").val(),
				website:$("form .website").val(),
				content:$("form #content").val(),
				articleid:$("form .articleid").val(),
				replyid:$("form .replyid").val(),
				headpic:localStorage.headpic,
			},
			function(data,status){
				if(data.add == "ok"){
					alert("发表成功!");
					$(".comment").after(
						'<div class="container-fluid">' +
							'<div class="media">' +
								'<div class="peo-head pull-left">' +
									'<img src="'+data.headpic+'"/>' +
								'</div>' +
								'<div class="media-body">' +
								'	<h5 class="media-heading">' +
										'<div class="figure">'+$("form .nickname").val()+'</div>' +
										'<div class="time">'+data.posttime+
										'</div>' +
									'</h5>' +
									'<div class="peo-cont">' +
										'<p>'+data.content+'</p>' +
									'</div>' +
								'</div>' +
							'</div>' +
						'</div>'
					);
					$("form #content").val("");

					//本地化存储
					localStorage.nickname = $("form .nickname").val();
					localStorage.email = $("form .email").val();
					localStorage.website = $("form .website").val();
					localStorage.headpic = data.headpic;
					}else if(data.add == "error"){
					alert("发送失败");//用php返回失败信息
					for(var i in data.info){
						alert(data.info[i]);
					}
				}
			});
	}
});