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
 $dulieu_sua="select*from lienketweb where id = '$a'";
	$query_dulieu_sua=mysql_query($dulieu_sua);
	$row=mysql_fetch_array($query_dulieu_sua);	
$id=$row["id"];
                                                  $tieude=$row["tieude"];
												  $link=$row["link"];
												 
?>
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=lienketweb_cs&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Tiêu đề : </td><td><textarea name="tieude" cols="100" rows=""><?php echo $tieude ?></textarea></td></tr>
<tr><td>Link : </td><td><textarea name="link" cols="100" rows=""><?php echo $link ?></textarea></td></tr>

<input type="hidden" name="id" value="<?php echo $a ;?>">
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


    $them=mysql_query("update `lienketweb` set `tieude`='$tieude',`link`='$link' where `id`='$id'"); 
 echo "<script>window.location='./?act=lienketweb'</script>";
 
 
}
?>