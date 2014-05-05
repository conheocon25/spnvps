/*<![CDATA[*/
$(document).ready(function(){
	var PlayList 	= null;
	var URL 		= "";
	var tmp 		= 0;
	
	URL = $(".audio").attr('URL');
	$.ajax({
		type: "POST",
		url: URL,
		dataType: "json",
		async: false,
		success: function(data){
			PlayList = data
		}
	});
			
	//Thư viện PlayList
	new jPlayerPlaylist(
		{
			jPlayer: "#jquery_jplayer_1",
			cssSelectorAncestor: "#jp_container_1"
		},
		PlayList,
		{
			swfPath: "/mvc/templates/theme/jplayer/js",
			supplied: "mp3",
			wmode: "window",
			smoothPlayBar: true,
			keyEnabled: true,
			playlistOptions: { autoPlay: true }
		}
	);
	
	$(".jp-repeat").trigger("click");	
	$(".audio-ctrl.up").hide();
	$(".audio-ctrl").click(function(){
		var auh = $(".audio").height() + "px";
		if(tmp==0) {
			$(".audio").animate({ height: "-="+auh });
			tmp ++;
			$(".audio-ctrl.up").show();
			$(".audio-ctrl.down").hide();
		} else {
			$(".audio").css("height", "auto");
			tmp--;
			$(".audio-ctrl.up").hide();
			$(".audio-ctrl.down").show();
		}
	});

});
/*]]>*/