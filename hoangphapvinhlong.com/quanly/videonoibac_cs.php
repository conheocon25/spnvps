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
 $dulieu_sua="select*from videonoibac where id = '$a'";
	$query_dulieu_sua=mysql_query($dulieu_sua);
	$row=mysql_fetch_array($query_dulieu_sua);	
$id=$row["id"];
                                                  $link=$row["link"];
												  $hienthi=$row["hienthi"];
												  
												 
?>
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=videonoibac_cs&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Link : </td><td><textarea name="link" cols="100" rows=""><?php echo $link ?></textarea></td></tr>
<tr><td>Công bố : </td><td><select name="hienthi"><?php if($hienthi==1){echo"<option value='1'>Có</option><option value='0'>Không</option>";}else {echo"<option value='0'>Không</option><option value='1'>Có</option>";}?></select></td></tr>
<input type="hidden" name="id" value="<?php echo $id ;?>">
 <tr><td></td><td><input name="submit" type="submit" value="Chỉnh Sửa" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';
$link=$_POST["link"];
$id=$_POST["id"];
$hienthi=$_POST["hienthi"];

    $them=mysql_query("update `videonoibac` set `link`='$link',`hienthi`='$hienthi' where `id`='$id'"); 
 echo "<script>window.location='./?act=videonoibac'</script>";
 
 
}
?>