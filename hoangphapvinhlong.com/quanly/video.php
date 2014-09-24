<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style><input type="button" value="Thêm mới" name="btnNew" onclick="window.location='./?act=video_them'" class="button">
<form name="f1" action="?act=video&lenh=do" method="post" enctype="multipart/form-data"><input type="text" value="" name="key" /><input type="submit" value="Tìm kiếm" name="timkiem" /></form>

<?php
if ( $_GET['lenh'] == "do" )
{

?>
<table border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
	<tr>
		<th width="20" class="title">Xóa</th>
		<th width="20" class="title">Sửa</th>
		<th width="80" class="title">ID</th>
		<th width="100" class="title">Tiêu đề </th>
		<th width="100" class="title">Người đăng </th>
		<th width="100" class="title">Url Video</th>
		<th width="80" class="title">img</th>
		<th width="100" class="title">Chuyên mục </th>
		<th width="100" class="title">Lượt xem </th>
		<th width="100" class="title">Nổi bật </th>
		<th width="100" class="title">Công bố </th>
		
		
	</tr>

<?php 							
require '../config.php';
$key=$_POST['key'];
$sql2="select*from  video_categories ca,video_video vi,users us where ca.id=vi.category and us.tennguoidung=vi.user and vi.id='$key'";
$kq2=mysql_query($sql2);
	$row2=mysql_fetch_array($kq2);
$title=$row2["title"];
$hoten=$row2["hoten"];
$id=$row2[11];
$video=$row2["video"];
$imgbg=$row2["imgbg"];
$name=$row2["name"];
$views=$row2["views"];
$noibac=$row2["noibac"];
$congbo=$row2["congbo"];
 ?>
<tr bgcolor="#CCCCCC">
		<th width="20"><a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"  href="?act=video_del&id=<?php echo $id ?>">Xóa</a></th>
		<th width="20"><a href="?act=video_cs&id=<?php echo $id ?>">Sửa</a></th>
		<th width="80" ><?php echo $id ?></th>
		<th width="100" ><?php echo $title ?></th>
		<th width="80" ><?php echo $hoten ?></th>
		<th width="80" ><?php echo $video ?></th>
		<th width="80" ><?php if(substr($imgbg,0,18)=='data/images/video/'){echo "<img src='../$imgbg' width='60px' height='50px' />";}else {echo "<img src='$imgbg' width='60px' height='50px' />";} ?></th>
		<th width="80" ><?php echo $name ?></th>
		<th width="100" ><?php echo $views ?></th>
		<th width="100" ><?php if($noibac==1){echo"Nổi bậc";}else{echo"Không nổi bậc";} ?></th>
		<th width="100" ><?php if($congbo==1){echo"Công bố";}else{echo"Chưa công bố";}?></th>
		
		
		</tr>
	


</table>
<?php 
}else{
?>

<table border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
	<tr>
		<th width="20" class="title">Xóa</th>
		<th width="20" class="title">Sửa</th>
		<th width="80" class="title">ID</th>
		<th width="100" class="title">Tiêu đề </th>
		<th width="100" class="title">Người đăng </th>
		<th width="100" class="title">Url Video</th>
		<th width="80" class="title">img</th>
		<th width="100" class="title">Chuyên mục </th>
		<th width="100" class="title">Lượt xem </th>
		<th width="100" class="title">Nổi bậc </th>
		<th width="100" class="title">Công bố </th>
		
		
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
$sodu_lieu = mysql_num_rows(mysql_query("select*from  video_categories ca,video_video vi,users us where ca.id=vi.category and us.tennguoidung=vi.user order by vi.id desc") ) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$huuha=$page*$baitren_mottrang;
$result =mysql_query("select*from  video_categories ca,video_video vi,users us where ca.id=vi.category and us.tennguoidung=vi.user order by vi.id desc LIMIT {$huuha},{$baitren_mottrang} ") or die(mysql_error());
if(mysql_num_rows($result)!=0)
{
$i=0;
while ( $row = mysql_fetch_array($result )) 
{

$title=$row["title"];
$hoten=$row["hoten"];
$id=$row[12];
$video=$row["video"];
$imgbg=$row["imgbg"];
$name=$row["name"];
$views=$row["views"];
$noibac=$row["noibac"];
$congbo=$row["congbo"];
$i=$i+1;
if($i%2==0){
 ?>
<tr bgcolor="#CCCCCC">
		<th width="20"><a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"  href="?act=video_del&id=<?php echo $id ?>">Xóa</a></th>
		<th width="20"><a href="?act=video_cs&id=<?php echo $id ?>">Sửa</a></th>
		<th width="80" ><?php echo $id ?></th>
		<th width="100" ><?php echo $title ?></th>
		<th width="80" ><?php echo $hoten ?></th>
		<th width="80" ><?php echo $video ?></th>
		<th width="80" ><?php if(substr($imgbg,0,18)=='data/images/video/'){echo "<img src='../$imgbg' width='60px' height='50px' />";}else {echo "<img src='$imgbg' width='60px' height='50px' />";} ?></th>
		<th width="80" ><?php echo $name ?></th>
		<th width="100" ><?php echo $views ?></th>
		<th width="100" ><?php if($noibac==1){echo"Nổi bậc";}else{echo"Không nổi bậc";} ?></th>
		<th width="100" ><?php if($congbo==1){echo"Công bố";}else{echo"Chưa công bố";}?></th>
		
		
		</tr>
		<?php }else{ ?>
		<tr bgcolor="#999999">
		<th width="20"><a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"  href="?act=video_del&id=<?php echo $id ?>">Xóa</a></th>
		<th width="20"><a href="?act=video_cs&id=<?php echo $id ?>">Sửa</a></th>
		<th width="80" ><?php echo $id ?></th>
		<th width="100" ><?php echo $title ?></th>
		<th width="80" ><?php echo $hoten ?></th>
		<th width="80" ><?php echo $video ?></th>
		<th width="80" ><?php if(substr($imgbg,0,18)=='data/images/video/'){echo "<img src='../$imgbg' width='60px' height='50px' />";}else {echo "<img src='$imgbg' width='60px' height='50px' />";} ?></th>
		<th width="80" ><?php echo $name ?></th>
		<th width="100" ><?php echo $views ?></th>
		<th width="100" ><?php if($noibac==1){echo"Nổi bậc";}else{echo"Không nổi bậc";} ?></th>
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
								
											<a href='?act=video&page=<?php echo $page ?>'> <?php echo $page ?></a>
										
							
<?php
}

?>

									
								</div>
							</center>
</table>
<?php } ?>