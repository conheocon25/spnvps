<?php	
	header('Content-type: text/json');
	require_once("mvc/base/ViewHelper.php");
	$request = VH::getRequest();
	$Tasks = $request->getObject('Tasks');
	
	$Data = array();
	while( $Tasks->valid() ){
		$Task = $Tasks->current();
		$Data[] = array(
			"date"=>(string)(strtotime($Task->getDate())*1000),
			"type"=>$Task->getType(),
			"title"=>$Task->getTitle(), 
			"description"=>$Task->getDescription(), 
			"url"=>$Task->getURL()
		);
		$Tasks->next();
	}
	echo json_encode($Data);
?>
