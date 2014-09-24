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
 $dulieu_sua="select*from video_phanloai where maloai = '$a'";
	$query_dulieu_sua=mysql_query($dulieu_sua);
	$row=mysql_fetch_array($query_dulieu_sua);	
$id=$row["maloai"];
                                                  $name=$row["tenloai"];
												  $published=$row["hienthi"];
												 
?>
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=phanloai_cs&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Tên phân loại : </td><td><textarea name="name" cols="100" rows=""><?php echo $name ?></textarea></td></tr>
<tr>
  <td>Tình trạng: </td>
  <td><select name="published"><?php if($published==1){echo"<option value='1'>Có</option><option value='0'>Không</option>";}else {echo"<option value='0'>Không</option><option value='1'>Có</option>";}?></select></td>
</tr>
<input type="hidden" name="id" value="<?php echo $id ;?>">
 <tr><td></td><td><input name="submit" type="submit" value="Chỉnh Sửa" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';
$published=$_POST["published"];
$id=$_POST["id"];
$name=$_POST["name"];


    $them=mysql_query("update `video_phanloai` set `tenloai`='$name',`hienthi`='$published' where `maloai`='$id'"); 
 echo "<script>window.location='./?act=phanloai'</script>";
 
 
}
?>