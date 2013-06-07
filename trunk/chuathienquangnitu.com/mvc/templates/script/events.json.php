<?php
header('Content-type: text/json');
echo '[';
$separator = "";
$days = 16;
	echo '	{ "date": "1314579600000", "type": "meeting", "title": "Test Last Year", "description": "Lorem Ipsum dolor set", "url": "http://www.event3.com/" },';
	echo '	{ "date": "1377738000000", "type": "meeting", "title": "Test Next Year", "description": "Lorem Ipsum dolor set", "url": "http://www.event3.com/" },';
for ($i = 1 ; $i < $days; $i= 1 + $i * 2) {
	echo $separator;
	$initTime = (intval(microtime(true))*1000) + (86400000 * ($i-($days/2)));
	echo '	{ "date": "'; echo $initTime; 
		echo '", "type": "meeting", "title": "Dự án '; echo $i;
		echo ' họp", "description": "Sự kiện 1", "url": "http://www.event1.com" },';
		
	echo '	{ "date": "'; echo $initTime+3600000; 
		echo '", "type": "demo", "title": "Dự án '; echo $i;
		echo ' demo", "description": "Sự kiện 2", "url": "http://www.event2.com" },';

	echo '	{ "date": "'; echo $initTime-7200000; 
		echo '", "type": "meeting", "title": "Dự án '; echo $i; 
		echo ' Brainstorming", "description": "Sự kiện 3", "url": "http://www.event3.com/" },';
		
	echo '	{ "date": "'; echo $initTime+10800000; 
		echo '", "type": "test", "title": "Dự án '; echo $i;
		echo ' events", "description": "Sự kiện 4", "url": "http://www.event4.com/" },';
		
	echo '	{ "date": "'; echo $initTime+1800000; 
		echo '", "type": "meeting", "title": "Dự án '; echo $i; 
		echo ' meeting", "description": "Sự kiện 5", "url": "http://www.event5.com/" },';
		
	echo '	{ "date": "'; echo $initTime+3600000+2592000000; 
		echo '", "type": "demo", "title": "Dự án '; echo $i; 
		echo ' demo", "description": "Sự kiện 6", "url": "http://www.event6.com/" },';
		
	echo '	{ "date": "'; echo $initTime-7200000+2592000000; 
		echo '", "type": "meeting", "title": "Test Dự án '; echo $i; 
		echo ' Brainstorming", "description": "Sự kiện 7", "url": "http://www.event7.com/" },';
		
	echo '	{ "date": "'; echo $initTime+10800000+2592000000; 
		echo '", "type": "test", "title": "Dự án '; echo $i; 
		echo ' events", "description": "Sự kiện 8", "url": "http://www.event8.com/" },';
		
	echo '	{ "date": "'; echo $initTime+3600000-2592000000; 
		echo '", "type": "demo", "title": "Dự án '; echo $i; 
		echo ' demo", "description": "Sự kiện 9", "url": "http://www.event9.com/" },';
		
	echo '	{ "date": "'; echo $initTime-7200000-2592000000; 
		echo '", "type": "meeting", "title": "Dự án '; echo $i; 
		echo ' Brainstorming", "description": "Sự kiện 10", "url": "http://www.event10.com/" },';
		
	echo '	{ "date": "'; echo $initTime+10800000-2592000000; 
		echo '", "type": "test", "title": "Dự án '; echo $i; 
		echo ' events", "description": "Sự kiện 11", "url": "http://www.event11.com/" }';
	$separator = ",";
}
echo ']';
?>