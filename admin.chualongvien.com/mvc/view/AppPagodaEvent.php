<?php
	require_once("mvc/base/Viewer.php");	
	$Viewer = new Viewer("mvc/templates/AppPagodaEvent.html");
	echo $Viewer->html();
?>
