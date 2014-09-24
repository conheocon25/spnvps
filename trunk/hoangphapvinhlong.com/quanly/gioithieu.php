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
<script src="ckeditor/ckeditor.js"></script>
<?php
require '../config.php';
 $dulieu_sua="select*from gioithieu";
	$query_dulieu_sua=mysql_query($dulieu_sua);
	$row=mysql_fetch_array($query_dulieu_sua);	
$id=$row["ma"];
$noidung=$row["noidung"];
?>
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=gioithieu&lenh=do" method="post" enctype="multipart/form-data">

<tr><td>Nội dung : </td><td><textarea name="editor1"><?php echo "$noidung"; ?></textarea>
        <script>
            CKEDITOR.replace( 'editor1' );
        </script></td></tr>
<input type="hidden"  name="id" value="<?php echo $id ;?>">
 <tr><td></td><td><input name="submit" type="submit" value="Chỉnh Sửa" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';
$id=$_POST["id"];
$noidung=$_POST["editor1"];

    $them=mysql_query("update `gioithieu` set `noidung`='$noidung' where `ma`='$id'"); 
 echo "<script>window.location='./?act=gioithieu'</script>";
 
 
}
?>