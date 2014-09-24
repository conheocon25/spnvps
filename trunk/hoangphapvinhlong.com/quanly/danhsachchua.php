<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style><input type="button" value="Thêm mới" name="btnNew" onclick="window.location='./?act=danhsachchua_them'" class="button"><table border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
	<tr>
		<th width="20" class="title">Xóa</th>
		<th width="20" class="title">Sửa</th>
		<th width="80" class="title">ID</th>
		<th width="100" class="title">Tên chùa</th>
		<th width="100" class="title">Chủ trì</th>
		<th width="100" class="title">SĐT</th>
		<th width="80" class="title">Địa chỉ</th>
		<th width="100" class="title">Website</th>
	
		
		
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
$sodu_lieu = mysql_num_rows(mysql_query("select*from danhbachua order by id desc") ) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$huuha=$page*$baitren_mottrang;
$result =mysql_query("select*from  danhbachua order by id desc LIMIT {$huuha},{$baitren_mottrang} ") or die(mysql_error());
if(mysql_num_rows($result)!=0)
{
$i=0;
while ( $row = mysql_fetch_array($result )) 
{
$id=$row["id"];
$tenchua=$row["tenchua"];
$chutri=$row["chutri"];
$sdt=$row["sdt"];
$diachi=$row["diachi"];
$website=$row["website"];
$i=$i+1;
if($i%2==0){
 ?>
<tr bgcolor="#CCCCCC">
		<th width="20"><a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"  href="?act=danhsachchua_del&id=<?php echo $id ?>">Xóa</a></th>
		<th width="20"><a href="?act=danhsachchua_cs&id=<?php echo $id ?>">Sửa</a></th>
		<th width="80" ><?php echo $id ?></th>
		<th width="100" ><?php echo $tenchua ?></th>
		<th width="100" ><?php echo $chutri ?></th>
		<th width="80" ><?php echo $sdt ?></th>
		<th width="80" ><?php echo $diachi ?></th>
		<th width="80" ><?php echo $website ?></th>
		
		
		</tr>
		<?php }else{ ?>
		<tr bgcolor="#999999">
		<th width="20"><a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"  href="?act=danhsachchua_del&id=<?php echo $id ?>">Xóa</a></th>
		<th width="20"><a href="?act=danhsachchua_cs&id=<?php echo $id ?>">Sửa</a></th>
	<th width="80" ><?php echo $id ?></th>
		<th width="100" ><?php echo $tenchua ?></th>
		<th width="100" ><?php echo $chutri ?></th>
		<th width="80" ><?php echo $sdt ?></th>
		<th width="80" ><?php echo $diachi ?></th>
		<th width="80" ><?php echo $website ?></th>
		
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
								
											<a href='?act=danhsachchua&page=<?php echo $page ?>'> <?php echo $page ?></a>
										
							
<?php
}

?>

									
								</div>
							</center>
</table>