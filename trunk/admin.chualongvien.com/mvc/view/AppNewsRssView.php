<?php
	require_once("mvc/base/Viewer.php");	
	$Viewer = new Viewer("mvc/templates/AppNewsRssView.html");
	echo $Viewer->html();
?>
