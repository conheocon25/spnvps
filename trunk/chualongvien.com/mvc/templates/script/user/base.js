/*<![CDATA[*/
	(function(d, s, id){
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s);
		js.id = id;
		js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
	
	$(document).ready(function() {
		$(".dropdown").hover(function(){
			$(this).find("ul").slideDown();
		}, function(){
			$(this).find("ul").slideUp();
		});
		
		$('#LessionCarousel').carousel({interval: 5000});
		$('#BuddhaCarousel').carousel({interval: 5000});
		$('#PopupCarousel').carousel({interval: 5000});
		$('#EventCarousel').carousel({interval: 5000});
		$('.monk-tooltip').tooltip(2000);
		$('.banner-slide').carousel({interval: 5000});
		
		var offset = 220;
		var duration = 500;
		jQuery(window).scroll(function() {
			if (jQuery(this).scrollTop() > offset) {
				jQuery('.crunchify-top').fadeIn(duration);
			} else {
				jQuery('.crunchify-top').fadeOut(duration);
			}
		});
		
		jQuery('.crunchify-top').click(function(event) {
			event.preventDefault();
			jQuery('html, body').animate({scrollTop: 0}, duration);
			return false;
		})
		
		$('.crunchify-top').tooltip()
	});			
/*]]>*/