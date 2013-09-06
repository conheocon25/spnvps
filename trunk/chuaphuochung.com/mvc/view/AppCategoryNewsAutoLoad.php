<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/AppCategoryNewsAutoLoad.html");
	echo $Viewer->html();
?>
