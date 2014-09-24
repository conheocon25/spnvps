<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style><table border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
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
$sodu_lieu = mysql_num_rows(mysql_query("select*from  video_categories ca,video_video vi,users us where ca.id=vi.category and us.tennguoidung=vi.user and us.quyen !=1 and vi.congbo='0' order by vi.id desc") ) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$huuha=$page*$baitren_mottrang;
$result =mysql_query("select*from  video_categories ca,video_video vi,users us where ca.id=vi.category and us.tennguoidung=vi.user and us.quyen !=1 and vi.congbo='0' order by vi.id desc LIMIT {$huuha},{$baitren_mottrang} ") or die(mysql_error());
if(mysql_num_rows($result)!=0)
{
$i=0;
while ( $row = mysql_fetch_array($result )) 
{

$title=$row["title"];
$hoten=$row["hoten"];
$id=$row[8];
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
		<th width="20"><a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"  href="?act=video_delndccb&id=<?php echo $id ?>">Xóa</a></th>
		<th width="20"><a href="?act=video_csndccb&id=<?php echo $id ?>">Sửa</a></th>
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
		<th width="20"><a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"  href="?act=video_delndccb&id=<?php echo $id ?>">Xóa</a></th>
		<th width="20"><a href="?act=video_csndccb&id=<?php echo $id ?>">Sửa</a></th>
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
								
											<a href='?act=videondccb&page=<?php echo $page ?>'> <?php echo $page ?></a>
										
							
<?php
}

?>

									
								</div>
							</center>
</table>