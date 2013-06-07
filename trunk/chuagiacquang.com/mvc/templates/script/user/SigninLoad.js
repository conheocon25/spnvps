/*<![CDATA[*/
$(function () {
	$('#FormSignin').jqcrypt({
		keyname: 'cafe123app',
		callback: function(form){ form.submit(); }
	});	
	var Email;
	var Pass;
	
	$("#SigninError").hide();
	
	$("#SigninEmail").keydown(function () {
		$("#SigninEmailLabel").hide();
		if (event.keyCode == '13') {
			document.$("#FormSignin").submit();
		}
	});
	
	$("#SigninEmail").blur(function () {
		if($("#SigninEmail").val() == "") {
			$("#SigninEmailLabel").show();
		}
	});
	
	$("#SigninPass").keydown(function () {
		$("#SigninPassLabel").hide();
	});
	
	$("#SigninPass").blur(function () {
		if($("#SigninPass").val() == "") {
			$("#SigninPassLabel").show();
		}
	});
	

	$("#FormSignin").submit(function() {
		Email = $("#SigninEmail").val();
		Pass = $("#SigninPass").val();
		
		if(Email == "" || Pass == "") {
			$("#SigninError").show();
			return false;
		} else {
			return true;
		}
	});

});
/*]]>*/