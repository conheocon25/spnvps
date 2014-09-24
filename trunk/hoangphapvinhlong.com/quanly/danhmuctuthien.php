<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style><input type="button" value="Thêm mới" name="btnNew" onclick="window.location='./?act=danhmuctuthien_them'" class="button"><table border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
	<tr>
		<th width="80" class="title">Xóa</th>
		<th width="80" class="title">Sửa</th>
		<th width="80" class="title">ID</th>
		<th width="100" class="title">Tên danh mục</th>
		<th width="100" class="title">Tình trạng</th>
		
	</tr>

<?php 							
require '../config.php';
$sql="select*from  tuthien_danhmuc";
$kq=mysql_query($sql);
if(mysql_num_rows($kq)!=0)
{
while ( $row = mysql_fetch_array($kq )) 
{
$name=$row["name"];
$id=$row["id"];
$published=$row["published"]; ?>
<tr>
		<th width="20"><a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"  href="?act=danhmuctuthien_del&id=<?php echo $id ?>">Xóa</a></th>
		<th width="20"><a href="?act=danhmuctuthien_cs&id=<?php echo $id ?>">Sửa</a></th>
		<th width="80" ><?php echo $id ?></th>
		<th width="100" ><?php echo $name ?></th>
		<th width="100" ><?php if($published==1){echo"Công bố";}else{echo"Chưa công bố";}?></th>
		</tr>
		<?php

}
}

?>
</table>