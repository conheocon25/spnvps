<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/PagodaPost.html");
	echo $Viewer->html();
?>
