/*<![CDATA[*/
$(function () {
	$('#FormChangePassLoad').jqcrypt({
		keyname: 'cafe123app',
		callback: function(form){ form.submit(); 
		}
	});	
});
/*]]>*/