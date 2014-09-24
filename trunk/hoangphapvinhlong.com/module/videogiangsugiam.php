<?php $a2=$_GET["id2"]; ?>
<?php $a1=$_GET["id1"]; ?>
<?php			
	if($a1!=3){?>
			<div class="span3 fix-width-3">
					<div class="box radius">
						<div class="b-title">
							<div class="b-t-icon-right">Chuyên đề</div>
						</div>
						<div class="b-content">
							<ul class="nav nav-tabs nav-stacked reset-margin list-3">
							
							<?php 
								
 require './ketnoi.php';
$sql="select*from video_categories ca,video_video vi,video_phanloai pl where pl.maloai=ca.phanloai and ca.phanloai='$a1' and ca.congbo=1 and ca.id=vi.category and ca.chuyende=1 and vi.congbo=1 group by vi.category order by ca.sapxep asc";
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
									<a href="<?php echo $a1 ?>-<?php echo $id ?>-<?php echo $linkpl ?>-<?php echo $linkca ?>">
										<span class="label monk-label"><?php echo $row['0']; ?></span>
										<span><?php echo $name ?><?php if($noibach==1){ ?><img src="./img/star-icon.png" class="gsnoibac"><?php }?></span>									</a>								</li>
								
								<?php }} ?>
								
								
							
							</ul>
						</div>
					</div>						
				</div>
				<div class="span6 fix-width-3">
					<div class="box radius">
						<?php 

require'ketnoi.php';						
$sql="select*from video_video vi,video_categories ca,video_phanloai pl where pl.maloai=ca.phanloai and ca.id=vi.category and vi.category='$a2' and vi.congbo=1 and ca.congbo=1";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
$count2= mysql_query("SELECT COUNT(id) FROM video_video where category='$a2' and congbo=1");
$row2=mysql_fetch_row($count2);
											
                                                  
												  $name=$row["name"];
												  $chuyende=$row["chuyende"];
												   $linkca=$row["linkca"];
												    $linkpl=$row["linkpl"];
                                                 
					?>
						<div class="page-header pg-header pg-header-videos reset-margin">
							<h4 class="reset-margin"><?php if($chuyende==1){echo "Chuyên đề : ";}else{echo "Giảng sư: ";}?><span><?php echo $name ?></span></h4>
							<i class="pull-right">
								<span>Sắp xếp theo : <a href="videogiam-<?php echo $a1 ?>-<?php echo $a2 ?>-<?php echo $linkpl ?>-<?php echo $linkca ?>">Giảm</a> / <a href="<?php echo $a1 ?>-<?php echo $a2 ?>-<?php echo $linkpl ?>-<?php echo $linkca ?>">Tăng</a>____________</span><span>Tổng số có (<?php echo $row2['0']; ?></span> video)
							</i>
						</div>
						
						<div class="b-content news-content padding-content">
						<?php 
require("ketnoi.php");//kết  nối đến CSDL
$baitren_mottrang=15;
// Nếu chưa chọn trang để xem. thì ta mặc định người dùng xem đang số 0 .
if ( !$_GET['page'] )
{
    $page = 0 ;
}
else
{
$page=$_GET['page'];
}
$sodu_lieu = mysql_num_rows(mysql_query("select*from video_categories ca,video_video vi where ca.id=vi.category and ca.congbo=1 and vi.category='$a2' and vi.congbo=1 order by vi.id asc") ) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$huuha=$page*$baitren_mottrang;
$result =mysql_query("select*from video_categories ca,video_video vi where ca.id=vi.category and ca.congbo=1 and vi.category='$a2' and vi.congbo=1 order by vi.id asc LIMIT {$huuha},{$baitren_mottrang} ") or die(mysql_error());
if(mysql_num_rows($result)!=0)
{
while ( $row = mysql_fetch_array($result )) 
{						


											
                                                  $title2=$row["title"];
												  $name2=$row["name"];
												  $views=$row["views"];
												  $imgbg=$row["imgbg"];
												  $id=$row["id"];
												  $linkvi=$row["linkvi"];
												  $linkca=$row["linkca"];
												  
					?>
								<div class="media img-polaroid new-list-polaroid-3">
								<a class="pull-left" href="video-<?php echo $a1 ?>-<?php echo $id ?>-<?php echo $linkca ?>-<?php echo $linkvi ?>">
									<img class="media-object img-rounded" src="<?php echo $imgbg ?>">
								</a>
								<div class="media-body">
									<h4 class="media-heading"><?php echo $title2 ?></h4>
									<p class="media-reduce">Giảng sư: <span><?php echo $name2 ?></span></p>
									<a class="btn pull-right" href="video-<?php echo $a1 ?>-<?php echo $id ?>-<?php echo $linkca ?>-<?php echo $linkvi ?>"><i class="icon-share"></i> <span><?php echo $views ?></span> xem</a>
								</div>
							</div>
								
								<?php }} ?>
						
						
							
							
							
							
							
							
							
						<center>
<div class="pagination page-number">

									<ul>
										<li>
<?php
for ( $page = 0; $page < $sotrang; $page ++ )
{
?>
								
											<a href="trang<?php echo $a1 ?>-<?php echo $a2 ?>-<?php echo $page ?>"> <?php echo $page ?></a>
										
							
<?php
}

?>
</li>
									</ul>
								</div>
							</center>
							
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
$sql="select*from video_categories ca,video_video vi,video_phanloai pl where pl.maloai=ca.phanloai and ca.phanloai='$a1' and ca.id=vi.category and ca.congbo=1 and ca.chuyende!=1 and vi.congbo=1 group by vi.category order by ca.giangsu asc";
$kq=mysql_query($sql);
  if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
											
                                                  $id=$row[0];
												  $linkca=$row["linkca"];
												  $linkpl=$row["linkpl"];
												  $name=$row["name"];
												  $category=$row["category"];
												  $noibac=$row["noibac"];
												  $noibach=$row[4];
												  $count= mysql_query("SELECT COUNT(id) FROM video_video where category='$category' and congbo=1");
$row=mysql_fetch_row($count);
 
                                                 
					?><li class="news-list-item">
									<a href="<?php echo $a1 ?>-<?php echo $id ?>-<?php echo $linkpl ?>-<?php echo $linkca ?>">
										<span class="label monk-label"><?php echo $row['0']; ?></span>
										<span><?php echo $name ?><?php if($noibach==1){ ?><img src="./img/star-icon.png" class="gsnoibac"><?php }?></span>									</a>								</li>
								
								<?php }} ?>
								
								
							
							</ul>
						</div>
					</div>	
					</div>
					
					<?php
					
					
					 }else{
					 
					  ?><div class="spanvideo fix-width-3">
					<div class="box radius">
						<div class="b-title">
							<div class="b-t-icon-right">Chuyên đề</div>
						</div>
						<div class="b-content">
							<ul class="nav nav-tabs nav-stacked reset-margin list-3">
							
							<?php 
								
 require './ketnoi.php';
$sql="select*from video_categories ca,video_video vi,video_phanloai pl where pl.maloai=ca.phanloai and ca.phanloai='$a1' and ca.congbo=1 and ca.id=vi.category and ca.chuyende=1 and vi.congbo=1 group by vi.category order by ca.sapxep asc";
$kq=mysql_query($sql);
  if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
											
                                                  $id=$row[0];
												  $linkca=$row["linkca"];
												  $linkpl=$row["linkpl"];
												$name=$row["name"];
												  $category=$row["category"];
												  $noibac=$row["noibac"];
												  $noibach=$row[4];
												  $count= mysql_query("SELECT COUNT(id) FROM video_video where category='$category' and congbo=1");
$row=mysql_fetch_row($count);
 
                                                 
					?><li class="news-list-item">
									<a href="<?php echo $a1 ?>-<?php echo $id ?>-<?php echo $linkpl ?>-<?php echo $linkca ?>">
										<span class="label monk-label"><?php echo $row['0']; ?></span>
										<span><?php echo $name ?><?php if($noibach==1){ ?><img src="./img/star-icon.png" class="gsnoibac"><?php }?></span>									</a>								</li>
								
								<?php }} ?>
								
								
							
							</ul>
						</div>
					</div>						
				</div>
				<div class="span6 fix-width-3">
					<div class="box radius">
						<?php 

require'ketnoi.php';						
$sql="select*from video_video vi,video_categories ca,video_phanloai pl where pl.maloai=ca.phanloai and ca.id=vi.category and vi.category='$a2' and vi.congbo=1 and ca.congbo=1";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
$count2= mysql_query("SELECT COUNT(id) FROM video_video where category='$a1' and congbo=1");
$row2=mysql_fetch_row($count2);
											
                                                  
												  $name=$row["name"];
												  $chuyende=$row["chuyende"];
												  $linkca=$row["linkca"];
												    $linkpl=$row["linkpl"];
                                                 
					?>
						<div class="page-header pg-header pg-header-videos reset-margin">
							<h4 class="reset-margin"><?php if($chuyende==1){echo "Chuyên đề : ";}else{echo "Giảng sư: ";}?><span><?php echo $name ?></span></h4>
							<i class="pull-right">
								<span>Sắp xếp theo : <a href="videogiam-<?php echo $a1 ?>-<?php echo $a2 ?>-<?php echo $linkpl ?>-<?php echo $linkca ?>">Giảm</a> / <a href="<?php echo $a1 ?>-<?php echo $a2 ?>-<?php echo $linkpl ?>-<?php echo $linkca ?>">Tăng</a>____________</span><span>Tổng số có (<?php echo $row2['0']; ?></span> video)
							</i>
						</div>
						
						<div class="b-content news-content padding-content">
						<?php 
require("ketnoi.php");//kết  nối đến CSDL
$baitren_mottrang=15;
// Nếu chưa chọn trang để xem. thì ta mặc định người dùng xem đang số 0 .
if ( !$_GET['page'] )
{
    $page = 0 ;
}
else
{
$page=$_GET['page'];
}
$sodu_lieu = mysql_num_rows(mysql_query("select*from video_categories ca,video_video vi where ca.id=vi.category and ca.congbo=1 and vi.category='$a2' and vi.congbo=1 order by vi.id asc") ) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$huuha=$page*$baitren_mottrang;
$result =mysql_query("select*from video_categories ca,video_video vi where ca.id=vi.category and ca.congbo=1 and vi.category='$a2' and vi.congbo=1 order by vi.id asc LIMIT {$huuha},{$baitren_mottrang} ") or die(mysql_error());
if(mysql_num_rows($result)!=0)
{
while ( $row = mysql_fetch_array($result )) 
{						


											
                                                  $title2=$row["title"];
												  $name2=$row["name"];
												  $views=$row["views"];
												  $imgbg=$row["imgbg"];
												  $linkca=$row["linkca"];
												  $linkvi=$row["linkvi"];
												  $id=$row["id"];
					?>
								<div class="media img-polaroid new-list-polaroid-3">
								<a class="pull-left" href="video-<?php echo $a1 ?>-<?php echo $id ?>-<?php echo $linkca ?>-<?php echo $linkvi ?>">
									<img class="media-object img-rounded" src="<?php echo $imgbg ?>">
								</a>
								<div class="media-body">
									<h4 class="media-heading"><?php echo $title2 ?></h4>
									<p class="media-reduce">Giảng sư: <span><?php echo $name2 ?></span></p>
									<a class="btn pull-right" href="video-<?php echo $a1 ?>-<?php echo $id ?>-<?php echo $linkca ?>-<?php echo $linkvi ?>"><i class="icon-share"></i> <span><?php echo $views ?></span> xem</a>
								</div>
							</div>
								
								<?php }} ?>
						
						
							
							
							
							
							
							
							
						<center>
<div class="pagination page-number">

									<ul>
										<li>
<?php
for ( $page = 0; $page < $sotrang; $page ++ )
{
?>
								
											<a href='trang<?php echo $a1 ?>-<?php echo $a2 ?>-<?php echo $page ?>'> <?php echo $page ?></a>
										
							
<?php
}

?>
</li>
									</ul>
								</div>
							</center>
							
						</div>
					</div>
				</div>
				
				<?php include'right.php';?>
				<?php } ?>