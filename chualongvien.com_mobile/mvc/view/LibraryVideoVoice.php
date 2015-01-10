<?php
	require_once("mvc/base/Viewer.php");
	
	$request 	= \MVC\Base\RequestRegistry::getRequest();
	$VB 		= $request->getObject("VB");	
	//$Viewer 	= new Viewer("mvc/templates/".$VB->getAnime()->getHtml());
	$Viewer 	= new Viewer("mvc/templates/LibraryVideoVoice__Pagoda.html");
	echo $Viewer->html();
?>
