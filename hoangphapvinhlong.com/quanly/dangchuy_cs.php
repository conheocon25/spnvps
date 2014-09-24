<?php @session_start();
$log= $_SESSION["log"];
$quyen= $_SESSION["quyen"]; ?>
 <script language="JavaScript" src="calendar_us.js"></script>
	<link rel="stylesheet" href="calendar.css">
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
<?php
require '../config.php';
$a=$_GET["id"];
 $dulieu_sua="select*from dangchuy where id = '$a'";
	$query_dulieu_sua=mysql_query($dulieu_sua);
	$row=mysql_fetch_array($query_dulieu_sua);	
$id=$row["id"];
                                                  $tieude=$row["tieude"];
												  
												  $link=$row["link"];
												
												   $hinh=$row["hinh"];
												    $footer=$row["footer"];
												 
?>
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=dangchuy_cs&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Tiêu đề : </td><td><textarea name="tieude" cols="100" rows=""><?php echo $tieude ?></textarea></td></tr>
<tr><td>Link : </td><td><textarea name="link" cols="100" rows="20"><?php echo $link ?></textarea></td></tr>

<tr><td>Hình nền: </td><td><input type="file" name="upload" />
<tr>
  <td>Thuộc footer: </td>
  <td><select name="footer"><?php if($footer==1){echo"<option value='1'>Có</option><option value='0'>Không</option>";}else {echo"<option value='0'>Không</option><option value='1'>Có</option>";}?></select></td>
</tr>
<input type="hidden" name="ten_anh" value="<?php echo $hinh ?>">
<input type="hidden" name="id" value="<?php echo $a ;?>">
<img src="../<?php echo $hinh ?>" width="130px" height="100px"></td></tr>
 <tr><td></td><td><input name="submit" type="submit" value="Chỉnh Sửa" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';
$tieude=$_POST["tieude"];
$id=$_POST["id"];
$link=$_POST["link"];
$footer=$_POST["footer"];
$ten_anh=$_POST["ten_anh"];

if($_FILES['upload']['tmp_name']==""){
    $them=mysql_query("update `dangchuy` set `tieude`='$tieude',`link`='$link',`hinh`='$ten_anh',`footer`='$footer' where `id`='$id'"); 
	echo "<script>alert('Sửa tin thành công');</script>";
		
 echo "<script>window.location='./?act=dangchuy'</script>";
 }else{
 $dir = "data/images/dangchuy/"; //Bạn nên thay đổi đường dẫn cho phù hợp 
//Kiều file, Gif, jpeg, zip ::bạn có thể sửa đổi nếu thích 
$types = array("image/gif","image/GIF","image/JPG","image/jpg","image/png","image/JPEG","image/jpeg","application/x-zip-compressed");     
//Check to determine if the submit button has been pressed  
//Shorten Variables  
     $tmp_name = $_FILES['upload']['tmp_name'];  
     $new_name = $_FILES['upload']['name'];
	 $duongdan="$dir"."$new_name";
	 $tam="../";
//Check MIME Type  
    if (in_array($_FILES['upload']['type'], $types)){                     
         //Move file from tmp dir to new location  
        move_uploaded_file($tmp_name,$tam.$dir . $new_name);
        
    }else{                 
    //Print Error Message  
     echo "<script>alert('{$_FILES['upload']['name']} Was Not Uploaded!');</script>";       
    //Debug  
   $name =  $_FILES['upload']['name'];  
   $type =    $_FILES['upload']['type'];  
   $size =    $_FILES['upload']['size'];  
   $tmp =     $_FILES['upload']['name'];      
   echo "Name: $name<br/ >Type: $type<br />Size: $size<br />Tmp: $tmp";               
    }
	  $them=mysql_query("update `dangchuy` set `tieude`='$tieude',`link`='$link',`hinh`='$duongdan',`footer`='$footer' where `id`='$id'"); 
 echo "<script>alert('Sửa tin thành công');</script>";
		echo "<script>window.location='./?act=dangchuy'</script>";
}}
?>