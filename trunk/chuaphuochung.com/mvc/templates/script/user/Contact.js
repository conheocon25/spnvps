/*<![CDATA[*/
$(function() {
	
	$(".txtleft").click(function (){				
		locationPathCode = 1;
		$("#map").googleMap().loadMap01();
		$("#namecard").attr('src','/data/images/namecardvinhkhanh.jpg');
	});
	
	$(".txtright").click(function (){	
		locationPathCode = 2;	
		$("#map").googleMap().loadMap02();
		$("#namecard").attr('src','/data/images/namecardquanam.jpg');		
	});
	
	$("#getdirections").click(function (){
		var from = "";
		from = $("#start").val();
		$('#directions').html('');
		if (locationPathCode == 1) {
			$("#map").googleMap().findpath(from,"chua vinh khanh, Luc Sy Thanh, Tra On Vinh Long, Viet Nam", locationPathCode);					
		}
		if (locationPathCode == 2) {
			$("#map").googleMap().findpath(from,"ap tich loc, xa Tich Thien, huyen Tra On, Vinh Long, Viet Nam", locationPathCode);					
		}	
	});
	
	$('#cboTinhThanh').change(function(e) {
        e.preventDefault();
		var from = ""; 
		$("select#cboTinhThanh option:selected").each(function () {
			from = $(this).text();
		});	
		
		$('#directions').html('');
		if (locationPathCode == 1) {
			$("#map").googleMap().findpath(from,"chua vinh khanh, Luc Sy Thanh, Tra On Vinh Long, Viet Nam", locationPathCode);					
		}
		if (locationPathCode == 2) {
			$("#map").googleMap().findpath(from,"ap tich loc, xa Tich Thien, huyen Tra On, Vinh Long, Viet Nam", locationPathCode);					
		}								
    }).change();	
		
});
/*]]>*/