<?php @session_start();
$log= $_SESSION["log"];
$quyen= $_SESSION["quyen"];
if(isset($log) and $quyen == '1'){	
?>
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
 $dulieu_sua="select*from anhhoatdong where id = '$a'";
	$query_dulieu_sua=mysql_query($dulieu_sua);
	$row=mysql_fetch_array($query_dulieu_sua);	
$id=$row["id"];
                                                  $tieude=$row["tieude"];
												  $noidung=$row["noidung"];
?>
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=anhhoatdong_cs&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Tiêu đề : </td><td><textarea name="tieude" cols="100" rows=""><?php echo $tieude ?></textarea></td></tr>
<tr><td>Nội dung : </td><td><textarea name="noidung" cols="100" rows="20"><?php echo $noidung ?></textarea></td></tr>
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
$noidung=$_POST["noidung"];

    $them=mysql_query("update `anhhoatdong` set `tieude`='$tieude',`noidung`='$noidung' where `id`='$id'"); 
 echo "<script>window.location='./?act=anhhoatdong'</script>";
 
 
}
?>
<?php }else{echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Bạn không có quyền này vui lòng liên hệ với Admin')";
                    echo"</script>";
					exit();} ?>