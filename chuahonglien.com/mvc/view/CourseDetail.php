<?php
	require_once("mvc/base/Viewer.php");	
	$Viewer = new Viewer("mvc/templates/CourseDetail.html");
	echo $Viewer->html();
?>
