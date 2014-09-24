<ul class="nav nav-pills">
				<li><a href="trang-chu">Trang chủ</a></li>
				<li><a href="gioi-thieu">Giới thiệu</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">Tin tức <b class="caret"></b></a>
					<ul class="dropdown-menu">
					<?php 
 require 'ketnoi.php';
$sql="select*from content_categories where published = '1' and id < 100";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $id=$row["id"];
                                                  $name=$row["name"];
												  
												   ?>
						<li>
							<a href="tin-tuc<?php echo $id ?>"><?php echo $name; ?></a>
						</li>
						<?php }} ?>
						
					</ul>
				</li>
				<li><a href="thong-bao">Thông báo</a></li>
				<li><a href="su-kien">Sự kiện</a></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown"><img src="images/hot.gif" class="hinhhot"/> Phật Âm <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<?php 
 require 'ketnoi.php';
$sql="select*from video_phanloai where hienthi=1";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $maloai=$row["maloai"];
												  $linkpl=$row["linkpl"];
                                                  $tenloai=$row["tenloai"];
												  $count2= mysql_query("SELECT COUNT(vi.id) FROM video_categories ca,video_video vi,video_phanloai pl where ca.phanloai='$maloai' and ca.congbo=1 and vi.congbo=1 and pl.maloai=ca.phanloai and ca.id=vi.category");$row2=mysql_fetch_row($count2);
												  
												   ?>
						<li>
							<a href="phat-am-<?php echo $maloai?>-<?php echo $linkpl?>"><?php echo $tenloai; ?><?php echo" ( "; echo $row2['0'];echo " ) ";?></a>
						</li>
						<?php }} ?>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown"><img src="images/hot.gif" class="hinhhot"/>Thư viện phật giáo<b class="caret"></b></a>
					<?php $count3= mysql_query("SELECT COUNT(id) FROM baihat");$row3=mysql_fetch_row($count3);?>
					<?php $count4= mysql_query("SELECT COUNT(id) FROM baihatvideo");$row4=mysql_fetch_row($count4);?>
					<ul class="dropdown-menu">
				<li><a href="nhac-audio">Thư viện audio (<?php echo $row3['0']; ?>)</a></li>
				<li><a href="nhacvideo">Thư viện video (<?php echo $row4['0']; ?>)</a></li>
				<li><a href="index.php?frame=newvideoaudio">Album audio mới nhất</a></li>
				<li><a href="index.php?frame=newvideovideo">Album video mới nhất</a></li>
				</ul></li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">Giảng sư <b class="caret"></b></a>
					<ul class="dropdown-menu">
					<?php 
 require 'ketnoi.php';
$sql="select*from giangsu order by magiangsu asc";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $magiangsu=$row["magiangsu"];
                                                  $tengiangsu=$row["tengiangsu"];
												   $linkgiangsu=$row["linkgiangsu"];
												  
												   ?>
						<li>
							<a href="index.php?frame=giangsu&id=<?php echo $magiangsu ?>"><?php echo $tengiangsu; ?></a>
						</li>
						<?php }} ?>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">Hỏi đáp <b class="caret"></b></a>
					<ul class="dropdown-menu">
					<li>
							<a href="dat-cau-hoi">Đặt câu hỏi</a>
					  </li>
						<?php 
 require 'ketnoi.php';
$sql="select*from hoidap";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $id=$row["id"];
                                                  $danhmuc=$row["danhmuc"];
												  
												   ?>
						<li>
							<a href="danh-muc-hoi-dap<?php echo $id ?>"><?php echo $danhmuc; ?></a>
						</li>
						<?php }} ?>
						
					</ul>
				</li>	
				
				<?php 
 require 'ketnoi.php';
$sql="select*from anhhoatdong order by id desc limit 1";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $id=$row["id"];
                                                  
												  
												   ?>
						<li>
			  
						<?php }} ?>
				
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">Danh bạ Chùa <b class="caret"></b></a>
					<ul class="dropdown-menu">
					<?php 
 require 'ketnoi.php';
$sql="select*from danhbachua order by id desc";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $id=$row["id"];
                                                  $tenchua=$row["tenchua"];
												   $linkchua=$row["linkchua"];
												 
												  
												   ?>
						<li>
							<a href="danh-ba-<?php echo $id ?>-<?php echo $linkchua ?>"><?php echo $tenchua ?></a>
						</li>
						<?php }} ?>
						
					</ul>
				</li>	
				
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown">Diễn đàn<b class="caret"></b></a>
					<ul class="dropdown-menu">
					<li><a href="index.php?frame=dangky" title="Đăng nhập / Đăng ký"><?php if(isset($user)){echo "Trang cá nhân";}else{echo "Đăng ký / Đăng nhập";} ?></a></li>
					<li><a href="index.php?frame=dangvideo" title="Đăng video" >Đăng video</a></li>
            <li><a href="index.php?frame=newvideo" title="Video Phập tử mới đăng" >New video</a></li>
            <li><a href="index.php?frame=topvideo" title="Video được xem nhiều" >Top video</a></li>
<li><a href="trangdownload" title="Download các phần mêm" >Download</a></li>
			    <li><a href="index.php?frame=upload" title="Upload các phần mêm" >Upload</a></li>
					
					</ul>
					</li>
				
				
			</ul>