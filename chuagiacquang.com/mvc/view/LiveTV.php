<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/LiveTV.html");
	echo $Viewer->html();
?>
