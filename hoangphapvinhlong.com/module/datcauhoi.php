<?php 
@session_start();
$user= $_SESSION["user"];
$pass= $_SESSION["pass"];
$quyen= $_SESSION["quyen"]; ?>
<?php  require './ketnoi.php';
 $sql="select * from users where tennguoidung='$user'";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
$hoten=$row["hoten"];
if(isset($user)){	
?>
<style type="text/css">
<!--
.style2 {color: #FF0000}
-->
</style>
<div class="span8 fix-width">
					
					<div class="box radius">
						<div class="page-header pg-header pg-header-question reset-margin">
							<h4 class="reset-margin">Đặt câu hỏi</h4>
						</div>
						<div class="b-content padding-content news-content">
							
							
							<div class="news-author">
								<p>Quí <b>PHẬT TỬ</b> có thể điền nội dung câu hỏi vào mẫu form ở dưới đây để gữi câu hỏi / trả lời</p>
							</div>
							
							<form class="form-horizontal"method="post" name="f1" action="index.php?frame=datcauhoi&act=do" onSubmit="return kiemtra();">
								<div class="control-group">
									<label class="control-label" for="Author1">Họ &amp; Tên</label>
								  <div class="controls">
										<input type="text" name="hoten" id="hoten" class="span4" value="<?php echo $hoten ?>" readonly="true">
									    <span class="style2">(*)</span></div>
								</div>
								<div class="control-group">
									<label class="control-label" for="IdCategory">Chủ đề</label>
									<div class="controls">
										<select id="chude" name="chude" class="span4">
										
										<?php
										require'./ketnoi.php';
										 $result =mysql_query("SELECT * FROM hoidap");
if(mysql_num_rows($result)!=0)
{
while ( $row = mysql_fetch_array($result )) 
{
$id=$row["id"];
$danhmuc=$row["danhmuc"];?>
											<option value="<?php echo $id ?>"><?php echo $danhmuc ?></option><?php
											
											}
											}
											?>
											
									  </select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="Question">Câu hỏi</label>
								  <div class="controls">
										<textarea name="cauhoi" id="cauhoi" cols="40" rows="2" class="span4"></textarea>
									    <span class="style2">(*)</span></div>
								</div><div class="control-group">
									<label class="control-label" for="CodeCaptcha">Mã xác nhận</label>
									<div class="controls">
									<input type="text" name="capcode" class="span4" />
									<span class="style2">(*)</span><br />
										<img src="./module/captcha.php" class="captcha" />									</div>
								</div>
								
								<center><button type="submit" class="btn">Gữi</button></center>
							</form>
							
							<div class="news-author">
								<center><p>Ngoài ra, quí PHẬT TỬ có thể gửi CÂU HỎI hoặc KẾT QUẢ trả lời CÂU HỎI đến email nhuantamkhaituong@gmail.com</p></center>
							</div>
						</div>
					</div>
					
				</div>
				<?php
				
				if ( $_GET['act'] == "do" )
{


$hoten=$_POST["hoten"];
$chude=$_POST["chude"];
$cauhoi=$_POST["cauhoi"];
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
 $a=mysql_query("INSERT INTO hoidapct (hoten, chude,cauhoi,ngayhoi) VALUES ('{$hoten}', '{$chude}', '{$cauhoi}','{$ngayhientai}')");
    // Thông báo hoàn tất việc tạo tài khoản
    if (isset($a)){
       echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Câu hỏi của quý phật tử đã được lưu lại. A di đà phật')";
                    echo"</script>";
					
   } else{
        echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Có lổi trong quá trình lưu lại')";
                    echo"</script>";}
}

}
?>
<script language="javascript" type="text/javascript">
	function kiemtra(){
		if(document.f1.hoten.value==""||document.f1.cauhoi.value==""||document.f1.capcode.value=="")
	{	
		alert('Vui lòng điền đầy đủ thông tin vào');
		document.f1.hoten.focus();
		return false;
	}
	}
	</script>
	<?php }else{echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Vui lòng đăng nhập. Nếu bạn chưa có tài khoảng vui lòng bấm vào đăng ký')";
                    echo"</script>";
					echo "<script>window.location='index.php?frame=dangky'</script>";} ?>