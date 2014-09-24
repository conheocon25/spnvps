<style type="text/css">
<!--
.style1 {
	color: #0000FF;
	font-size: 14px;
}
.style2 {
	color:#FF0000;
	font-size: 14px;
}
-->
</style>
<div class="span8 fix-width">
					
					<div class="box radius">
						<div class="b-title">
							<div class="b-t-icon-content">Sự kiện</div>
						</div>

						<div class="b-content news-content padding-content">
							<div class="news-author">
								<div class="news-tools"><p>Sự kiện sắp xãy ra <img src='./images/new.gif'/></p></div></div>
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

$sodu_lieu = mysql_num_rows(mysql_query("SELECT * FROM event order by id desc ") ) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$huuha=$page*$baitren_mottrang;
$result =mysql_query("SELECT * FROM event order by id desc LIMIT {$huuha},{$baitren_mottrang} ") or die(mysql_error());
if(mysql_num_rows($result)!=0)
{
while ( $row = mysql_fetch_array($result )) 
{
 
     												$id=$row["id"];
                                                  $tieude=$row["tieude"];
												  $noidung=$row["noidung"];
												  $imgbg=$row["imgbg"];
												  
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
										$h = $date2[3]; 
										$p = $date2[4]; 
										$s = $date2[5];
										date_default_timezone_set("asia/bangkok");
										$bd="$day2-$month2-$year2 $h:$p:$s";
						$ngaybd=mktime($h,$p,$s,$month2,$day2,$year2);
						$now=time();
						if($now < $ngaybd){
										?>
										 <div class="media img-polaroid new-list-polaroid">
												   <a class="pull-left" href="chi-tiet-su-kien<?php echo $id ?>">
									<img class="media-object img-rounded" src="<?php echo $imgbg; ?>">
								</a>
								<div class="media-body">
									<h4 class="media-heading"><?php echo $tieude; ?></h4>
									<p class="media-time">Bắt đầu: <i><?php echo $bd; ?></i></p>
									
									<p class="media-time"><span class="style1">Tình trạng</span>: <i><span class="style2"><?php if($now > $ngaybd){echo"Đã xảy ra rồi";}else{echo "Chưa xảy ra";} ?></span></i></p>
										<a class="btn btn-info" href="chi-tiet-su-kien<?php echo $id ?>"> Xem chi tiết</a>
								</div>
							</div>
   <?php
}}}
?>
<center>
<div class="pagination page-number">

									<ul>
										<li>
<?php
for ( $page = 0; $page < $sotrang; $page ++ )
{
?>
								
											<a href='?frame=sukien&page=<?php echo $page ?>'> <?php echo $page ?></a>
										
							
<?php
}

?>
</li>
									</ul>
								</div>
							</center>
							
							
					
						
							<div class="news-author">
								<div class="news-tools"><p>Sự kiện đã xãy ra </p></div></div>
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

$sodu_lieu = mysql_num_rows(mysql_query("SELECT * FROM event order by id desc ") ) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$huuha=$page*$baitren_mottrang;
$result =mysql_query("SELECT * FROM event order by id desc LIMIT {$huuha},{$baitren_mottrang} ") or die(mysql_error());
if(mysql_num_rows($result)!=0)
{
while ( $row = mysql_fetch_array($result )) 
{
 
     												$id=$row["id"];
                                                  $tieude=$row["tieude"];
												  $noidung=$row["noidung"];
												  $imgbg=$row["imgbg"];
												  
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
										$h = $date2[3]; 
										$p = $date2[4]; 
										$s = $date2[5];
										date_default_timezone_set("asia/bangkok");
										$bd="$day2-$month2-$year2 $h:$p:$s";
						$ngaybd=mktime($h,$p,$s,$month2,$day2,$year2);
						$now=time();
						if($now > $ngaybd){
										?>
										 <div class="media img-polaroid new-list-polaroid">
												   <a class="pull-left" href="chi-tiet-su-kien<?php echo $id ?>">
									<img class="media-object img-rounded" src="<?php echo $imgbg; ?>">
								</a>
								<div class="media-body">
									<h4 class="media-heading"><?php echo $tieude; ?></h4>
									<p class="media-time">Bắt đầu: <i><?php echo $bd; ?></i></p>
									
									<p class="media-time"><span class="style1">Tình trạng</span>: <i><span class="style2"><?php if($now > $ngaybd){echo"Đã xảy ra rồi";}else{echo "Chưa xảy ra";} ?></span></i></p>
										<a class="btn btn-info" href="chi-tiet-su-kien<?php echo $id ?>"> Xem chi tiết</a>
								</div>
							</div>
   <?php
}}}
?>
<center>
<div class="pagination page-number">

									<ul>
										<li>
<?php
for ( $page = 0; $page < $sotrang; $page ++ )
{
?>
								
											<a href='?frame=sukien&page=<?php echo $page ?>'> <?php echo $page ?></a>
										
							
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
				
				
		