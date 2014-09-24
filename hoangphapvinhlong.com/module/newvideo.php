	
<div class="span8 fix-width">
						
					<div class="accordion accordion-fix" id="accordion4">
						<div class="accordion-group box radius">
							<div class="accordion-heading b-title clearfix">
								<div class="b-t-icon-videotc">Video mới nhất</div>
								
							</div>
							<div id="collapse4" class="accordion-body collapse in b-content">
							<ul class="thumbnails grid-item reset-margin">
													<?php 
require("ketnoi.php");//kết  nối đến CSDL
$baitren_mottrang=80;
// Nếu chưa chọn trang để xem. thì ta mặc định người dùng xem đang số 0 .
if ( !$_GET['page'] )
{
    $page = 0 ;
}
else
{
$page=$_GET['page'];
}$sodu_lieu = mysql_num_rows(mysql_query("select * from video_video vi,video_phanloai pl,video_categories ca where pl.maloai=ca.phanloai and ca.id=vi.category and vi.congbo=1 and ca.congbo=1 order by vi.id desc limit 100") ) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$huuha=$page*$baitren_mottrang;
$result =mysql_query("select * from video_video vi,video_phanloai pl,video_categories ca where pl.maloai=ca.phanloai and ca.id=vi.category and vi.congbo=1 and ca.congbo=1 order by vi.id desc LIMIT {$huuha},{$baitren_mottrang} ") or die(mysql_error());
if(mysql_num_rows($result)!=0)
{
while ( $row5 = mysql_fetch_array($result )) 
{	
							
								
												
												
																$idc5=$row5[0];	
																$img5=$row5["imgbg"];	
																$title5=$row5["title"];	
																$maloai=$row5["maloai"];
																$linkca=$row5["linkca"];	
																$linkvi=$row5["linkvi"];	
																?>
																<li class="span2">
										<div class="thumbnail">
											<a href="video-<?php echo $maloai ?>-<?php echo $idc5 ?>-<?php echo $linkca ?>-<?php echo $linkvi ?>" onMouseOver="Tip('<?php echo $title5 ?>', WIDTH, 300, PADDING, 8, BGCOLOR, '#ffffff')" onMouseOut="UnTip()">
												<img src="<?php echo $img5 ?>">
												<p><?php echo  $title5; ?></p>
											</a>
										</div>
									</li>
																
												<?php				
													}
												}
												?>
								</ul>
								<center>
<div class="pagination page-number">

									<ul>
										<li>
<?php
for ( $page = 0; $page < $sotrang; $page ++ )
{
?>
								
											<a href="index.php?frame=newvideo&page=<?php echo $page; ?>"><?php echo $page ?></a>
										
							
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
					
					
					

				</div>