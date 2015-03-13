<?php
	require_once("mvc/base/Viewer.php");	
	$Viewer = new Viewer("mvc/templates/AppYoutubeList.html");
	echo $Viewer->html();
?>
