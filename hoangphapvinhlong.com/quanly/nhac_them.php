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
<form name="f1" action="?act=nhac_them&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Tên danh mục : </td><td><textarea name="tieude" cols="100" rows=""></textarea></td></tr>
<tr>
  <td>Thuộc danh mục: </td>
  <td><select name="chuyenmuc">
   <?php 							
require '../config.php';
$sql="select*from  album";
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
<tr><td>Nổi bậc : </td><td><select name="noibac"><option value="0">Không</option><option value="1">Có</option></select></td></tr>
<tr><td>Đường dẫn:</td><td><textarea name="duongdan" cols="100" rows=""></textarea>
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
 <tr><td></td><td><input name="submit" type="submit" value="Thêm mới" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';
$noibac=$_POST["noibac"];
$tieude=$_POST["tieude"];
$chuyenmuc=$_POST["chuyenmuc"];
$server=$_POST["server"];
$luottai=0;

$tam=$_POST["duongdan"];
$duongdan="$server/$tam";
$them=mysql_query("insert into  baihat(`tieude`,`duongdan`,`idalbum`,`noibac`,`luottai`)VALUES('{$tieude}','{$duongdan}','{$chuyenmuc}','{$noibac}','{$luottai}')"); 
 echo "<script>window.location='./?act=nhac'</script>";
 }
?>