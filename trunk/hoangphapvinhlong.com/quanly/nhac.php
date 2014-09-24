<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style><input type="button" value="Thêm mới" name="btnNew" onclick="window.location='./?act=nhac_them'" class="button">
<input type="button" value="Nhac noi bac" name="btnNew" onclick="window.location='./?act=nhac_noibac'" class="button"><table border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
	<tr>
		<th width="80" class="title">Xóa</th>
		<th width="80" class="title">Sửa</th>
		<th width="80" class="title">ID</th>
		<th width="100" class="title">Tên bài hát</th>
		<th width="100" class="title">Thuộc album</th>
		<th width="100" class="title">Đường dẩn</th>
		<th width="100" class="title">Nổi bậc</th>
		
	</tr>

<?php 							
require '../config.php';

$baitren_mottrang=25;
// Nếu chưa chọn trang để xem. thì ta mặc định người dùng xem đang số 0 .
if ( !$_GET['page'] )
{
    $page = 0 ;
}
else
{
$page=$_GET['page'];
}	
$sodu_lieu = mysql_num_rows(mysql_query("select*from  baihat bh,album al where al.id=bh.idalbum order by bh.id desc") ) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$huuha=$page*$baitren_mottrang;
$result =mysql_query("select*from  baihat bh,album al where al.id=bh.idalbum order by bh.id desc LIMIT {$huuha},{$baitren_mottrang} ") or die(mysql_error());
if(mysql_num_rows($result)!=0)
{
while ( $row = mysql_fetch_array($result )) 
{

$ten=$row["ten"];
$id=$row[0];
$duongdan=$row["duongdan"];
$noibac=$row[4];
$tieude=$row["tieude"];
?>
<tr>
		<th width="20"><a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"  href="?act=nhac_del&id=<?php echo $id ?>">Xóa</a></th>
		<th width="20"><a href="?act=nhac_cs&id=<?php echo $id ?>">Sửa</a></th>
		<th width="80" ><?php echo $id ?></th>
		<th width="100" ><?php echo $tieude ?></th>
		<th width="100" ><?php echo $ten ?></th>
		<th width="100" ><?php echo $duongdan ?></th>
		<th width="100" ><?php if($noibac=='1'){echo"Nổi bậc";}else{echo"Không nổi bậc";} ?></th>
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
								
											<a href='?act=nhac&page=<?php echo $page ?>'> <?php echo $page ?></a>
										
							
<?php
}

?>

									
								</div>
							</center>
</table>