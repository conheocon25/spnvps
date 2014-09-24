<a href="trang-chu">
			<?php 							
require 'ketnoi.php';
$sql="select*from banner";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
$noidung=$row["noidung"];
if(substr($noidung,0,19)=='data/images/banner/'){?> <img src="<?php echo $noidung ?>" width="1000px"> <?php }else {echo $noidung;} ?>
			</a>