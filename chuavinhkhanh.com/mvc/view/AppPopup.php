<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/AppPopup.html");
	echo $Viewer->html();
?>
