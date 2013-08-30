<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/EventDetail.html");
	echo $Viewer->html();
?>
