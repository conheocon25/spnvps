<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/AppEvent.html");
	echo $Viewer->html();
?>
