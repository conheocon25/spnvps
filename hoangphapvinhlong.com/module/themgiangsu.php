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
$email=$row["email"];	
$quocgia=$row["quocgia"];
$gioitinh=$row["gioitinh"];	
$hinh=$row["hinh"];		
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
							<div class="b-t-icon-content">Thêm giảng sư</div>
						</div>
						<div class="b-content news-content padding-content">
							<div class="news-author">
								<p>Thêm giảng sư</p>
							</div>
							<div class="alert alert-block clearfix reset-margin">
								<form class="form-horizontal"method="post" name="f1" action="index.php?frame=themgiangsu&act=do" onSubmit="return kiemtra();">			
            
			<div class="control-group">
									<label class="control-label" for="Author1">Phân loại:  <span class="style2 style1">(*)</span></label>
			  <div class="controls">
										<select name="phanloai" id="phanloai">
										
										<?php 
 require './ketnoi.php';
$sql2="select*from video_phanloai";
$kq2=mysql_query($sql2);
  if(mysql_num_rows($kq2)!=0)
                                            {
                                                while($row2=mysql_fetch_array($kq2))
                                                {
											
                                                  $maloai=$row2["maloai"];
												   $tenloai=$row2["tenloai"];?>
						<option value="<?php echo $maloai ?>"><?php echo $tenloai ?></option>
						
						<?php }} ?>
					</select>
				   </div>
				  </div>
								<div class="control-group">
									<label class="control-label" for="Author1">Giảng sư: <span class="style2 style1">(*)</span></label>
								  <div class="controls">
										<input type="text" name="giangsu" id="giangsu">
							      </div>
								</div>
								<div class="control-group">
									<label class="control-label" for="Author1">Chuyên đề: <span class="style2 style1">(*)</span></label>
								  <div class="controls">
										<input type="text" name="chuyende" id="chuyende">
							      </div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="Author1">Mã xác nhận:  <span class="style2 style1">(*)</span></label>
								  <div class="controls">
										<input type="text" name="capcode" id="capcode">
									   </div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="Author1"></label>
								  <div class="controls">
										<img src="./module/captcha.php" class="captcha" />
									    </div>
										Lưu ý : Bạn chỉ được phép chọn giữa "Giảng sư" và "Chuyên đề" không được phép điền vào cả 2
								</div>
			<center><button type="submit" class="btn"> Thêm giảng sư </button><button type="reset" class="btn"> Nhập lại </button></center>
			
</form>
<?php 
	if ( $_GET['act'] == "do" )
{
$phanloai=$_POST["phanloai"];
$chuyende=$_POST["chuyende"];
$giangsu=$_POST["giangsu"];
$congbo=1;
$chuyendec=1;
$chuyendek=0;
$noibac=0;
$img="";

function utf8convert($str) {
    if(!$str) return false;
    $utf8 = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'=>'đ|Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
            );
    foreach($utf8 as $ascii=>$uni) $str = preg_replace("/($uni)/i",$ascii,$str);
return $str;
}
 function utf8tourl($text){
    $text = strtolower(utf8convert($text));
    $text = str_replace( "ß", "ss", $text);
    $text = str_replace( "%", "", $text);
    $text = preg_replace("/[^_a-zA-Z0-9 -]/", "",$text);
    $text = str_replace(array('%20', ' '), '-', $text);
    $text = str_replace("----","-",$text);
    $text = str_replace("---","-",$text);
    $text = str_replace("--","-",$text);
return $text;
}

$kdcd= utf8tourl(utf8convert($chuyende)); 
$kdgs= utf8tourl(utf8convert($giangsu)); 
if ($_POST['capcode'] != $_SESSION['captcha'] or $_SESSION['captcha'] == "")
{
echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Sai mã xác nhận')";
                    echo"</script>";
					
					exit();
}
else{
require'./ketnoi.php';
if($giangsu!=""){
 $a=mysql_query("INSERT INTO  video_categories (name,img,phanloai,noibac,chuyende,congbo,linkca) VALUES ('{$giangsu}', '{$img}', '{$phanloai}','{$noibac}','{$chuyendek}','{$congbo}','{$kdgs}')");
    // Thông báo hoàn tất việc tạo tài khoản
    if (isset($a)){
       echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Thêm thành công vui lòng kiểm tra lại danh mục Giảng sư/Chuyên đề vừa thêm')";
                    echo"</script>";
					
   } else{
        echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Có lổi trong quá trình thêm')";
                    echo"</script>";}


}}if($chuyende!=""){$a2=mysql_query("INSERT INTO  video_categories (name,img,phanloai,noibac,chuyende,congbo,linkca) VALUES ('{$chuyende}', '{$img}', '{$phanloai}','{$noibac}','{$chuyendec}','{$congbo}','{$kdcd}')");
    // Thông báo hoàn tất việc tạo tài khoản
    if (isset($a2)){
       echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Thêm thành công vui lòng kiểm tra lại danh mục Giảng sư/Chuyên đề vừa thêm')";
                    echo"</script>";
					
   } else{
        echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Có lổi trong quá trình thêm')";
                    echo"</script>";}}


}
?>
								
							</div>
							
							
														
							
							
							
							
						</div>
					</div>
				</div>
				
				<script language="javascript" type="text/javascript">
	function kiemtra(){
	if(document.f1.chuyende.value!="" && document.f1.giangsu.value!="")
	{	
		alert('Bạn không được phép thêm vào cả 2');
		document.f1.phanloai.focus();
		return false;
	}
	}
	</script>