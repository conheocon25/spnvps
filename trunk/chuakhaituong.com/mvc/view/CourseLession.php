<?php
	require_once("mvc/base/Viewer.php");	
	$Viewer = new Viewer("mvc/templates/CourseLession.html");
	echo $Viewer->html();
?>
