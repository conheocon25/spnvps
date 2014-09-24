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
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=nhacvideo_them&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Tên danh mục : </td><td><textarea name="tieude" cols="100" rows=""></textarea></td></tr>
<tr>
  <td>Thuộc danh mục: </td>
  <td><select name="chuyenmuc">
   <?php 							
require '../config.php';
$sql="select*from  albumvideo";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $ten=$row["ten"];
                                                  $id=$row["id"];?>
												<option value="<?php echo $id ?>"><?php echo $ten ?></option>  
												  
						
						<?php }}?>
 </select></td>
</tr>
<tr><td>Đường dẫn:</td><td><textarea name="duongdan" cols="100" rows=""></textarea>
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
</td></tr>
 <tr><td></td><td><input name="submit" type="submit" value="Thêm" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';


$tieude=$_POST["tieude"];
$server=$_POST["server"];
$duongdan=$_POST["duongdan"];
$chuyenmuc=$_POST["chuyenmuc"];
if(substr($url,29,24)=='feature=player_embedded&'){$duongdan = str_replace("?feature=player_embedded&","?",$url);}else{$duongdan=$duongdan;}
$tieudetach = str_replace("www.youtube.com/watch?v=","img.youtube.com/vi/",$duongdan);
$imgbg="$tieudetach"."/default.jpg";


if($server!='0'){
$duongdansv="$server/$duongdan";
  $hinhsv = "data/images/video/video_icon.png";
     if($_FILES['upload']['name']==""){
	 $them=mysql_query("insert into  baihatvideo(`tieude`,`duongdan`,`idalbum`,`imgbg`)VALUES('{$tieude}','{$duongdansv}','{$chuyenmuc}','{$hinhsv}')"); 
 echo "<script>window.location='./?act=nhacvideo'</script>";
	 }else{
	 $dir = "data/images/video/";
	 $types = array("image/gif","image/GIF","image/JPG","image/jpg","image/png","image/JPEG","image/jpeg","application/x-zip-compressed");     
     $tmp_name = $_FILES['upload']['tmp_name'];  
     $new_name = $_FILES['upload']['name'];
	 $hinh="$dir"."$new_name";
	 $tam="../";         
    move_uploaded_file($tmp_name,$tam.$dir . $new_name);
  $them=mysql_query("insert into  baihatvideo(`tieude`,`duongdan`,`idalbum`,`imgbg`)VALUES('{$tieude}','{$duongdansv}','{$chuyenmuc}','{$hinh}')"); 
 echo "<script>window.location='./?act=nhacvideo'</script>";
 
 }}else{

     if($_FILES['upload']['name']==""){
	 $them=mysql_query("insert into  baihatvideo(`tieude`,`duongdan`,`idalbum`,`imgbg`)VALUES('{$tieude}','{$duongdan}','{$chuyenmuc}','{$imgbg}')"); 
 echo "<script>window.location='./?act=nhacvideo'</script>";
	 }else{
	 $dir = "data/images/video/";
	 $types = array("image/gif","image/GIF","image/JPG","image/jpg","image/png","image/JPEG","image/jpeg","application/x-zip-compressed");     
     $tmp_name = $_FILES['upload']['tmp_name'];  
     $new_name = $_FILES['upload']['name'];
	 $hinh="$dir"."$new_name";
	 $tam="../";         
    move_uploaded_file($tmp_name,$tam.$dir . $new_name);
  $them=mysql_query("insert into  baihatvideo(`tieude`,`duongdan`,`idalbum`,`imgbg`)VALUES('{$tieude}','{$duongdan}','{$chuyenmuc}','{$hinh}')"); 
 echo "<script>window.location='./?act=nhacvideo'</script>";
 
 }}}
?>