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
		<th width="80" class="title">ID</th>
		<th width="100" class="title">Người góp ý</th>
		<th width="100" class="title">Nội dung</th>
		<th width="100" class="title">Ngày</th>
		<th width="100" class="title">Danh mục</th>
		
		
		
		
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
$sodu_lieu = mysql_num_rows(mysql_query("select*from comment_tt co,content_items vi where vi.id=co.news_id order by co.comment_id desc") ) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$huuha=$page*$baitren_mottrang;
$result =mysql_query("select*from comment_tt co,content_items vi where vi.id=co.news_id order by co.comment_id desc LIMIT {$huuha},{$baitren_mottrang} ") or die(mysql_error());
if(mysql_num_rows($result)!=0)
{
$i=0;
while ( $row = mysql_fetch_array($result )) 
{
  $id=$row["comment_id"];
                                                  $author=$row["author"];
												  $content=$row["content"];
												  $title=$row["title"];
												  $ngayhoi=$row["date"];
												   
												  $date = explode('-', $ngayhoi); 
										$day = $date[2]; 
										$month = $date[1]; 
										$year = $date[0];
										$ht="$day-$month-$year";
$i=$i+1;
if($i%2==0){
 ?>
<tr bgcolor="#CCCCCC" height="50px">
		<th width="20"><a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"  href="?act=bltt_del&id=<?php echo $id ?>">Xóa</a></th>
		<th width="80" ><?php echo $id ?></th>
		<th width="200" ><?php echo $author ?></th>
		<th width="100" ><?php echo $content ?></th>
		<th width="100" ><?php echo $ht ?></th>
		<th width="100" ><?php echo $title ?></th>

		
		
		
		
		</tr>
		<?php }else{ ?>
		<th width="20"><a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"  href="?act=bltt_del&id=<?php echo $id ?>">Xóa</a></th>
			<th width="80" ><?php echo $id ?></th>
		<th width="200" ><?php echo $author ?></th>
		<th width="100" ><?php echo $content ?></th>
		<th width="100" ><?php echo $ht ?></th>
		<th width="100" ><?php echo $title ?></th>

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
								
											<a href='?act=bltt&page=<?php echo $page ?>'> <?php echo $page ?></a>
										
							
<?php
}

?>

									
								</div>
							</center>
</table>