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
<form name="f1" action="?act=videonoibac_them&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Tiêu đề : </td><td><textarea name="tieude" cols="100" rows=""></textarea></td></tr>
<tr>
  <td>Link: </td>
  <td><input name="link" type="text" value="" size="100" /></td>
</tr>
 <tr><td></td><td><input name="submit" type="submit" value="Chỉnh Sửa" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';
$tieude=$_POST["tieude"];
$link=$_POST["link"];

     $them=mysql_query("insert into videonoibac(`link`,`tieude`)VALUES('{$link}','{$tieude}')"); 
 echo "<script>window.location='./?act=videonoibac'</script>";
 
 
}
?>