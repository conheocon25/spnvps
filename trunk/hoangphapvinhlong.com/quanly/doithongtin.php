<?php
@session_start();
$log= $_SESSION["log"];
$quyen= $_SESSION["quyen"];
require"../config.php";
 $sql="select * from users where tennguoidung='$log' and quyen='$quyen'";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
$hoten=$row["hoten"];	
$tennguoidung=$row["tennguoidung"];	
$matkhau=$row["matkhau"];
$id=$row["id"];		
?>
				
<form class="form-horizontal"method="post" name="f1" action="?act=doithongtin&lenh=do"s>			
 <table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=doithongtin&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Họ Tên : </td><td><input type="text" name="hoten" id="hoten" value="<?php echo $hoten ?>"></td></tr>
<tr><td>Tên truy cập : </td><td><input type="text" name="tennguoidung" id="tennguoidung" value="<?php echo $tennguoidung ?>" readonly="true"></td></tr>
<tr><td>Mật Khẩu : </td><td><input type="password" name="mk" id="mk" value="<?php echo $matkhau ?>"></td></tr>
<input type="hidden" name="id" value="<?php echo $id ?>">
										
				  
							
			 <tr><td></td><td><input name="submit" type="submit" value="Chỉnh Sửa" /></td></tr>

</form>
</table>
								
							
<?php 
	if ( $_GET['lenh'] == "do" )
{
$hoten=$_POST["hoten"];
$mk=md5($_POST["mk"]);
$tennguoidung=$_POST["tennguoidung"];
$id=$_POST["id"];
$matkhau=md5($_POST["mk"]);
$quyen=1;
require"../config.php";
 $a=mysql_query("update users set hoten='$hoten',matkhau='$matkhau',quyen='$quyen',tennguoidung='$tennguoidung' where id = '$id'");
    // Thông báo hoàn tất việc tạo tài khoản
    if (isset($a)){
       echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Sửa thành công')";
                    echo"</script>";
					unset($_SESSION['log']);
		echo "<script>window.location='./?frame=home'</sc"."ript>";
					
   } else{
        echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Có lổi trong quá trình sửa')";
                    echo"</script>";}

}
?>
				