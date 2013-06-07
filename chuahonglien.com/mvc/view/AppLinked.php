<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/AppLinked.html");
	echo $Viewer->html();
?>
