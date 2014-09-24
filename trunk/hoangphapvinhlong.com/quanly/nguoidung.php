<?php @session_start();
$log= $_SESSION["log"];
$quyen= $_SESSION["quyen"];
if($quyen==1){	
?><style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style><table border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
	<tr>
		<th width="20" class="title">Xóa</th>
		<th width="20" class="title">Sửa</th>
		<th width="80" class="title">ID</th>
		<th width="100" class="title">Họ tên</th>
		<th width="100" class="title">Tên đăng nhập</th>
		<th width="100" class="title">Email</th>
		<th width="100" class="title">SĐT</th>
		<th width="100" class="title">Mật khẩu</th>
		<th width="100" class="title">Quốc gia</th>
		<th width="100" class="title">Giới tính</th>
		<th width="100" class="title">Ngày tạo</th>
		<th width="100" class="title">Tình trạng</th>
		<th width="100" class="title">Hình</th>
		
		
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
$sodu_lieu = mysql_num_rows(mysql_query("select*from users where quyen='2' order by id desc") ) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$huuha=$page*$baitren_mottrang;
$result =mysql_query("select*from users where quyen='2' order by id desc LIMIT {$huuha},{$baitren_mottrang} ") or die(mysql_error());
if(mysql_num_rows($result)!=0)
{
$i=0;
while ( $row = mysql_fetch_array($result )) 
{
  $id=$row["id"];
                                                  $hoten=$row["hoten"];
												  $tennguoidung=$row["tennguoidung"];
												  $email=$row["email"];
												  $matkhau=$row["matkhau"];
												  $quocgia=$row["quocgia"];
												  $gioitinh=$row["gioitinh"];
												  $hinh=$row["hinh"];
												  $ngaytao=$row["ngaytao"];
												   $sdt=$row["sdt"];
												    $tinhtrang=$row["tinhtrang"];
												   
												  $date = explode('-', $ngaytao); 
										$day = $date[2]; 
										$month = $date[1]; 
										$year = $date[0];
										$ht="$day-$month-$year";
$i=$i+1;
if($i%2==0){
 ?>
<tr bgcolor="#CCCCCC" height="50px">
		<th width="20"><a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"  href="?act=nguoidung_del&id=<?php echo $id ?>">Xóa</a></th>
		<th width="20"><a href="?act=nguoidung_cs&id=<?php echo $id ?>">Sửa</a></th>
		<th width="80" ><?php echo $id ?></th>
		<th width="200" ><?php echo $hoten ?></th>
		<th width="100" ><?php echo $tennguoidung ?></th>
		<th width="100" ><?php echo $email ?></th>
		<th width="100" ><?php echo $sdt ?></th>
		<th width="100" ><?php echo $matkhau ?></th>
		<th width="200" ><?php echo $quocgia ?></th>
		<th width="100" ><?php echo $gioitinh ?></th>
		<th width="100" ><?php echo $ht ?></th>
		<th width="100" ><?php if($tinhtrang==0){echo"Bình thường";}else{echo"Tạm khóa";} ?></th>
		<th width="80" ><?php echo "<img src='../$hinh' width='50px' height='50px' />"; ?></th>
		
		
		
		
		</tr>
		<?php }else{ ?>
		<th width="20"><a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"  href="?act=nguoidung_del&id=<?php echo $id ?>">Xóa</a></th>
		<th width="20"><a href="?act=nguoidung_cs&id=<?php echo $id ?>">Sửa</a></th>
		<th width="80" ><?php echo $id ?></th>
		<th width="200" ><?php echo $hoten ?></th>
		<th width="100" ><?php echo $tennguoidung ?></th>
		<th width="100" ><?php echo $email ?></th>
		<th width="100" ><?php echo $sdt ?></th>
		<th width="100" ><?php echo $matkhau ?></th>
		<th width="200" ><?php echo $quocgia ?></th>
		<th width="100" ><?php echo $gioitinh ?></th>
		<th width="100" ><?php echo $ht ?></th>
		<th width="100" ><?php if($tinhtrang==0){echo"Bình thường";}else{echo"Tạm khóa";} ?></th>
		<th width="80" ><?php echo "<img src='../$hinh' width='50px' height='50px' />"; ?></th>
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
								
											<a href='?act=nguoidung&page=<?php echo $page ?>'> <?php echo $page ?></a>
										
							
<?php
}

?>

									
								</div>
							</center>
</table>
<?php }else{include'tintuc.php';} ?>