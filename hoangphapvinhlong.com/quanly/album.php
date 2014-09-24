<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style><input type="button" value="Thêm mới" name="btnNew" onclick="window.location='./?act=album_them'" class="button"><table border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
	<tr>
		<th width="80" class="title">Xóa</th>
		<th width="80" class="title">Sửa</th>
		<th width="80" class="title">ID</th>
		<th width="100" class="title">Tên album</th>
		<th width="100" class="title">Thuộc danh mục</th>
		<th width="100" class="title">Nổi bậc</th>
		<th width="100" class="title">Hình</th>
		
	</tr>

<?php 							
require '../config.php';
$sql="select*from  theloaialbum tl,album al where tl.id=al.idtheloai  order by al.id desc";
$kq=mysql_query($sql);
if(mysql_num_rows($kq)!=0)
{
while ( $row = mysql_fetch_array($kq )) 
{
$ten=$row[6];
$ten2=$row[1];
$id=$row[5];
$hinhbg=$row["hinhbg"];
$noibac=$row["noibac"];
$theloai=$row["theloai"]; ?>
<tr>
		<th width="20"><a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"  href="?act=album_del&id=<?php echo $id ?>">Xóa</a></th>
		<th width="20"><a href="?act=album_cs&id=<?php echo $id ?>">Sửa</a></th>
		<th width="80" ><?php echo $id ?></th>
		<th width="100" ><?php echo $ten ?></th>
		<th width="100" ><?php echo $ten2 ?></th>
		<th width="100" ><?php if($noibac==1){echo"Nổi bậc";}else{echo"Không nổi bậc";} ?></th>
		<th width="100" ><?php echo "<img src='../$hinhbg' width='60px' height='50px' />"; ?></th>
		</tr>
		<?php

}
}

?>
</table>