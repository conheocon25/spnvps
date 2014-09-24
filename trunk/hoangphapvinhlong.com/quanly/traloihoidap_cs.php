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
 $dulieu_sua="select*from hoidaptraloi where id = '$a'";
	$query_dulieu_sua=mysql_query($dulieu_sua);
	$row=mysql_fetch_array($query_dulieu_sua);	
$id=$row["id"];
                                                  $hoten=$row["hoten"];
												  $chude=$row["chude"];
												  $traloi=$row["traloi"];
									
										
?>
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=traloihoidap_cs&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Câu trả lời : </td><td><textarea name="traloi" cols="100" rows=""><?php echo $traloi ?></textarea></td></tr>
<input type="hidden" name="id" value="<?php echo $a ;?>">
 <tr><td></td><td><input name="submit" type="submit" value="Chỉnh Sửa" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';
$id=$_POST["id"];
$traloi=$_POST["traloi"];


	 $them=mysql_query("update `hoidaptraloi` set `traloi`='$traloi' where `id`='$id'"); 
 echo "<script>window.location='./?act=hoidap'</script>"; 
 
}
?>