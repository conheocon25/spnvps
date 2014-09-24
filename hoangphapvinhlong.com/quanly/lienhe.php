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
<script language="javascript" src="fckeditor/fckeditor.js"></script>
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<?php
require '../config.php';
 $sql="select*from lienhe";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
											
                                                while($row=mysql_fetch_array($kq))
                                                {
												  $vitri=$row["vitri"];
$noidung=$row["noidung"];

?>
<form name="f1" action="?act=lienhe&lenh=do<?php echo $vitri ?>" method="post" enctype="multipart/form-data">
<tr><td>Vị trí : </td><td><input name="vitri<?php echo $vitri ?>" type="text" value="<?php echo $vitri ?>" readonly="true" /></td></tr>
<tr><td>Nội dung : </td><td><textarea name="noidung<?php echo $vitri ?>" cols="130" rows="10"><?php echo $noidung ?></textarea></td></tr>
 <tr><td></td><td><input name="submit" type="submit" value="Chỉnh Sửa" /></td></tr>
 </form>
<?php }} ?>

</table>
<?php

if ( $_GET['lenh'] =="dotrai")
{
require '../config.php';
$vitritrai=$_POST["vitritrai"];
$noidungtrai=$_POST["noidungtrai"];

    $them=mysql_query("update `lienhe` set `noidung`='$noidungtrai' where `vitri`='$vitritrai'"); 
 echo "<script>window.location='./?act=lienhe'</script>";
}
if ( $_GET['lenh'] =="dophai")
{
require '../config.php';
$vitriphai=$_POST["vitriphai"];
$noidungphai=$_POST["noidungphai"];

    $them=mysql_query("update `lienhe` set `noidung`='$noidungphai' where `vitri`='$vitriphai'"); 
 echo "<script>window.location='./?act=lienhe'</script>";
}
if ( $_GET['lenh'] =="dotranglienhe")
{
require '../config.php';
$vitritranglienhe=$_POST["vitritranglienhe"];
$noidungtranglienhe=$_POST["noidungtranglienhe"];

    $them=mysql_query("update `lienhe` set `noidung`='$noidungtranglienhe' where `vitri`='$vitritranglienhe'"); 
 echo "<script>window.location='./?act=lienhe'</script>";
}
?>