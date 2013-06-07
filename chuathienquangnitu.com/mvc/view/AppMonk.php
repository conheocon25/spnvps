<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/AppMonk.html");
	echo $Viewer->html();
?>
