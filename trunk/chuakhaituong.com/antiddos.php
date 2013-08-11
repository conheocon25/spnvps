<?php
	$text = $_SERVER['QUERY_STRING'];
	$text = preg_replace("#php\&#si",'php?',$text);
	echo('<center><a href=http://chuakhaituong.com>[Click vao day]</a><br>de vao Chua Khai Tuong.</center>');
?>