<?php 
@session_start();
$user= $_SESSION["user"];
$pass= $_SESSION["pass"];
$quyen= $_SESSION["quyen"]; ?>
<?php if(isset($user)){include'hienthilogin.php';}else{?>
<div class="span8 fix-width">
					<div class="box radius">
						<div class="page-header pg-header pg-header-login reset-margin">
							<h4 class="reset-margin">Đăng Nhập</h4>
						</div>
						<div class="b-content padding-content news-content"  align="center">
							<?php include'login.php' ?>
							<div class="news-author">
								<p>Nếu bạn chưa có tài khoảng vui lòng đăng ký theo form phía dưới</p>
							</div>
				<form class="form-horizontal"method="post" name="f1" action="?frame=dangky&act=do" onSubmit="return kiemtra();">			
            
			<div class="control-group">
									<label class="control-label" for="Author1">Họ và tên:</label>
			  <div class="controls">
										<input type="text" name="hoten" id="hoten" class="span4">
				    <span class="style2 style1">(*)</span></div>
				  </div>
								<div class="control-group">
									<label class="control-label" for="Author1">Giới tính:</label>
								  <div class="controls">
										<select name="gioitinh" class="span4">
						<option value="Nam">Nam</option>
						<option value="Nữ">Nữ</option>
						</select>
									    <span class="style2 style1">(*)</span></div>
								</div>
								<div class="control-group">
									<label class="control-label" for="Author1">Quốc gia:</label>
								  <div class="controls">
										<input name="quocgia" type="text" class="span4"/><span class="style2 style1">(*)</span></div>
								</div>
								<div class="control-group">
									<label class="control-label" for="Author1">Tên đăng nhập:</label>
								  <div class="controls">
										<input type="text" name="tennguoidung" id="tennguoidung" class="span4">
									    <span class="style2 style1">(*)</span></div>
								</div>
								<div class="control-group">
									<label class="control-label" for="Author1">Mật khẩu:</label>
								  <div class="controls">
										<input type="password" name="matkhau" id="matkhau" class="span4">
									    <span class="style2 style1">(*)</span></div>
								</div>
								<div class="control-group">
									<label class="control-label" for="Author1">Nhập lại mật khẩu:</label>
								  <div class="controls">
										<input type="password" name="matkhaunhaplai" id="matkhaunhaplai" class="span4">
									    <span class="style2 style1">(*)</span></div>
								</div>
								<div class="control-group">
									<label class="control-label" for="Author1">Địa chỉ Email:</label>
								  <div class="controls">
										<input type="text" name="diachiemail" id="diachiemail" class="span4">
									    <span class="style2 style1">(*)</span></div>
								</div>
								<div class="control-group">
									<label class="control-label" for="Author1">Số điện thoai:</label>
								  <div class="controls">
										<input type="text" name="sdt" id="sdt" class="span4">
									    <span class="style2 style1">(*)</span></div>
								</div>
								<div class="control-group">
									<label class="control-label" for="Author1">Mã xác nhận:</label>
								  <div class="controls">
										<input type="text" name="capcode" id="capcode" class="span4">
									    <span class="style2 style1">(*)</span></div>
								</div>
								<div class="control-group">
									<label class="control-label" for="Author1"></label>
								  <div class="controls">
										<img src="./module/captcha.php" class="captcha" />
									    </div>
								</div>
			<center><button type="submit" class="btn"> Đăng ký </button><button type="reset" class="btn"> Nhập lại </button></center>
			
</form>
<?php 
	if ( $_GET['act'] == "do" )
{


$hoten=$_POST["hoten"];
$gioitinh=$_POST["gioitinh"];
$quocgia=$_POST["quocgia"];
$tennguoidung=$_POST["tennguoidung"];
$matkhau=md5($_POST["matkhau"]);
$diachiemail=$_POST["diachiemail"];
$sdt=$_POST["sdt"];
$quyen=2;
if($gioitinh=="Nam"){
$hinh="data/images/user/nam.gif";}if($gioitinh=="Nữ"){
$hinh="data/images/user/nu.gif";}
date_default_timezone_set("asia/bangkok");
$ngayhientai=date("Y-m-d");
if( mysql_num_rows(mysql_query("SELECT tennguoidung FROM users WHERE tennguoidung='$tennguoidung'")))
    {
	 echo "<script>alert('Đăng ký không thành công. Tên người dùng này đã tồn tại');</script>";
	 
 echo "<script>window.location='index.php?frame=dangky'</script>";
 exit;
	}

if ($_POST['capcode'] != $_SESSION['captcha'] or $_SESSION['captcha'] == "")
{
echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Sai mã xác nhận')";
                    echo"</script>";
					
					exit();
}

require'./ketnoi.php';
 $a=mysql_query("INSERT INTO users(hoten,tennguoidung,email,matkhau,quocgia,quyen,gioitinh,ngaytao,hinh,sdt) VALUES ('{$hoten}', '{$tennguoidung}', '{$diachiemail}','{$matkhau}','{$quocgia}','{$quyen}','{$gioitinh}','{$ngayhientai}','{$hinh}','{$sdt}')");
    // Thông báo hoàn tất việc tạo tài khoản
    if (isset($a)){
       echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Quý phật tử đăng ký thành công. A di đà phật!')";
                    echo"</script>";
					
   } else{
        echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Có lổi trong quá trình đăng ký')";
                    echo"</script>";}


}
?>
</div></div></div>
<script language="javascript" type="text/javascript">
	function kiemtra(){
	
		if(document.f1.hoten.value==""||document.f1.gioitinh.value==""||document.f1.quocgia.value==""||document.f1.tennguoidung.value==""||document.f1.matkhau.value==""||document.f1.matkhaunhaplai.value==""||document.f1.diachiemail.value==""||document.f1.capcode.value==""||document.f1.sdt.value=="")
	{	
		alert('Vui lòng điền đầy đủ thông tin vào');
		document.f1.hoten.focus();
		return false;
	}
	if(document.f1.matkhau.value!=document.f1.matkhaunhaplai.value)
	{	
		alert('Nhập lại mật khẩu không đúng');
		document.f1.matkhau.focus();
		return false;
	}
	if(document.f1.diachiemail.value == "" || document.f1.diachiemail.value.indexOf('@')==-1 || document.f1.diachiemail.value.indexOf('.')==-1)
	{
		alert('Email Không Hợp Lệ');
		document.f1.diachiemail.focus();
		return false;
	}
	}
	</script>
	<?php }?>
