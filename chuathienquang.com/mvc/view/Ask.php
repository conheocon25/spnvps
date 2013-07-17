<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/Ask.html");
	echo $Viewer->html();
?>
