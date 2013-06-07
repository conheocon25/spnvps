/*<![CDATA[*/
			$(document).ready(function() {
				$("#refreshCaptcha").click(function() {															
					$.ajax({
					  url: 'http://chuathienquang.123app.net/RefreshCaptcha',
					  success: function(data) {
						$('#PicCaptcha').attr("src","/data/captcha.jpg");						
					  }
					});
				});				
			});
/*]]>*/