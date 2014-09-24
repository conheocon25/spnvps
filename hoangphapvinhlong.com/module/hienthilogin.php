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
								echo "Tên bạn : $hoten <br> Giới tính : $gioitinh <br> Quốc gia : $quocgia <br> Địa chỉ email : $email <br> Số điện thoại : $sdt";
								 ?>
								
							</div>
							
							<div class="news-author">
								<p>Video đã đăng được công bố</p>
							</div>
							
								<ul class="thumbnails grid-item-2 reset-margin"><?php 
 require './ketnoi.php';
$sql2="select*from video_categories ca,video_video vi,video_phanloai pl where vi.user='$user' and pl.maloai=ca.phanloai and ca.id=vi.category and vi.congbo=1 order by vi.id desc limit 30";
$kq2=mysql_query($sql2);
  if(mysql_num_rows($kq2)!=0)
                                            {
                                                while($row2=mysql_fetch_array($kq2))
                                                {
											
                                                  $title2=$row2["title"];
												  $name2=$row2["name"];
                                                  $video2=$row2["video"];
												  $tenloai2=$row2["tenloai"];
												  $imgbg=$row2["imgbg"];
												  $id=$row2["id"];
												   $phanloai=$row2["phanloai"];
												   $id=$row2["id"];
												   $linkvi=$row2["linkvi"];
												   $linkca=$row2["linkca"];
												   
					?>
								<li class="span2">
									<div class="thumbnail">
										<a href="video-<?php echo $phanloai ?>-<?php echo $id ?>-<?php echo $linkca ?>-<?php echo $linkvi ?>">
											<img src="<?php echo $imgbg ?>">
											<p><?php echo substr($title2,0,55);echo"..."; ?></p>
										</a>
									</div>
								</li>
								
								<?php }} ?>
							</ul>
								
							
			<div class="news-author">
								<p>Video đã đăng chưa được công bố</p>
							</div>
							
								<ul class="thumbnails grid-item-2 reset-margin"><?php 
 require './ketnoi.php';
$sql2="select*from video_categories ca,video_video vi,video_phanloai pl where vi.user='$user' and pl.maloai=ca.phanloai and ca.id=vi.category and vi.congbo=0 order by vi.id desc limit 30";
$kq2=mysql_query($sql2);
  if(mysql_num_rows($kq2)!=0)
                                            {
                                                while($row2=mysql_fetch_array($kq2))
                                                {
											
                                                  $title2=$row2["title"];
												  $name2=$row2["name"];
                                                  $video2=$row2["video"];
												  $tenloai2=$row2["tenloai"];
												  $imgbg=$row2["imgbg"];
												  $id=$row2["id"];
												  $phanloai=$row2["phanloai"];
					?>
								<li class="span2">
									<div class="thumbnail">
										<a>
											<img src="<?php echo $imgbg ?>">
											<p><?php echo substr($title2,0,55);echo"..."; ?></p>
										</a>
									</div>
								</li>
								
								<?php }} ?>
							</ul>				
							
							
						</div>
					</div>
				</div>