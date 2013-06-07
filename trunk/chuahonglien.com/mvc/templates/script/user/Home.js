/*<![CDATA[*/
$(function() {
	/* ------------- Menu Top Control ------------- */
	$("ul.top-nav li").hover(function() {
		$(this).find("ul:first").css({visibility: "visible", display: "none"}).show(400);
	},function(){
		$(this).find("ul:first").css({visibility: "hidden", display: "none"});
	});
	
	//Ẩn hiện Kinh Pháp Cú
	$("#DhammapadaTodayEn").hide();
	$("#DhammapadaTodayVi").show();
	
	$("#DhammapadaTodayEn").click(function(){
		$("#DhammapadaTodayEn").hide();
		$("#DhammapadaTodayVi").show();
	});
	$("#DhammapadaTodayVi").click(function(){
		$("#DhammapadaTodayEn").show();
		$("#DhammapadaTodayVi").hide();
	});
	
});
/*]]>*/