<?php $a=$_GET["id"];?>	
							<?php 
								
 require './ketnoi.php';
$sql="select*from  tuthien_danhmuc where id='$a'";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
$name=$row["name"];

?>
<div class="span8 fix-width">
					
					<div class="box radius">
						<div class="b-title">
							<div class="b-t-icon-content">Từ thiện / <?php echo $name ?></div>
						</div>
						<div class="b-content padding-content">
	<?php
$a=$_GET["id"];
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

$sodu_lieu = mysql_num_rows(mysql_query("SELECT * FROM tuthien_ct where idcategories='$a' order by id desc ") ) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$huuha=$page*$baitren_mottrang;
$result =mysql_query("SELECT * FROM tuthien_ct where idcategories='$a' order by id desc LIMIT {$huuha},{$baitren_mottrang} ") or die(mysql_error());
if(mysql_num_rows($result)!=0)
{
while ( $row = mysql_fetch_array($result )) 
{
 
     $id=$row["id"];
                                                  $title=$row["title"];
												  $img=$row["img"];
												  
												  $shottext=$row["shottext"];
												  $fulltext=$row["fulltext"];
										$createdd=$row["created"];		 
										$date = explode('-', $createdd); 
										$day = $date[2]; 
										$month = $date[1]; 
										$year = $date[0];
										$created="$day-$month-$year";
										?>
										 <div class="media img-polaroid new-list-polaroid">
												   <a class="pull-left" href="tu-thien-chi-tiet<?php echo $id ?>">
									<img class="media-object img-rounded" src="<?php echo $img; ?>">
								</a>
								<div class="media-body">
									<h4 class="media-heading"><?php echo $title; ?></h4>
									<p class="media-time">Cập nhật: <i><?php echo $created; ?></i></p>
									<p class="media-reduce">
	<?php echo $shottext; ?>
</p>
									<a class="btn btn-info" href="tu-thien-chi-tiet<?php echo $id ?>"> Xem chi tiết</a>
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
								
											<a href='tu-thien<?php echo $a ?>-page=<?php echo $page ?>'> <?php echo $page ?></a>
										
							
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
				
				
		