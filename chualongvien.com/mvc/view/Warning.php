<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/Warning.html");
	echo $Viewer->html();
?>
