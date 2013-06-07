/*<![CDATA[*/
			$(document).ready(function() {
				$("#refreshCaptcha").click(function() {						
					$.ajax({
					  url: 'http://chuagiacquang.123app.net/RefreshCaptcha',
					  success: function(data) {
						$('#PicCaptcha').attr("src","/data/captcha.jpg");						
					  }
					});
				});				
			});
/*]]>*/