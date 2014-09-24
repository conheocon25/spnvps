<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style><input type="button" value="Thêm mới" name="btnNew" onclick="window.location='./?act=sidletrangchu_them'" class="button"><table border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
	<tr>
		<th width="20" class="title">Xóa</th>
		<th width="20" class="title">Sửa</th>
		<th width="80" class="title">ID</th>
		<th width="100" class="title">Tiêu đề</th>
		<th width="100" class="title">Nội dung</th>
		<th width="100" class="title">Link</th>
		<th width="80" class="title">Img</th>
		
		
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
$sodu_lieu = mysql_num_rows(mysql_query("select*from  sidletrangchu order by maside desc ") ) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$huuha=$page*$baitren_mottrang;
$result =mysql_query("select*from  sidletrangchu order by maside desc  LIMIT {$huuha},{$baitren_mottrang} ") or die(mysql_error());
if(mysql_num_rows($result)!=0)
{
$i=0;
while ( $row = mysql_fetch_array($result )) 
{
$maside=$row["maside"];
$tieudeside=$row["tieudeside"];
$noidungside=mb_substr($row["noidungside"],0,70,'UTF-8');
$hinhanhside=$row["hinhanhside"];
$linkside=$row["linkside"];
$i=$i+1;
if($i%2==0){
 ?>
<tr bgcolor="#CCCCCC">
		<th width="20"><a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"  href="?act=sidletrangchu_del&id=<?php echo $maside ?>">Xóa</a></th>
		<th width="20"><a href="?act=sidletrangchu_cs&id=<?php echo $maside ?>">Sửa</a></th>
		<th width="80" ><?php echo $maside ?></th>
		<th width="100" ><?php echo $tieudeside ?></th>


		
		<th width="100" ><?php echo $noidungside ?>...</th>
		<th width="100" ><?php echo $linkside ?></th>
		<th width="80" ><?php echo "<img src='../$hinhanhside' width='50px' height='50px' />"; ?></th>
		</tr>
		<?php }else{ ?>
		<tr bgcolor="#999999">
		<th width="20"><a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"  href="?act=sidletrangchu_del&id=<?php echo $maside ?>">Xóa</a></th>
		<th width="20"><a href="?act=sidletrangchu_cs&id=<?php echo $maside ?>">Sửa</a></th>
		<th width="80" ><?php echo $maside ?></th>
		<th width="100" ><?php echo $tieudeside ?></th>


		
		<th width="100" ><?php echo $noidungside ?>...</th>
		<th width="100" ><?php echo $linkside ?></th>
		<th width="80" ><?php echo "<img src='../$hinhanhside' width='50px' height='50px' />"; ?></th>
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
								
											<a href='?act=sidletrangchu&page=<?php echo $page ?>'> <?php echo $page ?></a>
										
							
<?php
}

?>

									
								</div>
							</center>
</table>