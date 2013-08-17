<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/AppProfileNews.html");
	echo $Viewer->html();
?>
