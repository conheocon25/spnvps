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
 $dulieu_sua="select*from baihat where id = '$a'";
	$query_dulieu_sua=mysql_query($dulieu_sua);
	$row=mysql_fetch_array($query_dulieu_sua);	
$id=$row["id"];
                                                  $tieude=$row["tieude"];
												  $duongdan=$row["duongdan"];
												  $idalbum=$row["idalbum"];
												 
?>
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=nhac_cs&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Tên danh mục : </td><td><textarea name="tieude" cols="100" rows=""><?php echo $tieude ?></textarea></td></tr>
<tr>
  <td>Thuộc danh mục: </td>
  <td><select name="chuyenmuc">
   <?php 							
require '../config.php';
$sql="select*from  album where id='$idalbum'";
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
$sql="select*from album where id !='$idalbum' order by id desc";
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
<tr><td>Nổi bậc : </td><td><select name="noibac"><option value="0">Không</option><option value="1">Có</option></select></td></tr>
<tr><td>Đường dẫn:</td><td><textarea name="duongdan" cols="100" rows=""><?php echo "$duongdan";?></textarea><br/> Chú ý: Ghi đường dẫn tuyệt đối trong thư mục chứa bài hát Audio.
</td></tr>
<tr>
  <td>Chọn server</td>
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
<input type="hidden" name="id" value="<?php echo $a ;?>">
 <tr><td></td><td><input name="submit" type="submit" value="Chỉnh Sửa" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';
$id=$_POST["id"];
$tieude=$_POST["tieude"];
$chuyenmuc=$_POST["chuyenmuc"];
$noibac=$_POST["noibac"];
$tam=$_POST["duongdan"];
$server=$_POST["server"];
$duongdan2="$server/$tam";
	 $them=mysql_query("update `baihat` set `tieude`='$tieude',`duongdan`='$duongdan2',`idalbum`='$chuyenmuc',`noibac`='$noibac' where `id`='$id'"); 
 echo "<script>window.location='./?act=nhac'</script>";
 }
 
?>