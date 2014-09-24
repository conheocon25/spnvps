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
<form name="f1" action="?act=user_them&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Họ Tên:</td><td><input name="hoten" type="text"  value="" /></td></tr>
<tr><td>Tên truy cập</td><td><input name="tennguoidung" type="text" value=""  /></td></tr>
<tr><td>Địa chỉ email</td><td><input name="email" type="text" value=""  /></td></tr>
<tr><td>Mật khẩu</td><td><input name="matkhau" type="password" value="" /></td></tr>
<tr><td>Tình trạng : </td><td><select name="tinhtrang"><option value='0'>Bình thường</option><option value='1'>Tạm khóa</option></select></td></tr>
 <tr><td></td><td><input name="submit" type="submit" value="Thêm" /></td></tr>

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
$quyen=3;
date_default_timezone_set("asia/bangkok");
$created=date("Y-m-d");
if( mysql_num_rows(mysql_query("SELECT tennguoidung FROM users WHERE tennguoidung='$tennguoidung'")))
    {
	 echo "<script>alert('Thêm không thành công. User này đã tồn tại');</script>";
	 
 echo "<script>window.location='./?act=user'</script>";
 exit;
	}
	 $them=mysql_query("insert into users(`tinhtrang`,`hoten`,`tennguoidung`,`email`,`matkhau`,`ngaytao`,`quyen`)VALUES('{$tinhtrang}','{$hoten}','{$tennguoidung}','{$email}','{$matkhau}','{$created}','{$quyen}')"); 
 echo "<script>window.location='./?act=user'</script>"; 
 
}
?>