<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/AppCategoryPaid.html");
	echo $Viewer->html();
?>
