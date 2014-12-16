<?php
	require_once("mvc/base/Viewer.php");	
	$Viewer = new Viewer("mvc/templates/AppRss.html");
	echo $Viewer->html();
?>
