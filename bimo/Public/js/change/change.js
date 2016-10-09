/* 技术区js */
	var techno_sub = document.getElementById("technology").getElementsByTagName('h4');
	var techno_js = document.getElementById("techno_js");
	var techno_php = document.getElementById("techno_php");
	var techno_linux = document.getElementById("techno_linux");
	var techno_seo = document.getElementById("techno_seo");
	var techno_other = document.getElementById("techno_other");
	var techno_con =[techno_js,techno_php,techno_linux,techno_seo,techno_other];
	for(var i=1;i<techno_sub.length;i++){
		techno_con[i].style.display="none";
	}
	function techno_change(num){
		for(var i=0;i<techno_sub.length;i++){
			if(i==num){
				techno_sub[i].style.backgroundColor="#67C39C";
				techno_sub[i].style.color="#fff";
				techno_con[i].style.display="block";
//				var name=techno_con[i].name;
//				var vi=i;//ajax是将这些动作完成后才进行数据传送
//			             //	所以如果不设置变量之间用i  始终是num+1 然而num+3是没有的
//				ajax.post("test.php",{name:name},function(data){
//							con[vi].innerHTML=data;
//						});
			}else{
				techno_sub[i].style.backgroundColor="";
				techno_sub[i].style.color="#67C39C";
				techno_con[i].style.display="none";
			}
		}
	}
/* 生活区js */
	var life_sub = document.getElementById("life").getElementsByTagName('h4');
	var life_study = document.getElementById("life_study");
	var life_travel = document.getElementById("life_travel");
	var life_sport = document.getElementById("life_sport");
	var life_practice = document.getElementById("life_practice");
	var life_other = document.getElementById("life_other");
	var life_con =[life_study,life_travel,life_sport,life_practice,life_other];
	for(var i=1;i<life_con.length;i++){
		life_con[i].style.display="none";
	}
	function life_change(num){
		for(var i=0;i<life_sub.length;i++){
			if(i==num){
				life_sub[i].style.backgroundColor="#67C39C";
				life_sub[i].style.color="#fff";
				life_con[i].style.display="block";
//				var name=techno_con[i].name;
//				var vi=i;//ajax是将这些动作完成后才进行数据传送
//			             //	所以如果不设置变量之间用i  始终是num+1 然而num+3是没有的
//				ajax.post("test.php",{name:name},function(data){
//							con[vi].innerHTML=data;
//						});
			}else{
				life_sub[i].style.backgroundColor="";
				life_sub[i].style.color="#67C39C";
				life_con[i].style.display="none";
			}
		}
	}
/* 技术区、生活区pic处理*/
function pic_manage_over(obj){
			obj.style.border="1px solid #0088CC";
			obj.getElementsByTagName("span")[0].style.backgroundColor="#B99259";

}
function pic_manage_out(obj){
			obj.style.border="1px solid #fff";
			obj.getElementsByTagName("span")[0].style.backgroundColor="#888";
}



