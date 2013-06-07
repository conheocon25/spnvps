<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/AppCategoryNews.html");
	echo $Viewer->html();
?>
