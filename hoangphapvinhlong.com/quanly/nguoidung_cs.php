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
 $dulieu_sua="select*from users where id = '$a'";
	$query_dulieu_sua=mysql_query($dulieu_sua);
	$row=mysql_fetch_array($query_dulieu_sua);	
$id=$row["id"];
                                                  $tinhtrang=$row["tinhtrang"];
												 
									
										
?>
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=nguoidung_cs&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Tình trạng : </td><td><select name="tinhtrang"><?php if($tinhtrang==0){echo"<option value='0'>Bình thường</option><option value='1'>Tạm khóa</option>";}else {echo"<option value='1'>Tạm khóa</option><option value='0'>Bình thường</option>";}?></select></td></tr>
<input type="hidden" name="id" value="<?php echo $a ;?>">
 <tr><td></td><td><input name="submit" type="submit" value="Chỉnh Sửa" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';
$tinhtrang=$_POST["tinhtrang"];
$id=$_POST["id"];


	 $them=mysql_query("update `users` set `tinhtrang`='$tinhtrang' where `id`='$id'"); 
 echo "<script>window.location='./?act=nguoidung'</script>"; 
 
}
?>