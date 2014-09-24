<div class="span8 fix-width">
					
					<div class="box radius">
						<div class="b-title">
							<div class="b-t-icon-content">Đào tạo</div>
						</div>
						<div class="b-content padding-content">
	<?php
require("./ketnoi.php");//kết  nối đến CSDL
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

$sodu_lieu = mysql_num_rows(mysql_query("SELECT * FROM daotao order by id desc ") ) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$huuha=$page*$baitren_mottrang;
$result =mysql_query("SELECT * FROM daotao order by id desc LIMIT {$huuha},{$baitren_mottrang} ") or die(mysql_error());
if(mysql_num_rows($result)!=0)
{
while ( $row = mysql_fetch_array($result )) 
{
 
     $id=$row["id"];
                                                  $tieude=$row["tieude"];
												  $img=$row["imgbg"];
												   $thoigianbd=$row["thoigianbd"];
												  $thoigiankt=$row["thoigiankt"];
												   
										$date = explode('-', $thoigiankt); 
										$day = $date[2]; 
										$month = $date[1]; 
										$year = $date[0];
										$kt="$day-$month-$year";
										
										$date2 = explode('-', $thoigianbd); 
										$day2 = $date2[2]; 
										$month2 = $date2[1]; 
										$year2 = $date2[0];
										$bd="$day2-$month2-$year2";
												  
												
												  
										
										?>
										 <div class="media img-polaroid new-list-polaroid">
												   <a class="pull-left" href="?frame=daotaoct&id=<?php echo $id; ?>">
									<img class="media-object img-rounded" src="<?php echo $img; ?>">
								</a>
								<div class="media-body">
									<h4 class="media-heading"><?php echo $tieude; ?></h4>
									<p class="media-time">Bắt đầu: <i><?php echo $bd; ?></i></p>
									<p class="media-time">Kết thúc: <i><?php echo $kt; ?></i></p>
									<a class="btn btn-info" href="?frame=daotaoct&id=<?php echo $id; ?>"> Xem chi tiết</a>
								</div>
							</div>
   <?php
}}
?>
<center>
<div class="pagination page-number">

									<ul>
										<li>
<?php
for ( $page = 0; $page < $sotrang; $page ++ )
{
?>
								
											<a href='?frame=tintuc&page=<?php echo $page ?>'> <?php echo $page ?></a>
										
							
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
				
				
		