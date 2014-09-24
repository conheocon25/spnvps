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
?>
				<div class="spandk fix-width-3">
					<div class="box radius">
						<div class="b-title">
							<div class="b-t-icon-content">Danh mục cá nhân</div>
						</div>
						<div class="b-content">
							<ul class="nav nav-tabs nav-stacked reset-margin list-3">  
							<li class="news-list-item">
									<a href="?frame=dangky">
									<span>Thông tin cá nhân</span></a>
								</li>                      
								<li class="news-list-item">
									<a href="?frame=thaydoithongtincanhan">
									<span>Sửa thông tin cá nhân</span></a>
								</li>
								<li class="news-list-item">
									<a href="?frame=thayhinhdaidien">
									<span>Thay hình đại diện</span></a>
								</li>
								
								<li class="news-list-item">
									<a href="?frame=dangvideo">
									<span>Đăng Video</span></a>
								</li>
								<li class="news-list-item">
									<a href="?frame=suavideodadang">
									<span>Chỉnh sửa các video đã đăng</span></a>
								</li>
								<li class="news-list-item">
									<a href="?frame=dangxuat">
									<span>Đăng xuất</span></a>
								</li>

							</ul>
						</div>
					</div>					
				
				
				
				
					
									
				</div>
				
				
				
				<div class="span6 fix-width-3">
					<div class="box radius">
						<div class="b-title">
							<div class="b-t-icon-content">Đăng video</div>
						</div>
						<div class="b-content news-content padding-content">
							<div class="news-author">
								<p>Đăng video (Lưu ý : Nếu Giảng sư/Chuyên mục bạn muốn đăng không có trong danh sách bạn có thể thêm mới ở đường link phía dưới)
</p>
							</div>
							<div class="alert alert-block clearfix reset-margin">
								<form class="form-horizontal"method="post" name="f1" action="?frame=dangvideo&act=do" onSubmit="return kiemtra();">			
            
			<div class="control-group">
									<label class="control-label" for="Author1">Video url:  <span class="style2 style1">(*)</span></label>
			  <div class="controls">
										<input type="text" name="url" id="url"  />
				   </div>
				  </div>
								<div class="control-group">
									<label class="control-label" for="Author1">Tiêu đề: <span class="style2 style1">(*)</span></label>
								  <div class="controls">
										<input type="text" name="tieude" id="tieude">
									    </div>
								</div>
								<div class="control-group">
									<label class="control-label" for="Author1">Giảng sư/Chuyên mục:<span class="style2 style1">(*)</span></label>
								  <div class="controls">
										<select name="giangsu" id="giangsu">
										
										<?php 
 require './ketnoi.php';
$sql2="select*from video_categories order by name desc";
$kq2=mysql_query($sql2);
  if(mysql_num_rows($kq2)!=0)
                                            {
                                                while($row2=mysql_fetch_array($kq2))
                                                {
											
                                                  $name=$row2["name"];
												   $id=$row2["id"];?>
						<option value="<?php echo $id ?>"><?php echo $name ?></option>
						
						<?php }} ?>
					</select>
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
								</div>
			<center><button type="submit" class="btn"> Đăng video </button><button type="reset" class="btn"> Nhập lại </button></center>
			
</form>
<?php 
	if ( $_GET['act'] == "do" )
{
$url=$_POST["url"];
$tieude=$_POST["tieude"];
$giangsu=$_POST["giangsu"];
$tieudetach = str_replace("www.youtube.com/watch?v=","img.youtube.com/vi/",$url);
$imgbg="$tieudetach"."/default.jpg";
$congbo=0;
$views=0;
$noibac=0;
$matkhau=md5($_POST["matkhau"]);
$diachiemail=$_POST["diachiemail"];

date_default_timezone_set("asia/bangkok");
$ngay=date("Y-m-d");
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

$kd= utf8tourl(utf8convert($tieude)); 
if ($_POST['capcode'] != $_SESSION['captcha'] or $_SESSION['captcha'] == "")
{
echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Sai mã xác nhận')";
                    echo"</script>";
					
					exit();
}
else{
require'./ketnoi.php';
 $a=mysql_query("INSERT INTO video_video (title,user,video,imgbg,category,views,noibac,congbo,ngay,linkvi) VALUES ('{$tieude}', '{$user}', '{$url}','{$imgbg}','{$giangsu}','{$views}','{$noibac}','{$congbo}','{$ngay}','{$kd}')");
    // Thông báo hoàn tất việc tạo tài khoản
    if ($a){
       echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Update thành công đang chờ xét duyệt')";
                    echo"</script>";
					
   } else{
        echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Có lổi trong quá trình update')";
                    echo"</script>";}


}
}
?>
								<a class="btn btn-success pull-right" href="?frame=themgiangsu"><i class="icon-share icon-white"></i>Đăng bài với Giảng sư / Chuyên mục khác</a>	
							</div>
							
							
														
							
							
							
							
						</div>
					</div>
				</div>
				
				<script language="javascript" type="text/javascript">
	function kiemtra(){
	
		if(document.f1.url.value==""||document.f1.tieude.value=="")
	{	
		alert('Vui lòng điền đầy đủ thông tin vào');
		document.f1.url.focus();
		return false;
	}
	}
	</script><?php }else{echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Vui lòng đăng nhập. Nếu bạn chưa có tài khoảng vui lòng bấm vào đăng ký')";
                    echo"</script>";
					echo "<script>window.location='?frame=dangky'</script>";} ?>