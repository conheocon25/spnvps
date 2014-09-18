<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css_java/style.css">
<link rel="stylesheet" type="text/css" href="css_java/theme.css">
<link rel="stylesheet" type="text/css" href="css_java/bootstrap.css" media="screen">
<title>Chùa Hoàng Pháp Vĩnh Long</title>
<style type="text/css">
<!--
.style1 {color: #0000FF}
-->
</style>
</head>
<?php
session_start();
$timeout = 10;
$session_name = "time";
if ( isset($_SESSION["{$session_name}"]) && ( $_SESSION["{$session_name}"] >= time() - $timeout ) ) 
{
echo "Vui lòng đợi sau $timeout giây nữa reply của bạn mới được chấp nhận.";
exit();
}
$_SESSION["{$session_name}"] = time();
?>
<body align="center">
<?php 
require 'ketnoi.php';
	$idbh= $_GET['id'];
	$sql2="select*from video_video where id = '$idbh'";
	$kq2=mysql_query($sql2);
	$row2=mysql_fetch_array($kq2);
	$xem=$row2["luottaivideo"];
	$id=$row2["id"];
	$tang=$xem+1;
	$video=$row2["video"];
	if(isset($id)){mysql_query("update video_video set luottaivideo ='$tang' where id='$id'");}
	if(substr($video,0,22)=='http://www.youtube.com' || substr($video,0,23)=='https://www.youtube.com'){
								$linktai= str_replace("watch?v=","embed/",$video); }else{$linktai=$video; }
	
	
	
	?>
	<script type="text/javascript">
var time = 10; //How long (in seconds) to countdown
var page = "<?php echo $linktai; ?>"; //The page to redirect to
function countDown(){
time--;
gett("container").innerHTML = time;
if(time == -1){
window.location = page;
}
}
function gett(id){
if(document.getElementById) return document.getElementById(id);
if(document.all) return document.all.id;
if(document.layers) return document.layers.id;
if(window.opera) return window.opera.id;
}
function init(){
if(gett('container')){
setInterval(countDown, 1000);
gett("container").innerHTML = time;
}
else{
setTimeout(init, 50);
}
}
document.onload = init();
</SCRIPT>
<div class="popuptvd" align="center">
	<div class="popuptvd-header">
		<h2>Hoằng Pháp Vĩnh Long</h2>
		<p><a href="http://hoangphapvinhlong.com/">hoangphapvinhlong.com</a></p>
	</div>
  <div class="info_popuptvd" align="center">
		<p align="center">
		Để giảm tải tài nguyên hệ thống quý phật tử hoan hỷ không download server Hoằng Pháp Vĩnh Long trừ khi các server khác không hoạt động, Xin cám ơn 
Mọi chi tiết xin liên hệ hoangphapvinhlong.com</p><p align="center">
<span class="style1">Bấm vào Tải Video Nếu không muốn chờ lâu. Trang sẻ tự động chuyển sau </span><span id="container"></span> <span class="style1"> Giây</span>!</p>
<p><a target="_" href="<?php echo $linktai ?>">Tải Video</a>	</p>
</div>
</div>
</body>
</html>
