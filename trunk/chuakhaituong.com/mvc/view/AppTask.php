<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/AppTask.html");
	echo $Viewer->html();
?>
