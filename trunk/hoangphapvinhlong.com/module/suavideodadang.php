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
  <script type="text/javascript">
            function chondulieu($1,$2,$3,$4)
            {
              var kq2=['Video: ']
              alert(kq2+$1)
               document.f1.url.value=$2;
			   document.f1.tieude.value=$1;
               document.f1.giangsu.value=$3;
			    document.f1.id.value=$4;
              
			  
            }
            </script>
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
							<div class="b-t-icon-content">Chỉnh sửa các video đã đăng</div>
						</div>
						<div class="b-content news-content padding-content">
						<form class="form-horizontal"method="post" name="f1" action="index.php?frame=suavideodadang&act=do" onSubmit="return kiemtra();">			
            
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
								<input type="text" name="id" id="id" style="visibility:hidden">
			<center><button type="submit" class="btn" name="chinhsua"> Chỉnh sửa </button>
			<button type="submit" class="btn" name="xoa">Xóa </button>
			<button type="reset" class="btn"> Nhập lại </button></center>
			
</form>
							<div class="news-author">
								<p>Các video đã đăng (Lưu ý sau khi chỉnh sửa xong sẻ không được công bố phải đợi xét duyệt mới có thể công bố được)</p>
							</div>
          <table border='1' cellpadding='0' cellspacing='0' style='border-collapse: collapse; font-family: Arial; font-size: 10pt; color: #000099' bordercolor='#9999FF' width='100%' id='AutoNumber1' align="center">
            <tr align="center">
              <td bgcolor="#FFFFFF" class="style6 style9 style11"><div align="center">Tiêu đề</div></td>
			  <td  width="60" bgcolor="#FFFFFF" class="style12"><div align="center">Tình trạng </div></td>
              <td width="60" bgcolor="#FFFFFF"><div align="center"><span class="style13">Lựa Chọn</span></div></td>
            </tr>
            <?php
										require 'ketnoi.php';
                                        $sql="select*from video_video vi,video_categories ca where ca.id=vi.category and vi.user='$user' order by vi.id desc";
                                        $kq=mysql_query($sql);
                                        if(mysql_num_rows($kq)!=0)
                                        {
                                            while($row=mysql_fetch_array($kq))
                                            {
                                                $title=$row["title"];
												$congbo=$row[8];
												$category=$row["category"];
												$video=$row["video"];
												$id=$row[0];
                                                
	



                                                echo"<tr align='center'>";
                                               
												echo"<td>$title</td>";
                                                echo"<td>";if($congbo==1){echo "Công bố";}if($congbo!=1){echo "C.Công bố";}echo"</td>";
                                               
                                                
                                               ?>
            <td>
              <input type="radio" name="chon" onClick="chondulieu
                                               ('<?php echo $title;?>','<?php echo $video;?>',
											   
											   
                                               '<?php echo $category;?>', '<?php echo $id;?>')"> </td>
              <?php
                                                echo"</tr>";
                                            }
                                        }
								 ?>
          </table>
       
	   
	   
							
			
							
						</div>
					</div>
				</div>
				
				<?php 
	if ( $_GET['act'] == "do" )
{
$url=$_POST["url"];
$id=$_POST["id"];
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
if(isset($_POST["chinhsua"])){
 $a=mysql_query("update video_video set title='$tieude',video='$url',imgbg='$imgbg',category='$giangsu',views='$views',noibac='$noibac',congbo='$congbo',ngay='$ngay',linkvi='$kd' where id=$id");
    // Thông báo hoàn tất việc tạo tài khoản
    if (isset($a)){
       echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Update video thành công đang chờ xét duyệt. A di đà phật')";
                    echo"</script>";
					
   } else{
        echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Có lổi trong quá trình update')";
                    echo"</script>";}}
if(isset($_POST["xoa"])){$a2=mysql_query("delete from video_video where id=$id");
    // Thông báo hoàn tất việc tạo tài khoản
    if (isset($a2)){
       echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Xóa thành công')";
                    echo"</script>";
					
   } else{
        echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Có lổi trong quá trình xóa')";
                    echo"</script>";}}


}
}
?>
<?php }else{echo"<script language='javascript' type='text/javascript'>";
                    echo"alert('Vui lòng đăng nhập. Nếu bạn chưa có tài khoảng vui lòng bấm vào đăng ký')";
                    echo"</script>";
					echo "<script>window.location='index.php?frame=dangky'</script>";} ?>