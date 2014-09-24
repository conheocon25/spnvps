<div class="span8 fix-width">
					
					<div class="box radius">
						<div class="page-header pg-header pg-header-question reset-margin">
							<h4 class="reset-margin">Các câu hỏi</h4>
						</div>
						<div class="b-content padding-content news-content">
							<?php
require("./ketnoi.php");//kết  nối đến CSDL
$baitren_mottrang=15;
$a=$_GET["id"];
// Nếu chưa chọn trang để xem. thì ta mặc định người dùng xem đang số 0 .
if ( !$_GET['page'] )
{
    $page = 0 ;
}
else
{
$page=$_GET['page'];
}

$sodu_lieu = mysql_num_rows(mysql_query("SELECT * FROM hoidap hd,hoidapct hdct where hd.id=hdct.chude and hdct.chude='$a' order by hdct.id desc ") ) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$huuha=$page*$baitren_mottrang;
$result =mysql_query("SELECT * FROM hoidap hd,hoidapct hdct where hd.id=hdct.chude  and hdct.chude='$a' order by hdct.id desc LIMIT {$huuha},{$baitren_mottrang} ") or die(mysql_error());
if(mysql_num_rows($result)!=0)
{
$i=0;
while ( $row = mysql_fetch_array($result )) 
{

$id=$row["id"];
                                                  $danhmuc=$row["danhmuc"];
												  $cauhoi=$row["cauhoi"];
												  $ngay=$row["ngayhoi"];
												  
												
												   
										$date = explode('-', $ngay); 
										$day = $date[2]; 
										$month = $date[1]; 
										$year = $date[0];
										$ngayhoi="$day-$month-$year";
										$i=$i+1;
										  $count= mysql_query("SELECT COUNT(id) FROM hoidaptraloi where idcauhoi='$id'");
$row=mysql_fetch_row($count);
										
							
							
						?>	<div class="media img-polaroid new-list-polaroid-3">
								<a href="hoi-dap-chi-tiet<?php echo $id ?>" class="pull-left">
									<img src="data/images/bg/question (1).png" class="media-object img-rounded">
								</a>
								<div class="media-body">
									<h4 class="media-heading"><span><a href="hoi-dap-chi-tiet<?php echo $id ?>" class="pull-left"><?php echo $i ?></span>. Hỏi về <span><?php echo $danhmuc ?> (Có <?php echo $row['0']; ?> trả lời)</a></span></h4>
									<p></p><p>
	<?php echo $cauhoi ?></p>
<p></p>
									<i>Hỏi ngày : <?php echo $ngayhoi ?></i>
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
								
											<a href='danh-muc-hoi-dap<?php echo $a ?>-page=<?php echo $page ?>'> <?php echo $page ?></a>
										
							
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