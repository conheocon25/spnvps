<?php 
@session_start();
$user= $_SESSION["user"];
$pass= $_SESSION["pass"];
$quyen= $_SESSION["quyen"];
if(isset($user)){ ?>
<?php  require './ketnoi.php';
 $sql="select * from users where tennguoidung='$user'";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
$hoten=$row["hoten"];	
$email=$row["email"];	
$quocgia=$row["quocgia"];
$gioitinh=$row["gioitinh"];	
$hinh=$row["hinh"];		
$sdt=$row["sdt"];	
?>
				<div class="spandk fix-width-3">
					<div class="box radius">
						<div class="b-title">
							<div class="b-t-icon-content">Danh mục cá nhân</div>
						</div>
						<div class="b-content">
							<ul class="nav nav-tabs nav-stacked reset-margin list-3">  
							<li class="news-list-item">
									<a href="index.php?frame=dangky">
									<span>Thông tin cá nhân</span></a>
								</li>                      
								<li class="news-list-item">
									<a href="index.php?frame=thaydoithongtincanhan">
									<span>Sửa thông tin cá nhân</span></a>
								</li>
								<li class="news-list-item">
									<a href="index.php?frame=thayhinhdaidien">
									<span>Thay hình đại diện</span></a>
								</li>
								
								<li class="news-list-item">
									<a href="index.php?frame=dangvideo">
									<span>Đăng Video</span></a>
								</li>
								<li class="news-list-item">
									<a href="index.php?frame=suavideodadang">
									<span>Chỉnh sửa các video đã đăng</span></a>
								</li>
								<li class="news-list-item">
									<a href="index.php?frame=dangxuat">
									<span>Đăng xuất</span></a>
								</li>

							</ul>
						</div>
					</div>					
				
				
				
				
					
									
				</div>
				
				
				
				<div class="span6 fix-width-3">
					<div class="box radius">
						<div class="b-title">
							<div class="b-t-icon-content">Trang cá nhân</div>
						</div>
						<div class="b-content news-content padding-content">
							<div class="news-author">
								<p>Thông tin của bạn</p>
							</div>
							<div class="alert alert-block clearfix reset-margin">
								<img src="<?php echo "$hinh"; ?>"  width="150px" height="250px"/><br />
								<?php
								echo "Tên bạn : $hoten <br> Giới tính : $gioitinh <br> Quốc gia : $quocgia <br> Địa chỉ email : $email<br> Số điện thoại : $sdt";
								 ?>
								
							</div>
							
							<div class="news-author">
								<p>Thay đổi thông tin</p>
							</div>
							<div class="alert alert-block clearfix reset-margin">
								<form class="form-horizontal"method="post" name="f1" action="index.php?frame=thaydoithongtincanhan&act=do" onSubmit="return kiemtra();">			
            
			<div class="control-group">
									<label class="control-label" for="Author1">Họ và tên: <span class="style2 style1">(*)</span></label>
			  <div class="controls">
										<input type="text" name="hoten" id="hoten" value="<?php echo $hoten ?>">
				    </div>
				  </div>
								<div class="control-group">
									<label class="control-label" for="Author1">Giới tính:  <span class="style2 style1">(*)</span></label>
								  <div class="controls">
										<select name="gioitinh">
										<option value="<?php echo $gioitinh ?>"><?php echo $gioitinh ?></option>
						<option value="Nam">Nam</option>
						<option value="Nữ">Nữ</option>
						</select>
									   </div>
								</div>
								<div class="control-group">
									<label class="control-label" for="Author1">Quốc gia: <span class="style2 style1">(*)</span></label>
								  <div class="controls">
										<input name="quocgia" type="text" value="<?php echo $quocgia ?>"/>
									    </div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="Author1">Mật khẩu: <span class="style2 style1">(*)</span></label>
								  <div class="controls">
										<input type="password" name="matkhau" id="matkhau">
									    </div>
								</div>
								<div class="control-group">
									<label class="control-label" for="Author1">Nhập lại mật khẩu: <span class="style2 style1">(*)</span></label>
								  <div class="controls">
										<input type="password" name="matkhaunhaplai" id="matkhaunhaplai">
									    </div>
								</div>
								<div class="control-group">
									<label class="control-label" for="Author1">Địa chỉ Email: <span class="style2 style1">(*)</span></label>
								  <div class="controls">
										<input type="text" name="diachiemail" id="diachiemail" value="<?php echo $email ?>">
									    </div>
								</div>
								<div class="control-group">
									<label class="control-label" for="Author1">Số điện thoại: <span class="style2 style1">(*)</span></label>
								  <div class="controls">
										<input type="text" name="sdt" id="sdt" value="<?php echo $sdt ?>">
									    </div>
								</div>
								<div class="control-group">
									<label class="control-label" for="Author1">Mã xác nhận:  <span class="style2 style1">(*)</span></label>
								  <div class="controls">
										<input type="text" name="capcode" id="capcode" >
									   </div>
								</div>
								<div class="control-group">
									<label class="control-label" for="Author1"></label>
								  <div class="controls">
										<img src="./module/captcha.php" class="captcha" />
									    </div>
								</div>
			<center><button type="submit" class="btn"> Chỉnh sửa </button><button type="reset" class="btn"> Nhập lại </button></center>
			
</form>
								
							</div>
							
							
							
						</div>
					</div>
				</div>
<?php 
	if ( $_GET['act'] == "do" )
{


$hoten=$_POST["hoten"];
$gioitinh=$_POST["gioitinh"];
$quocgia=$_POST["quocgia"];
$matkhau=md5($_POST["matkhau"]);
$diachiemail=$_POST["diachiemail"];
$sdt=$_POST["sdt"];
$quyen=2;
if($gioitinh=="Nam"){
$hinh="data/images/user/nam.gif";}if($gioitinh=="Nữ"){
$hinh="data/images/user/nu.gif";}
date_default_timezone_set("asia/bangkok");
$ngayhientai=date("Y-m-d");

if ($_POST['capcode'] != $_SESSION['captcha'] or $_SESSION['captcha'] == "")
{
echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Sai mã xác nhận')";
                    echo"</script>";
					
					exit();
}
else{
require'./ketnoi.php';
 $a=mysql_query("update users set hoten='$hoten',email='$diachiemail',matkhau='$matkhau',quocgia='$quocgia',quyen='$quyen',gioitinh='$gioitinh',ngaytao='$ngayhientai',sdt='$sdt' where tennguoidung = '$user'");
    // Thông báo hoàn tất việc tạo tài khoản
    if (isset($a)){
       echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Sửa thông tin thành công')";
                    echo"</script>";
					
   } else{
        echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Có lổi trong quá trình sửa thông tin')";
                    echo"</script>";}


}
}
?>
				
				
				
				<script language="javascript" type="text/javascript">
	function kiemtra(){
	
		if(document.f1.hoten.value==""||document.f1.gioitinh.value==""||document.f1.matkhau.value==""||document.f1.matkhaunhaplai.value==""||document.f1.diachiemail.value==""||document.f1.capcode.value=="")
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
	<?php }else{echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Vui lòng đăng nhập. Nếu bạn chưa có tài khoảng vui lòng bấm vào đăng ký')";
                    echo"</script>";
					echo "<script>window.location='index.php?frame=dangky'</script>";} ?>