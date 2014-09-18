<?php ob_start();?>
    <?php
	require 'ketnoi.php';
    $filename = $_GET['file'];
	$idbh= $_GET['id'];
	$sql2="select*from baihat where id = '$idbh'";
	$kq2=mysql_query($sql2);
	$row2=mysql_fetch_array($kq2);
	$xem=$row2["luottai"];
	$id=$row2["id"];
	$tang=$xem+1;
	if(isset($id)){mysql_query("update baihat set luottai ='$tang' where id='$id'");}
	if(eregi("\.\.", $filename)) die("<html><body OnLoad=\"javascript: alert('Xin lỗi không download file được.');history.back();\" bgcolor=\"#F0F0F0\"></body></html>");
	$file = str_replace("..", "", $filename);
	if(eregi("\.ht.+", $filename)||eregi("\.php+", $filename)||eregi("\.txt+", $filename)||eregi("\.htaccess+", $filename)) die("<html><body OnLoad=\"javascript: alert('Xin lỗi bạn không được phép download file này.');history.back();\" bgcolor=\"#F0F0F0\"></body></html>");
	$file = "$file";
	if(!file_exists($file)) die("<html><body OnLoad=\"javascript: alert('Xin lỗi không tìm thấy file.');history.back();\" bgcolor=\"#F0F0F0\"></body></html>");
	$type = filetype($file);
	$today = date("F j, Y, g:i a");
	$time = time();
	header("Content-type: $type");
	header("Content-Disposition: attachment;filename=$filename");
	header("Content-Transfer-Encoding: binary");
	header('Pragma: no-cache');
	header('Expires: 0');
	set_time_limit(0);
	readfile($file);  ?>
	<? ob_flush(); ?>