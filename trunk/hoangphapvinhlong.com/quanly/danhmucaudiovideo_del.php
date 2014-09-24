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
$sql=mysql_query("delete from theloaialbumvideo where id='$a'");
echo"<script language='javascript' type='text/javascript'>alert('Xóa thành công');</script>";
echo "<script>window.location='./?act=danhmucaudiovideo'</script>";
?>
</table>