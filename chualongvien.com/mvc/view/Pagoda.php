<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/Pagoda.html");
	echo $Viewer->html();
?>
