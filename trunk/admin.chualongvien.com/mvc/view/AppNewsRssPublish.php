<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/AppNewsRssPublish.html");
	echo $Viewer->html();
?>
