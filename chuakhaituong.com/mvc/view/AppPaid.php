<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/AppPaid.html");
	echo $Viewer->html();
?>
