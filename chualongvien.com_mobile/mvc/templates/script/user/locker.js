/*<![CDATA[*/
	$(document).ready(function() {
		$(window).bind('contextmenu', false);
		$(document)[0].oncontextmenu = function() { return false; }
		$(document).mousedown(function(e){
			if( e.button == 2 ) {
				return false;
			} else {
				return true;
			}
		});
		$(document).bind('keydown keypress', 'ctrl+s', function(){return false;});
		$(document).bind('keydown keypress', 'f12', function(){return false;});
	});			
/*]]>*/