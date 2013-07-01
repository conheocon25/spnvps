<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/AppCourseLession.html");
	echo $Viewer->html();
?>
