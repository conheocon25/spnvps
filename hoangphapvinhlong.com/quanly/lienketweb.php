<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style><input type="button" value="Thêm mới" name="btnNew" onclick="window.location='./?act=lienketweb_them'" class="button"><table border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
	<tr>
		<th width="20" class="title">Xóa</th>
		<th width="20" class="title">Sửa</th>
		<th width="80" class="title">ID</th>
		<th width="100" class="title">Tiêu đề</th>
		<th width="100" class="title">Link</th>
	
			
		
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
$sodu_lieu = mysql_num_rows(mysql_query("select*from lienketweb order by id desc") ) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$huuha=$page*$baitren_mottrang;
$result =mysql_query("select*from  lienketweb order by id desc LIMIT {$huuha},{$baitren_mottrang} ") or die(mysql_error());
if(mysql_num_rows($result)!=0)
{
$i=0;
while ( $row = mysql_fetch_array($result )) 
{
  $id=$row["id"];
                                                  $tieude=$row["tieude"];
												  $link=$row["link"];
												
$i=$i+1;
if($i%2==0){
 ?>
<tr bgcolor="#CCCCCC" height="50px">
		<th width="20"><a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"  href="?act=lienketweb_del&id=<?php echo $id ?>">Xóa</a></th>
		<th width="20"><a href="?act=lienketweb_cs&id=<?php echo $id ?>">Sửa</a></th>
		<th width="80" ><?php echo $id ?></th>
		<th width="100" ><?php echo $tieude ?></th>
		<th width="700" ><?php echo $link ?></th>
		
		
		
		
		</tr>
		<?php }else{ ?>
		<tr bgcolor="#999999" height="50px">
		<th width="20"><a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"  href="?act=lienketweb_del&id=<?php echo $id ?>">Xóa</a></th>
		<th width="20"><a href="?act=lienketweb_cs&id=<?php echo $id ?>">Sửa</a></th>
		<th width="80" ><?php echo $id ?></th>
		<th width="100" ><?php echo $tieude ?></th>
		<th width="700" ><?php echo $link ?></th>
		
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
								
											<a href='?act=lienketweb&page=<?php echo $page ?>'> <?php echo $page ?></a>
										
							
<?php
}

?>

									
								</div>
							</center>
</table>