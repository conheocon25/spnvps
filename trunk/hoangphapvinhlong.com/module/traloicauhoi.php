<?php 
@session_start();
$user= $_SESSION["user"];
$pass= $_SESSION["pass"];
$quyen= $_SESSION["quyen"]; ?>
<?php  require './ketnoi.php';
 $sql2="select * from users where tennguoidung='$user'";
$kq2=mysql_query($sql2);
$row2=mysql_fetch_array($kq2);
$hoten2=$row2["hoten"];
if(isset($user)){	
?><style type="text/css">
<!--
.style2 {color: #FF0000}
-->
</style>
<div class="span8 fix-width">
	<?php 
	require './ketnoi.php';
$a=$_GET['id'];
$sql="select * from hoidapct where id='$a'";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
$id=$row["id"];
                                                  $hoten=$row["hoten"];
												  $chude=$row["chude"];
												  $cauhoi=$row["cauhoi"];
												  
												$ngayhoi=$row["ngayhoi"];
												 
												   
										$date = explode('-', $ngayhoi); 
										$day = $date[2]; 
										$month = $date[1]; 
										$year = $date[0];
										$kt="$day-$month-$year";?>				
					<div class="box radius">
						<div class="page-header pg-header pg-header-question reset-margin">
							<h4 class="reset-margin">Trả lời câu hỏi của <?php echo $hoten ?></h4>
						</div>
						<div class="b-content padding-content news-content">
							
							
							<div class="news-author">
								<p>Nội dung câu hỏi : <?php echo $cauhoi ?></p>
							</div>
							
							<form class="form-horizontal"method="post" name="f1" action="index.php?frame=traloicauhoi&act=do" onSubmit="return kiemtra();">
								<div class="control-group">
									<label class="control-label" for="Author1">Họ &amp; Tên</label>
								  <div class="controls">
										<input type="text" name="hoten" id="hoten" class="span4" value="<?php echo $hoten2 ?>" readonly="true">
									    <span class="style2">(*)</span></div>
								</div>
								<div class="control-group">
									
								</div>
								<div class="control-group">
									<label class="control-label" for="Question">Trả lời</label>
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
								<input name="id" type="text" value="<?php echo $a ?>" style="visibility:hidden" />
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

$a=$_POST["id"];
$hoten=$_POST["hoten"];
$cauhoi=$_POST["cauhoi"];
date_default_timezone_set("asia/bangkok");
$ngayhientai=date("Y-m-d");

if ($_POST['capcode'] != $_SESSION['captcha'] or $_SESSION['captcha'] == "")
{
echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Sai mã xác nhận');history.back();";
                    echo"</script>";
					
					exit();
}
else{
require'./ketnoi.php';
 $a=mysql_query("INSERT INTO hoidaptraloi (idcauhoi, traloi,nguoitraloi,ngaytl) VALUES ('{$a}', '{$cauhoi}', '{$hoten}','{$ngayhientai}')");
    // Thông báo hoàn tất việc tạo tài khoản
    if ($a){
       echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Câu trả lời đã được lưu lại')";
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