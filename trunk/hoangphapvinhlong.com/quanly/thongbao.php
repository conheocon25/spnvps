<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style><input type="button" value="Thêm mới" name="btnNew" onclick="window.location='./?act=thongbao_them'" class="button"><table border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
	<tr>
		<th width="20" class="title">Xóa</th>
		<th width="20" class="title">Sửa</th>
		<th width="80" class="title">ID</th>
		<th width="100" class="title">Tiêu đề</th>
		<th width="100" class="title">Nội dung</th>
		<th width="100" class="title">Hình ảnh</th>
		<th width="100" class="title">Nổi bật</th>
		
		<th width="100" class="title">Ngày đăng</th>		
		
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
$sodu_lieu = mysql_num_rows(mysql_query("select*from thongbao order by id desc") ) or die(mysql_error());
$sotrang = $sodu_lieu/$baitren_mottrang;
$huuha=$page*$baitren_mottrang;
$result =mysql_query("select*from  thongbao order by id desc LIMIT {$huuha},{$baitren_mottrang} ") or die(mysql_error());
if(mysql_num_rows($result)!=0)
{
$i=0;
while ( $row = mysql_fetch_array($result )) 
{
  $id=$row["id"];
                                                  $tieude=$row["tieude"];
												  $noidung=$row["noidung"];
												  $created=$row["created"];
												  $noibac=$row["noibac"];
												   $img=$row["img"];
												  $date = explode('-', $created); 
										$day = $date[2]; 
										$month = $date[1]; 
										$year = $date[0];
										$ht="$day-$month-$year";
$i=$i+1;
if($i%2==0){
 ?>
<tr bgcolor="#CCCCCC" height="50px">
		<th width="20"><a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"  href="?act=thongbao_del&id=<?php echo $id ?>">Xóa</a></th>
		<th width="20"><a href="?act=thongbao_cs&id=<?php echo $id ?>">Sửa</a></th>
		<th width="80" ><?php echo $id ?></th>
		<th width="200" ><?php echo $tieude ?></th>
		<th width="400" ><?php echo mb_substr($noidung,0,200,'UTF-8') ?></th>
		<th width="700" ><img src="../<?php echo $img ?>" width="150" height="100"/></th>
		<th width="100" ><?php if($noibac==1){echo"Nổi bậc";}else{echo"Không nổi bậc";} ?></th>
		<th width="80" ><?php echo $ht ?></th>
		
		
		
		</tr>
		<?php }else{ ?>
		<tr bgcolor="#999999" height="50px">
		<th width="20"><a onClick="return confirm('Bạn có chắc chắn muốn xóa ?');"  href="?act=thongbao_del&id=<?php echo $id ?>">Xóa</a></th>
		<th width="20"><a href="?act=thongbao_cs&id=<?php echo $id ?>">Sửa</a></th>
		<th width="80" ><?php echo $id ?></th>
		<th width="200" ><?php echo $tieude ?></th>
		<th width="400" ><?php echo  mb_substr($noidung,0,200,'UTF-8') ?>...</th>
		<th width="700" ><img src="../<?php echo $img ?>" width="150" height="100"/></th>
		<th width="100" ><?php if($noibac==1){echo"Nổi bậc";}else{echo"Không nổi bậc";} ?></th>
		<th width="80" ><?php echo $ht ?></th>
		
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
								
											<a href='?act=thongbao&page=<?php echo $page ?>'> <?php echo $page ?></a>
										
							
<?php
}

?>

									
								</div>
							</center>
</table>