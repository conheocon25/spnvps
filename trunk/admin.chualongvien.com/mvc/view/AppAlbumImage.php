<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/AppAlbumImage.html");
	echo $Viewer->html();
?>
