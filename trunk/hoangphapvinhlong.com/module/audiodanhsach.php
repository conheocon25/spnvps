<?php if($_GET["audio"]='audio'){ ?>
	
				<div class="span3 fix-width-3">
					<div class="box radius">
						<div class="b-title">
							<div class="b-t-icon-right">Tổng hợp Audio phật pháp</div>
						</div>
						<div class="b-content">
							<ul class="nav nav-tabs nav-stacked reset-margin list-3">
							
							<?php 
								
 require './ketnoi.php';
$sql="select*from theloaialbum where  theloai='bai-giang' order by sapxep asc";
$kq=mysql_query($sql);
  if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
											
                                                  $id=$row["id"];
												  $ten=$row["ten"];
												  $linktheloai=$row["linktheloai"];
												  $theloai=$row["theloai"];
												  
												  $count= mysql_query("SELECT COUNT(id) FROM album where idtheloai='$id'");
$row=mysql_fetch_row($count);
 
                                                 
					?><li class="news-list-item">
									<a href="album-audio-album<?php echo $id ?>-<?php echo $linktheloai ?>">
										<span class="label monk-label"><?php echo $row['0']; ?></span>
										<span><?php echo $ten ?></span>									</a>								</li>
								
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
 $a=$_GET["id"];
?>
							<h4 class="reset-margin">Danh sách album</h4> 
							<i class="pull-right"></i>
						</div>
						<div class="b-content news-content padding-content">
							<ul class="thumbnails grid-item-2 reset-margin"><?php 
 require './ketnoi.php';
$sql2="select*from album al,theloaialbum tl where tl.id=al.idtheloai and al.idtheloai='$a' order by al.id desc";
$kq2=mysql_query($sql2);
  if(mysql_num_rows($kq2)!=0)
                                            {
                                                while($row2=mysql_fetch_array($kq2))
                                                {
											
                                                  $ten=$row2[1];
												  $id=$row2[0];
												  $hinhbg=$row2["hinhbg"];
                                                
												  $linkal=$row2["linkal"];
												  
					?>
								<li class="span2">
									<div class="thumbnail">
										<a href="nghe-album<?php echo $id ?>-<?php echo $linkal ?>">
											<img src="<?php echo $hinhbg ?>">
											<p><?php echo substr($ten,0,55);echo"..."; ?></p>
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
							<div class="b-t-icon-giangsu">Album Nhạc Audio</div>
						</div>
						<div class="b-content">
							<ul class="nav nav-tabs nav-stacked reset-margin list-3">
							
						<?php 
								
 require './ketnoi.php';
$sql="select*from theloaialbum where  theloai='nhac' order by sapxep asc";
$kq=mysql_query($sql);
  if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
											
                                                  $id=$row["id"];
												  $ten=$row["ten"];
												  $linktheloai=$row["linktheloai"];
												  $theloai=$row["theloai"];
												  
												  $count= mysql_query("SELECT COUNT(id) FROM album where idtheloai='$id'");
$row=mysql_fetch_row($count);
 
                                                 
					?><li class="news-list-item">
									<a href="album-audio-album<?php echo $id ?>-<?php echo $linktheloai ?>">
										<span class="label monk-label"><?php echo $row['0']; ?></span>
										<span><?php echo $ten ?></span>									</a>								</li>
								
								<?php }} ?>
								
								
							
							</ul>
						</div>
					</div>							
				</div>
				<?php 
				}else{} ?>