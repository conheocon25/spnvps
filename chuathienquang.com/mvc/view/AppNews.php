<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/AppNews.html");
	echo $Viewer->html();
?>
