<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/Introduction1.html");
	echo $Viewer->html();
?>
