<div class="span8 fix-width">
<?php  require './ketnoi.php';$a=$_GET["id"]; $sql4="select * from danhbachua where id='$a'";
												$kq4=mysql_query($sql4);
												$row4=mysql_fetch_array($kq4);
														
																$tenchua=$row4["tenchua"];	
																$chutri=$row4["chutri"];	
																$sdt=$row4["sdt"];	
																$website=$row4["website"];	
																$diachi=$row4["diachi"];	
																
												 ?>

					
					<div class="box radius">
						<div class="page-header pg-header pg-header-pagoda reset-margin">
							<h4 class="reset-margin">Thông tin <?php echo $tenchua ?></h4>
							<i class="pull-right"><strong>Website:</strong> <a href="<?php echo $website ?>"><?php echo $website ?></a></i>
						</div>
						<div class="b-content news-content padding-content">
							<p><i class="icon-user"></i> <strong>Trụ trì: </strong> <span><?php echo $chutri?></span></p>
							<p><i class="icon-home"></i> <strong>Địa chỉ:</strong> <span><?php echo $diachi?></span></p>
							<p><i class="icon-book"></i> <strong>Điện thoại:</strong> <span><?php echo $sdt?></span></p>

							<div class="news-author"><p>
								<span class="btn btn-danger disabled btn-small">
									<i class=" icon-bullhorn icon-white"></i> Các hoạt động
								</span>
							</p></div>
							
							
							
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
$sodu_lieu = mysql_num_rows(mysql_query("select*from  danhbachua_chitiet ct,danhbachua db where db.id=ct.idchua and ct.idchua='$a' order by ct.id desc") ) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$huuha=$page*$baitren_mottrang;
$result =mysql_query("select*from  danhbachua_chitiet ct,danhbachua db where db.id=ct.idchua and ct.idchua='$a' order by ct.id desc LIMIT {$huuha},{$baitren_mottrang} ") or die(mysql_error());
if(mysql_num_rows($result)!=0)
{
while ( $row = mysql_fetch_array($result )) 
{						


											
                                                  $video=$row["video"];
												  $tieude=$row["tieude"];
												  $bgimg=$row["bgimg"];
												  $giangsu=$row["giangsu"];
												  $id=$row[0];
												  $link=$row["link"];
												   $linkchua=$row["linkchua"];
												   $idchua=$row["idchua"];
												   $xem=$row["xem"];
												
					?>
								<div class="media img-polaroid new-list-polaroid-3">
								<a class="pull-left" href="hat-video-<?php echo $a ?>-<?php echo $id ?>-<?php echo $linkchua ?>-<?php echo $link ?>">
									<img class="media-object img-rounded" src="<?php echo $bgimg ?>">
								</a>
								<div class="media-body">
									<h4 class="media-heading"><?php echo $tieude ?></h4>
									<p class="media-reduce">Giảng sư: <span><?php echo $giangsu ?></span></p>
									<a class="btn pull-right" href="hat-video-<?php echo $a ?>-<?php echo $id ?>-<?php echo $linkchua ?>-<?php echo $link ?>"><i class="icon-share"></i> <span><?php echo $xem ?></span> xem</a>
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
								
											<a href="danh-ba-<?php echo $a ?>-page=<?php echo $page ?>"> <?php echo $page ?></a>
										
							
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