<?php $a=$_GET["videoid"];
?>
<?php			
	if($a!=3){?>	
				<div class="span3 fix-width-3">
					<div class="box radius">
						<div class="b-title">
							<div class="b-t-icon-right">Chuyên đề</div>
						</div>
						<div class="b-content">
							<ul class="nav nav-tabs nav-stacked reset-margin list-3">
							
							<?php 
								
 require './ketnoi.php';
$sql="select*from video_categories ca,video_video vi,video_phanloai pl where  pl.maloai=ca.phanloai and ca.phanloai='$a' and ca.id=vi.category and ca.congbo=1 and ca.chuyende='1' and vi.congbo=1 group by vi.category order by ca.sapxep asc";
$kq=mysql_query($sql);
  if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
											
                                                  $id=$row[0];
												 $name=$row["name"];
												  $category=$row["category"];
												  $noibac=$row["noibac"];
												   $noibach=$row[4];
												    $linkca=$row["linkca"];
													$linkpl=$row["linkpl"];
												  $count= mysql_query("SELECT COUNT(id) FROM video_video where category='$category' and congbo=1");
$row=mysql_fetch_row($count);
 
                                                 
					?><li class="news-list-item">
									<a href="<?php echo $a ?>-<?php echo $id ?>-<?php echo $linkpl ?>-<?php echo $linkca ?>">
										<span class="label monk-label"><?php echo $row['0']; ?></span>
										<span><?php echo $name ?><?php if($noibach==1){ ?><img src="./img/star-icon.png" class="gsnoibac"><?php }?></span>									</a>								</li>
								
								<?php }} ?>
								
								
							
							</ul>
						</div>
					</div>		
				
				
									
				</div>
				
				
				
				<div class="span6 fix-width-3">
					<div class="box radius">
						<div class="page-header pg-header pg-header-video reset-margin">
						<?php 
 require './ketnoi.php';
$sql="select*from video_categories ca,video_video vi,video_phanloai pl where ca.phanloai='$a' and pl.maloai=ca.phanloai and ca.congbo=1 and ca.id=vi.category and vi.congbo=1 order by vi.views desc limit 1";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
$count2= mysql_query("SELECT COUNT(vi.id) FROM video_categories ca,video_video vi,video_phanloai pl where ca.phanloai='$a' and ca.congbo=1 and pl.maloai=ca.phanloai and ca.id=vi.category and ca.congbo=1 and vi.congbo=1");
$row2=mysql_fetch_row($count2);
											
                                                  $title=$row["title"];
												  $name=$row["name"];
                                                  $video=$row["video"];
												  $tenloai=$row["tenloai"];
												  $views=$row["views"];
												  $linkca=$row["linkca"];
												   $linkpl=$row["linkpl"];
												   $category=$row["category"];
												   $luottaivideo=$row["luottaivideo"];
												   
					?>
							<h4 class="reset-margin"> <?php echo "$title"; ?></h4> 
							<i class="pull-right"><?php echo "$tenloai ("; ?><?php echo $row2['0'];echo " Video )"; ?></i>
						</div>
						<div class="b-content news-content padding-content">
              <div class="img-polaroid">
                <?php if(substr($video,0,22)=='http://www.youtube.com' || substr($video,0,23)=='https://www.youtube.com'){ ?>
                <iframe width="100%" height="400" frameborder="0" allowfullscreen="true" src="<?php echo $str= str_replace("watch?v=","embed/",$video);?>?rel=0" >
                </iframe>
                <?php }else{ ?>	<video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="440" height="300" poster="http://phatphaptonghop.com/images/buddhamin.jpg" data-setup="{}">
    <source src="<?php echo $video ?>" type='video/mp4' />
    <source src="http://video-js.zencoder.com/oceans-clip.webm" type='video/webm' />
    <source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg' />
	<track kind="captions" src="../css_java/demo.captions.vtt" srclang="en" label="English"></track>
    <track kind="subtitles" src="../css_java/demo.captions.vtt" srclang="en" label="English"></track>
  </video> <?php } ?>
              </div>
							<div class="alert alert-block clearfix reset-margin">
								<strong>Giảng sư:</strong>
								
								<a href="<?php echo $a ?>-<?php echo $category ?>-<?php echo $linkpl ?>-<?php echo $linkca ?>">
									<span><?php echo $name ?><br/></span>
								</a>
								<span class="btn btn-danger pull-right disabled btn-small">
									<i class="icon-hand-up icon-white"></i>
									<span><?php echo $luottaivideo ?></span> lượt tải
									
								</span>
								<span class="btn btn-danger pull-right disabled btn-small">
									<i class="icon-hand-up icon-white"></i>
									<span><?php echo "$views"; ?></span> lượt xem
								</span>
							</div>
							
							<div class="news-author monk-author"><p>
								<span class="btn btn-danger disabled btn-small">
									<i class="icon-tags icon-white"></i> Mới cập nhật
								</span>
							</p></div>
							<ul class="thumbnails grid-item-2 reset-margin"><?php 
 require './ketnoi.php';
$sql2="select*from video_categories ca,video_video vi,video_phanloai pl where ca.phanloai='$a' and ca.congbo=1 and pl.maloai=ca.phanloai and ca.id=vi.category and vi.congbo=1 order by vi.id desc limit 30";
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
												  $linkvi=$row2["linkvi"];
												  $linkca=$row2["linkca"];
												  $linkpl=$row2["linkpl"];
												   $category=$row2["category"];
					?>
								<li class="span2">
									<div class="thumbnail">
										<a href="video-<?php echo $a ?>-<?php echo $id ?>-<?php echo $linkca ?>-<?php echo $linkvi ?>">
											<img src="<?php echo $imgbg ?>">
											<p><?php echo substr($title2,0,55);echo"..."; ?></p>
										</a>
									</div>
								</li>
								
								<?php }} ?>
							</ul>
							
							<div class="news-author monk-author"><p>
								<span class="btn btn-danger disabled btn-small">
									<i class="icon-thumbs-up icon-white"></i> Xem nhiều nhất
								</span>
							</p></div>
							<ul class="thumbnails grid-item-2 reset-margin">
								<?php 
 require './ketnoi.php';
$sql2="select*from video_categories ca,video_video vi,video_phanloai pl where ca.phanloai='$a' and pl.maloai=ca.phanloai and ca.congbo=1 and ca.id=vi.category and vi.congbo=1 order by vi.views desc limit 30";
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
												   $linkvi=$row2["linkvi"];
												   $linkca=$row2["linkca"];
												   $linkpl=$row2["linkpl"];
												  
					?>
								<li class="span2">
									<div class="thumbnail">
										<a href="video-<?php echo $a ?>-<?php echo $id ?>-<?php echo $linkca ?>-<?php echo $linkvi ?>">
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
				
				
			
				
				
				<div class="span3 fix-width-3">
					<div class="box radius">
						<div class="b-title">
							<div class="b-t-icon-giangsu"><?php if($a=='4'){echo "Video Nội bộ";}else{echo"Giảng sư";}?></div>
						</div>
						<div class="b-content">
							<ul class="nav nav-tabs nav-stacked reset-margin list-3">
							
							<?php 
								
 require './ketnoi.php';
$sql="select*from video_categories ca,video_video vi where ca.phanloai='$a' and ca.id=vi.category and ca.chuyende!=1 and ca.congbo=1 and vi.congbo=1 group by vi.category order by ca.giangsu asc";
$kq=mysql_query($sql);
  if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
											
                                                  $id=$row[0];
												  $name=$row["name"];
												  $category=$row["category"];
												  $noibac=$row["noibac"];
												  $linkca=$row["linkca"];
												   $noibach=$row[4];
												  $count= mysql_query("SELECT COUNT(id) FROM video_video where category='$category' and congbo=1");
$row=mysql_fetch_row($count);
 
                                                 
					?><li class="news-list-item">
					
									<a href="<?php echo $a ?>-<?php echo $id ?>-<?php echo $linkpl ?>-<?php echo $linkca ?>">
										<span class="label monk-label"><?php echo $row['0']; ?></span>
										<span><?php echo $name ?><?php if($noibach==1){ ?><img src="./img/star-icon.png" class="gsnoibac"><?php }?></span>									</a>								</li>
								
								<?php }} ?>
								
								
							
							</ul>
						</div>
					</div>							
				</div>
				<?php }else{
				?>
				
				
				
				
				
				
				
				
				
					<div class="spanvideo fix-width-3">
					<div class="box radius">
						<div class="b-title">
							<div class="b-t-icon-right">Chuyên đề</div>
						</div>
						<div class="b-content">
							<ul class="nav nav-tabs nav-stacked reset-margin list-3">
							
							<?php 
								
 require './ketnoi.php';
$sql="select*from video_categories ca,video_video vi,video_phanloai pl where pl.maloai=ca.phanloai and ca.phanloai='$a' and ca.id=vi.category and ca.congbo=1 and ca.chuyende='1' and vi.congbo=1 group by vi.category order by ca.sapxep asc";
$kq=mysql_query($sql);
  if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
											
                                                  $id=$row[0]; 
												  $name=$row["name"];
												  $category=$row["category"];
												  $noibac=$row["noibac"];
												  $noibach=$row[4];
												  $linkca=$row["linkca"];
												  $linkpl=$row["linkpl"];
												  $count= mysql_query("SELECT COUNT(id) FROM video_video where category='$category' and congbo=1");
$row=mysql_fetch_row($count);
 
                                                 
					?><li class="news-list-item">
									<a href="<?php echo $a ?>-<?php echo $id ?>-<?php echo $linkpl ?>-<?php echo $linkca ?>">
										<span class="label monk-label"><?php echo $row['0']; ?></span>
										<span><?php echo $name ?><?php if($noibach==1){ ?><img src="./img/star-icon.png" class="gsnoibac"><?php }?></span>									</a>								</li>
								
								<?php }} ?>
								
								
							
							</ul>
						</div>
					</div>		
				
				
									
				</div>
				
				
				
				<div class="span6 fix-width-3">
					<div class="box radius">
						<div class="page-header pg-header pg-header-video reset-margin">
						<?php 
 require './ketnoi.php';
$sql="select*from video_categories ca,video_video vi,video_phanloai pl where ca.phanloai='$a' and pl.maloai=ca.phanloai and ca.congbo=1 and ca.id=vi.category and vi.congbo=1 order by vi.views desc limit 1";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
$count2= mysql_query("SELECT COUNT(vi.id) FROM video_categories ca,video_video vi,video_phanloai pl where ca.phanloai='$a' and ca.congbo=1 and pl.maloai=ca.phanloai and ca.id=vi.category and ca.congbo=1 and vi.congbo=1");
$row2=mysql_fetch_row($count2);
											
                                                  $title=$row["title"];
												  $name=$row["name"];
                                                  $video=$row["video"];
												  $tenloai=$row["tenloai"];
												  $views=$row["views"];
												   $category=$row["category"];
												    $linkca=$row["linkca"];
													$luottaivideo=$row["luottaivideo"];
					?>
							<h4 class="reset-margin"> <?php echo "$title"; ?></h4> 
							<i class="pull-right"><?php echo "$tenloai ("; ?><?php echo $row2['0'];echo " Video )"; ?></i>
						</div>
						<div class="b-content news-content padding-content">
							<div class="img-polaroid">
									<?php if(substr($video,0,22)=='http://www.youtube.com' || substr($video,0,23)=='https://www.youtube.com'){ ?>
                <iframe width="100%" height="400" frameborder="0" rel="0" allowfullscreen="true" wmode="Opaque" src="<?php echo $str= str_replace("watch?v=","embed/",$video);?>?rel=0" >
                </iframe>
							 
								<?php }else{ ?><video id="example_video_1" class="video-js vjs-default-skin" controls preload="none" width="440" height="300" poster="http://phatphaptonghop.com/images/buddhamin.jpg" data-setup="{}">
    <source src="<?php echo $video ?>" type='video/mp4' />
    <source src="http://video-js.zencoder.com/oceans-clip.webm" type='video/webm' />
    <source src="http://video-js.zencoder.com/oceans-clip.ogv" type='video/ogg' />
	<track kind="captions" src="../css_java/demo.captions.vtt" srclang="en" label="English"></track>
    <track kind="subtitles" src="../css_java/demo.captions.vtt" srclang="en" label="English"></track>
  </video><?php } ?>
							</div>
							<div class="alert alert-block clearfix reset-margin">
								<strong>Giảng sư:</strong>
								
								<a href="<?php echo $a ?>-<?php echo $category ?>-<?php echo $linkpl ?>-<?php echo $linkca ?>">
									<span><?php echo $name ?><br/></span>
								</a>
								<span class="btn btn-danger pull-right disabled btn-small">
									<i class="icon-hand-up icon-white"></i>
									<span><?php echo $luottaivideo ?></span> lượt tải
									
								</span>
								<span class="btn btn-danger pull-right disabled btn-small">
									<i class="icon-hand-up icon-white"></i>
									<span><?php echo "$views"; ?></span> lượt xem
								</span>
							</div>
							
							<div class="news-author monk-author"><p>
								<span class="btn btn-danger disabled btn-small">
									<i class="icon-tags icon-white"></i> Mới cập nhật
								</span>
							</p></div>
							<ul class="thumbnails grid-item-2 reset-margin"><?php 
 require './ketnoi.php';
$sql2="select*from video_categories ca,video_video vi,video_phanloai pl where ca.phanloai='$a' and ca.congbo=1 and pl.maloai=ca.phanloai and ca.id=vi.category and vi.congbo=1 order by vi.id desc limit 30";
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
												   $linkvi=$row2["linkvi"];
												  $linkca=$row2["linkca"];
												  $linkpl=$row2["linkpl"];
					?>
								<li class="span2">
									<div class="thumbnail">
										<a href="video-<?php echo $a ?>-<?php echo $id ?>-<?php echo $linkca ?>-<?php echo $linkvi ?>">
											<img src="<?php echo $imgbg ?>">
											<p><?php echo substr($title2,0,55);echo"..."; ?></p>
										</a>
									</div>
								</li>
								
								<?php }} ?>
							</ul>
							
							<div class="news-author monk-author"><p>
								<span class="btn btn-danger disabled btn-small">
									<i class="icon-thumbs-up icon-white"></i> Xem nhiều nhất
								</span>
							</p></div>
							<ul class="thumbnails grid-item-2 reset-margin">
								<?php 
 require './ketnoi.php';
$sql2="select*from video_categories ca,video_video vi,video_phanloai pl where ca.phanloai='$a' and pl.maloai=ca.phanloai and ca.congbo=1 and ca.id=vi.category and vi.congbo=1 order by vi.views desc limit 30";
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
												    $linkvi=$row2["linkvi"];
												  $linkca=$row2["linkca"];
												  $linkpl=$row2["linkpl"];
												  
					?>
								<li class="span2">
									<div class="thumbnail">
										<a href="video-<?php echo $a ?>-<?php echo $id ?>-<?php echo $linkca ?>-<?php echo $linkvi ?>">
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
				
				<?php include'right.php';?>
			
				
				
			
				<?php } ?>