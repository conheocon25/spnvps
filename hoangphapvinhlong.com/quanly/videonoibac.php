<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style><table border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
	<tr>
		<th width="80" class="title">Sửa</th>
		<th width="80" class="title">ID</th>
		<th width="100" class="title">Tên danh mục</th>
		<th width="100" class="title">Tình trạng</th>
		
	</tr>

<?php 							
require '../config.php';
$sql="select*from  videonoibac order by id desc";
$kq=mysql_query($sql);
if(mysql_num_rows($kq)!=0)
{
while ( $row = mysql_fetch_array($kq )) 
{
$link=$row["link"];
$id=$row["id"];
$hienthi=$row["hienthi"]; ?>
<tr>
		
		<th width="20"><a href="?act=videonoibac_cs&id=<?php echo $id ?>">Sửa</a></th>
		<th width="80" ><?php echo $id ?></th>
		<th width="100" ><?php echo $link ?></th>
		<th width="100" ><?php if($hienthi==1){echo"Công bố";}else{echo"Chưa công bố";}?></th>
		</tr>
		<?php

}
}

?>
</table>