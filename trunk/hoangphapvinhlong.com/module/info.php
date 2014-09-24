<div class="span6 reset-margin">
				<div class="f-left">
									<?php 
 require 'ketnoi.php';
$sql="select*from lienhe where vitri='trai'";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
$noidung=$row["noidung"];	
echo $noidung;
?>
					
					
				</div>
			</div>
			<div class="span6 pull-right reset-margin">
				<div class="f-right">
					<?php 
 require 'ketnoi.php';
$sql="select*from lienhe where vitri='phai'";
$kq=mysql_query($sql);
$row=mysql_fetch_array($kq);
$noidung=$row["noidung"];	
echo $noidung;
?>	
					
					
				</div>
			</div>