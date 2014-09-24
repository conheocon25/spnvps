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
                                                  $hoten=$row["hoten"];
												  $tennguoidung=$row["tennguoidung"];
												  $email=$row["email"];
												  $matkhau=$row["matkhau"];
												
												
												  $ngaytao=$row["ngaytao"];
												 
												    $tinhtrang=$row["tinhtrang"];
												 
									
										
?>
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=user_cs&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Họ Tên:</td><td><input name="hoten" type="text"  value="<?php echo $hoten ?>" /></td></tr>
<tr><td>Tên truy cập</td><td><input name="tennguoidung" type="text" value="<?php echo $tennguoidung ?>"  /></td></tr>
<tr><td>Địa chỉ email</td><td><input name="email" type="text" value="<?php echo $email ?>"  /></td></tr>
<tr><td>Mật khẩu</td><td><input name="matkhau" type="password" value="<?php echo $matkhau ?>" /></td></tr>
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
$hoten=$_POST["hoten"];
$tennguoidung=$_POST["tennguoidung"];
$email=$_POST["email"];
$matkhau=md5($_POST["matkhau"]);
$id=$_POST["id"];


	 $them=mysql_query("update `users` set `tinhtrang`='$tinhtrang',`hoten`='$hoten',`tennguoidung`='$tennguoidung',`email`='$email',`matkhau`='$matkhau' where `id`='$id'"); 
 echo "<script>window.location='./?act=user'</script>"; 
 
}
?>