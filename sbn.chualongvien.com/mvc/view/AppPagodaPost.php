<?php
	require_once("mvc/base/Viewer.php");	
	$Viewer = new Viewer("mvc/templates/AppPagodaPost.html");
	echo $Viewer->html();
?>
