onload=function(){
	$("#menu a").click(function(){
		//初始化全部颜色
		$("#menu a").css("background-color","#DEE4ED");
		$("#menu a").css("color","#234686");
		$(this).css("background-color","#fff");
		//$(this).css("color","#6FAFF2");
	});
 showtime();
}
function showtime(){
	var today,hour,second,minute,month,date;
	var strDate ;
	today=new Date();
	var n_day = today.getDay();
	switch (n_day)
	{
	    case 0:{
	      strDate = "星期日"
	    }break;
	    case 1:{
	      strDate = "星期一"
	    }break;
	    case 2:{
	      strDate ="星期二"
	    }break;
	    case 3:{
	      strDate = "星期三"
	    }break;
	    case 4:{
	      strDate = "星期四"
	    }break;
	    case 5:{
	      strDate = "星期五"
	    }break;
	    case 6:{
	      strDate = "星期六"
	    }break;
	    case 7:{
	      strDate = "星期日"
	    }break;
	}
	month = today.getMonth()+1;
	date = today.getDate()>9 ? today.getDate() : "0"+today.getDate();
	hour = today.getHours()>9 ? today.getHours() : "0"+today.getHours();
	minute =today.getMinutes()>9 ? today.getMinutes() : "0"+today.getMinutes();
	second = today.getSeconds()>9 ? today.getSeconds() : "0"+today.getSeconds();
	document.getElementById('time').innerHTML = month + "月" + date + "日" + strDate +" " + hour + ":" + minute + ":" + second; //显示时间
	if(time){
		clearTimeout(time);
	}
	var time = setTimeout("showtime();", 1000); //设定函数自动执行时间为 1000 ms(1 s)
}