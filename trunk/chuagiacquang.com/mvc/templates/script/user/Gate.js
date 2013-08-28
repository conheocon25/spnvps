/*<![CDATA[*/
$(function() {			
			$("#jquery_jplayer_1").jPlayer({
				ready: function () {
					$(this).jPlayer("setMedia", {
						mp3:"http://chuagiacquang.com/data/chuongchua.mp3"
					}).jPlayer("play");
				},
				swfPath: "data",
				supplied: "mp3",		
				wmode: "window"
			});
			$('.jp-repeat').trigger('click');
			$('.jp-volume-max').trigger('click');
			$("#jp_container_1").hide();
});
/*]]>*/