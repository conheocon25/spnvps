<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style><input type="button" value="Thêm mới" name="btnNew" onclick="window.location='./?act=sukien_them'" class="button"><table border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
	<tr>
		<th width="20" class="title">Xóa</th>
		<th width="20" class="title">Sửa</th>
		<th width="80" class="title">ID</th>
		<th width="100" class="title">Tiêu đề</th>
		<th width="100" class="title">Nội dung</th>
		<th width="100" class="title">Nổi bật</th>
		<th width="100" class="title">Hình</th>
		<th width="100" class="title">Thời gian bắt đầu</th>	
			
		
	</tr>

<?php 							
require '../config.php';
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
$sodu_lieu = mysql_num_rows(mysql_query("select*from event order by id desc") ) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$huuha=$page*$baitren_mottrang;
$result =mysql_query("select*from  event order by id desc LIMIT {$huuha},{$baitren_mottrang} ") or die(mysql_error());
if(mysql_num_rows($result)!=0)
{
$i=0;
while ( $row = mysql_fetch_array($result )) 
{
  $id=$row["id"];
                                                  $tieude=$row["tieude"];
												  $noidung=$row["noidung"];
												  $thoigiankt=$row["thoigiankt"];
												  $thoigianbd=$row["thoigianbd"];
												  $noibac=$row["noibac"];
												   $imgbg=$row["imgbg"];
												  $date = explode('-', $thoigiankt); 
										$day = $date[2]; 
										$month = $date[1]; 
										$year = $date[0];
										$ht="$day-$month-$year";
										$date1 = explode('-', $thoigianbd); 
										$day1 = $date1[2]; 
										$month1 = $date1[1]; 
										$year1 = $date1[0];
										$ht2="$day1-$month1-$year1";
$i=$i+1;
if($i%2==0){
 ?>
<tr bgcolor="#CCCCCC" height="50px">
		<th width="20"><a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"  href="?act=sukien_del&id=<?php echo $id ?>">Xóa</a></th>
		<th width="20"><a href="?act=sukien_cs&id=<?php echo $id ?>">Sửa</a></th>
		<th width="80" ><?php echo $id ?></th>
		<th width="100" ><?php echo $tieude ?></th>
		<th width="700" ><?php echo $noidung ?></th>
		<th width="700" ><img src="../<?php echo $imgbg ?>" width="130px" height="100px"></th>
		<th width="100" ><?php if($noibac==1){echo"Nổi bậc";}else{echo"Không nổi bậc";} ?></th>
		<th width="80" ><?php echo $thoigianbd ?></th>
		
		
		
		</tr>
		<?php }else{ ?>
		<tr bgcolor="#999999" height="50px">
		<th width="20"><a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"  href="?act=sukien_del&id=<?php echo $id ?>">Xóa</a></th>
		<th width="20"><a href="?act=sukien_cs&id=<?php echo $id ?>">Sửa</a></th>
		<th width="80" ><?php echo $id ?></th>
		<th width="100" ><?php echo $tieude ?></th>
		<th width="700" ><?php echo $noidung ?></th>
		<th width="700" ><img src="../<?php echo $imgbg ?>" width="130px" height="100px"></th>
		<th width="100" ><?php if($noibac==1){echo"Nổi bậc";}else{echo"Không nổi bậc";} ?></th>
		<th width="80" ><?php echo $thoigianbd ?></th>
	
		</tr>
		<?php }

}
}

?>
<center>
<div class="pagination page-number">

									
										
<?php
for ( $page = 0; $page < $sotrang; $page ++ )
{
?>
								
											<a href='?act=sukien&page=<?php echo $page ?>'> <?php echo $page ?></a>
										
							
<?php
}

?>

									
								</div>
							</center>
</table>