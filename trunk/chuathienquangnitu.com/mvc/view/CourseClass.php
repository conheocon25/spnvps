<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/CourseClass.html");
	echo $Viewer->html();
?>
