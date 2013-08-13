/*<![CDATA[*/
	(function(d, s, id){var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return; js = d.createElement(s);js.id = id;js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";fjs.parentNode.insertBefore(js, fjs);}(document, 'script', 'facebook-jssdk'));
	$(document).ready(function() {
		$('.news-slide').carousel({interval: 5000});
		$('#LessionCarousel').carousel({interval: 5000});
		$('#BuddhaCarousel').carousel({interval: 5000});
		$('#EventCarousel').carousel({interval: 5000});
		$('.monk-tooltip').tooltip(2000);
	});			
/*]]>*/