<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style><input type="button" value="Thêm mới" name="btnNew" onclick="window.location='./?act=nhacvideo_them'" class="button"><table border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
	<tr>
		<th width="80" class="title">Xóa</th>
		<th width="80" class="title">Sửa</th>
		<th width="80" class="title">ID</th>
		<th width="100" class="title">Tên bài hát</th>
		<th width="100" class="title">Thuộc album</th>
		<th width="100" class="title">Imgbg</th>
		<th width="100" class="title">Đường dẩn</th>
		
	</tr>

<?php 							
require '../config.php'; 


$baitren_mottrang=20;
// Nếu chưa chọn trang để xem. thì ta mặc định người dùng xem đang số 0 .
if ( !$_GET['page'] )
{
    $page = 0 ;
}
else
{
$page=$_GET['page'];
}	
$sodu_lieu = mysql_num_rows(mysql_query("select*from  baihatvideo bh,albumvideo al where al.id=bh.idalbum order by bh.id desc") ) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$huuha=$page*$baitren_mottrang;
$result =mysql_query("select*from  baihatvideo bh,albumvideo al where al.id=bh.idalbum order by bh.id desc LIMIT {$huuha},{$baitren_mottrang} ") or die(mysql_error());
if(mysql_num_rows($result)!=0)
{
while ( $row = mysql_fetch_array($result )) 
{
$ten=$row["ten"];
$id=$row[0];
$duongdan=$row["duongdan"];
$imgbg=$row["imgbg"];
$noibac=$row["noibac"];
$tieude=$row["tieude"];

 ?>
<tr>
		<th width="20"><a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"  href="?act=nhacvideo_del&id=<?php echo $id ?>">Xóa</a></th>
		<th width="20"><a href="?act=nhacvideo_cs&id=<?php echo $id ?>">Sửa</a></th>
		<th width="80" ><?php echo $id ?></th>
		<th width="100" ><?php echo $tieude ?></th>
		<th width="100" ><?php echo $ten ?></th>
		<th width="80" ><?php if(substr($imgbg,0,18)=='data/images/video/'){echo "<img src='../$imgbg' width='30px' height='30px' />";}else {echo "<img src='$imgbg' width='30px' height='30px' />";} ?></th>
		<th width="100" ><?php echo $duongdan ?></th>
		</tr>
		<?php 

}
}

?>
<center>
<div class="pagination page-number">

									
										
<?php
for ( $page = 0; $page < $sotrang; $page ++ )
{
?>
								
											<a href='?act=nhacvideo&page=<?php echo $page ?>'> <?php echo $page ?></a>
										
							
<?php
}

?>

									
								</div>
							</center>
</table>