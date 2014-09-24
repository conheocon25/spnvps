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
<form name="f1" action="?act=danhmuctuthien_them&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Tên danh mục : </td><td><textarea name="name" cols="100" rows=""><?php echo $name ?></textarea></td></tr>
<tr>
  <td>Tình trạng: </td>
  <td><select name="published"><option value='0'>Không</option><option value='1'>Có</option></select></td>
</tr>
 <tr><td></td><td><input name="submit" type="submit" value="Chỉnh Sửa" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';
$name=$_POST["name"];
$published=$_POST["published"];

     $them=mysql_query("insert into tuthien_danhmuc(`name`,`published`)VALUES('{$name}','{$published}')"); 
 echo "<script>window.location='./?act=danhmuctuthien'</script>";
 
 
}
?>