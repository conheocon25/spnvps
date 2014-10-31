<?php
	require_once("mvc/base/Viewer.php");
	$Viewer = new Viewer("mvc/templates/PagodaAlbum.html");
	echo $Viewer->html();
?>
