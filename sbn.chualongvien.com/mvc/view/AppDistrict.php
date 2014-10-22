<?php
	require_once("mvc/base/Viewer.php");	
	$Viewer = new Viewer("mvc/templates/AppDistrict.html");
	echo $Viewer->html();
?>
