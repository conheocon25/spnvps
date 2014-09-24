<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style><input type="button" value="Thêm mới" name="btnNew" onclick="window.location='./?act=danhmucvideo_them'" class="button"><table border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
	<tr>
		<th width="20" class="title">Xóa</th>
		<th width="20" class="title">Sửa</th>
		<th width="80" class="title">ID</th>
		<th width="100" class="title">Tên giảng sư/chuyên đề</th>
		<th width="100" class="title">Img</th>
		<th width="100" class="title">Phân loại</th>
		<th width="80" class="title">Nổi bậc</th>
		<th width="100" class="title">Chuyên đề</th>
		<th width="100" class="title">Công bố</th>
		
		
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
$sodu_lieu = mysql_num_rows(mysql_query("select*from   video_categories ca,video_phanloai pl where pl.maloai=ca.phanloai order by ca.id desc") ) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$huuha=$page*$baitren_mottrang;
$result =mysql_query("select*from   video_categories ca,video_phanloai pl where pl.maloai=ca.phanloai order by ca.id desc LIMIT {$huuha},{$baitren_mottrang} ") or die(mysql_error());
if(mysql_num_rows($result)!=0)
{
$i=0;
while ( $row = mysql_fetch_array($result )) 
{
$name=$row["name"];
$id=$row["id"];
$tenloai=$row["tenloai"];
$chuyende=$row["chuyende"];
$img=$row["img"];
$noibac=$row["noibac"];
$congbo=$row["congbo"];
$i=$i+1;
if($i%2==0){
 ?>
<tr bgcolor="#CCCCCC">
		<th width="20"><a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"  href="?act=danhmucvideo_del&id=<?php echo $id ?>">Xóa</a></th>
		<th width="20"><a href="?act=danhmucvideo_cs&id=<?php echo $id ?>">Sửa</a></th>
		<th width="80" ><?php echo $id ?></th>
		<th width="100" ><?php echo $name ?></th>
		<th width="80" ><?php echo "<img src='../$img' width='60px' height='50px' />"; ?></th>
		<th width="80" ><?php echo $tenloai ?></th>
		<th width="100" ><?php if($noibac==1){echo"Nổi bậc";}else{echo"Không nổi bậc";} ?></th>
		<th width="100" ><?php if($chuyende==1){echo"Thuộc chuyên đề";}else{echo"Không thuộc chuyên đề";} ?></th>
		<th width="100" ><?php if($congbo==1){echo"Công bố";}else{echo"Chưa công bố";}?></th>
		
		
		</tr>
		<?php }else{ ?>
		<tr bgcolor="#999999">
		<th width="20"><a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"  href="?act=danhmucvideo_del&id=<?php echo $id ?>">Xóa</a></th>
		<th width="20"><a href="?act=danhmucvideo_cs&id=<?php echo $id ?>">Sửa</a></th>
		<th width="80" ><?php echo $id ?></th>
		<th width="100" ><?php echo $name ?></th>
		<th width="80" ><?php echo "<img src='../$img' width='60px' height='50px' />"; ?></th>
		<th width="80" ><?php echo $tenloai ?></th>
		<th width="100" ><?php if($noibac==1){echo"Nổi bậc";}else{echo"Không nổi bậc";} ?></th>
		<th width="100" ><?php if($chuyende==1){echo"Thuộc chuyên đề";}else{echo"Không thuộc chuyên đề";} ?></th>
		<th width="100" ><?php if($congbo==1){echo"Công bố";}else{echo"Chưa công bố";}?></th>
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
								
											<a href='?act=danhmucvideo&page=<?php echo $page ?>'> <?php echo $page ?></a>
										
							
<?php
}

?>

									
								</div>
							</center>
</table>