<?php
	require_once("mvc/base/Viewer.php");	
	$Viewer = new Viewer("mvc/templates/AppPagodaMonk.html");
	echo $Viewer->html();
?>
