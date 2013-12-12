<?php
	require_once("mvc/base/Viewer.php");	
	$Viewer = new Viewer("mvc/templates/AppBType.html");
	echo $Viewer->html();
?>
