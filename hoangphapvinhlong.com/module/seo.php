<?php
require './ketnoi.php';
if($_GET['frame'] == "tintucct" ){ 
$a=$_GET['id'];
$sql="select * from content_items i,users u where i.id='$a' and u.id=i.created_by";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
                                                  $title=$row["title"];  ?>
	
		
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Expires" content="-1">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta name="title" content="<?php echo "$title"; ?>,Phật Pháp Tồng Hợp">
		<meta name="copyright" content="Phật Pháp Tồng Hợp[ngoi_sao269@yahoo.com]">
		<meta name="generator" content="<?php echo "$title"; ?>" />
		<meta name="keywords" content="<?php echo "$title"; ?>,Phật Pháp Tồng Hợp,Phat phap tong hop">
		
<?php	
}else		
if($_GET['frame'] == "tuthienct" ){
$a=$_GET['id'];
$sql="select * from tuthien_ct i,users u where i.id='$a' and u.id=i.created_by";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
                                                  $title=$row["title"];?>
	
		
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Expires" content="-1">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta name="title" content="<?php echo "$title"; ?>,Phật Pháp Tồng Hợp">
		<meta name="copyright" content="Phật Pháp Tồng Hợp[ngoi_sao269@yahoo.com]">
		<meta name="generator" content="<?php echo "$title"; ?>" />
		<meta name="keywords" content="<?php echo "$title"; ?>,Phật Pháp Tồng Hợp,Phat phap tong hop">
		
		
<?php	
}else		
if($_GET['frame'] == "thongbaoct" ){
$a=$_GET['id'];
$sql="select * from thongbao";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
                                                  $title=$row["tieude"];?>
	
		
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Expires" content="-1">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta name="title" content="<?php echo "$title"; ?>,Phật Pháp Tồng Hợp">
		<meta name="copyright" content="Phật Pháp Tồng Hợp[ngoi_sao269@yahoo.com]">
		<meta name="generator" content="<?php echo "$title"; ?>" />
		<meta name="keywords" content="<?php echo "$title"; ?>,Phật Pháp Tồng Hợp,Phat phap tong hop">
		
		
<?php	
}else	
if($_GET['frame'] == "sukienct" ){
$a=$_GET['id'];
$sql="select * from event where id='$a'";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
                                                  $title=$row["tieude"];?>
	
		
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Expires" content="-1">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta name="title" content="<?php echo "$title"; ?>,Phật Pháp Tồng Hợp">
		<meta name="copyright" content="Phật Pháp Tồng Hợp[ngoi_sao269@yahoo.com]">
		<meta name="generator" content="<?php echo "$title"; ?>" />
		<meta name="keywords" content="<?php echo "$title"; ?>,Phật Pháp Tồng Hợp,Phat phap tong hop">
		
		
<?php	
}else
if($_GET['frame'] == "videoplayer" ){
$a=$_GET['id2'];
$sql="select * from video_video where id='$a'";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
                                                  $title=$row["title"];?>
	
		
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Expires" content="-1">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta name="title" content="<?php echo "$title"; ?>,Chùa phù châu">
		<meta name="copyright" content="chùa phù châu[ngoi_sao269@yahoo.com]">
		<meta name="generator" content="<?php echo "$title"; ?>" />
		<meta name="keywords" content="<?php echo "$title"; ?>,Chùa phù châu,chua phu chau">
		
		
<?php	
}else
if($_GET['frame'] == "videogiangsu" ){
$a=$_GET['id2'];
$sql="select * from  video_categories where id='$a'";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
                                                  $title=$row["name"];?>
	
		
		<meta http-equiv="Pragma" content="no-cache">
		<meta http-equiv="Expires" content="-1">
		<meta http-equiv="Cache-Control" content="no-cache">
		<meta name="title" content="<?php echo "$title"; ?>,Chùa phù châu">
		<meta name="copyright" content="chùa phù châu[ngoi_sao269@yahoo.com]">
		<meta name="generator" content="<?php echo "$title"; ?>" />
		<meta name="keywords" content="<?php echo "$title"; ?>,Chùa phù châu,chua phu chau">
		
		
<?php	
}
?>