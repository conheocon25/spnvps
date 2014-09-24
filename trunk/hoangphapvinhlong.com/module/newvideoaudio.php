	
<div class="span8 fix-width">
						
					<div class="accordion accordion-fix" id="accordion4">
						<div class="accordion-group box radius">
							<div class="accordion-heading b-title clearfix">
								<div class="b-t-icon-videotc">Album audio mới nhất</div>
								
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
}$sodu_lieu = mysql_num_rows(mysql_query("select * from album al,theloaialbum tl where tl.id=al.idtheloai order by al.id desc limit 100") ) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$huuha=$page*$baitren_mottrang;
$result =mysql_query("select * from album al,theloaialbum tl where tl.id=al.idtheloai order by al.id desc LIMIT {$huuha},{$baitren_mottrang} ") or die(mysql_error());
if(mysql_num_rows($result)!=0)
{
while ( $row5 = mysql_fetch_array($result )) 
{	
							
								
												
												$ten=$row5[1];
												  $id=$row5[0];
												  $hinhbg=$row5["hinhbg"];
                                                
												  $linkal=$row5["linkal"];
																
																?>
																<li class="span2">
										<div class="thumbnail">
											<a href="nghe-album<?php echo $id ?>-<?php echo $linkal ?>" onMouseOver="Tip('<?php echo $ten ?>', WIDTH, 300, PADDING, 8, BGCOLOR, '#ffffff')" onMouseOut="UnTip()">
												<img src="<?php echo $hinhbg ?>">
												<p><?php echo  $ten; ?></p>
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
								
											<a href="index.php?frame=newvideoaudio&page=<?php echo $page; ?>"><?php echo $page ?></a>
										
							
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