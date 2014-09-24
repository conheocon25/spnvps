<?php @session_start();
$log= $_SESSION["log"];
$quyen= $_SESSION["quyen"]; ?>
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
 $dulieu_sua="select*from baihatvideo where id = '$a'";
	$query_dulieu_sua=mysql_query($dulieu_sua);
	$row=mysql_fetch_array($query_dulieu_sua);	
$id=$row["id"];
                                                  $tieude=$row["tieude"];
												 
												  $idalbum=$row["idalbum"];
												   $imgbg=$row["imgbg"];
												   $duongdan=$row["duongdan"];
												 
?>
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=nhacvideo_cs&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Tên danh mục : </td><td><textarea name="tieude" cols="100" rows=""><?php echo $tieude ?></textarea></td></tr>
<tr>
  <td>Thuộc danh mục: </td>
  <td><select name="chuyenmuc">
   <?php 							
require '../config.php';
$sql="select*from  albumvideo where id='$idalbum'";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $ten=$row["ten"];
                                                  $id=$row["id"];?>
												<option value="<?php echo $id ?>"><?php echo $ten ?></option>  
												  
						
						<?php }}?>
  <?php 							
require '../config.php';
$sql="select*from albumvideo where id !='$idalbum' order by id desc";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $ten=$row["ten"];
												  
                                                  $id=$row["id"];
												  
												   ?>
						<option value="<?php echo $id ?>"><?php echo $ten ?></option>
						<?php }}?></select></td>
</tr>
<tr><td>Đường dẫn:</td><td><textarea name="duongdan" cols="100" rows=""><?php echo $duongdan ?></textarea>
</td></tr>
<tr>
  <td>Chọn server nếu video là trên server: </td>
  <td><select name="server">
  <option value="0">Chọn server</option>
  
  <?php 							
require '../config.php';
$sql="select*from server";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $masv=$row["masv"];
                                                  $tensv=$row["tensv"];
												  
												   ?>
						<option value="<?php echo $tensv ?>"><?php echo $tensv ?></option>
						<?php }}?></select>
  
  </td>
</tr>
<tr><td>Chỉnh sửa hình nền:</td><td><input type="file" name="upload" />
<?php if(substr($imgbg,0,18)=='data/images/video/'){echo "<img src='../$imgbg' width='60px' height='50px' />";}else {echo "<img src='$imgbg' width='60px' height='50px' />";} ?>
<input type="hidden" name="id" value="<?php echo $a ;?>">
 <tr><td></td><td><input name="submit" type="submit" value="Chỉnh Sửa" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';
$duongdan=$_POST["duongdan"];
$id=$_POST["id"];
$tieude=$_POST["tieude"];
$server=$_POST["server"];
$chuyenmuc=$_POST["chuyenmuc"];
$url=$_POST["duongdan"];
if(substr($url,29,24)=='feature=player_embedded&'){$duongdan = str_replace("?feature=player_embedded&","?",$url);}else{$duongdan=$duongdan;}
$tieudetach = str_replace("www.youtube.com/watch?v=","img.youtube.com/vi/",$duongdan);
$imgbg="$tieudetach"."/default.jpg";

if($server!='0'){
$duongdansv="$server/$duongdan";
  $hinhsv = "data/images/video/video_icon.png";
     if($_FILES['upload']['name']==""){
	$them=mysql_query("update `baihatvideo` set `tieude`='$tieude',`duongdan`='$duongdansv',`idalbum`='$chuyenmuc',`imgbg`='$hinhsv' where `id`='$id'"); 
 echo "<script>window.location='./?act=nhacvideo'</script>";
	 }else{
	 $dir = "data/images/video/";
	 $types = array("image/gif","image/GIF","image/JPG","image/jpg","image/png","image/JPEG","image/jpeg","application/x-zip-compressed");     
     $tmp_name = $_FILES['upload']['tmp_name'];  
     $new_name = $_FILES['upload']['name'];
	 $hinh="$dir"."$new_name";
	 $tam="../";         
    move_uploaded_file($tmp_name,$tam.$dir . $new_name);
  $them=mysql_query("update `baihatvideo` set `tieude`='$tieude',`duongdan`='$duongdansv',`idalbum`='$chuyenmuc',`imgbg`='$hinh' where `id`='$id'"); 
 echo "<script>window.location='./?act=nhacvideo'</script>";
 
 }}else{

     if($_FILES['upload']['name']==""){
	$them=mysql_query("update `baihatvideo` set `tieude`='$tieude',`duongdan`='$duongdan',`idalbum`='$chuyenmuc',`imgbg`='$imgbg' where `id`='$id'"); 
 echo "<script>window.location='./?act=nhacvideo'</script>";
	 }else{
	 $dir = "data/images/video/";
	 $types = array("image/gif","image/GIF","image/JPG","image/jpg","image/png","image/JPEG","image/jpeg","application/x-zip-compressed");     
     $tmp_name = $_FILES['upload']['tmp_name'];  
     $new_name = $_FILES['upload']['name'];
	 $hinh="$dir"."$new_name";
	 $tam="../";         
    move_uploaded_file($tmp_name,$tam.$dir . $new_name);
 $them=mysql_query("update `baihatvideo` set `tieude`='$tieude',`duongdan`='$duongdan',`idalbum`='$chuyenmuc',`imgbg`='$hinh' where `id`='$id'"); 
 echo "<script>window.location='./?act=nhacvideo'</script>";
 
 }}}









?>