<?php @session_start();
$log= $_SESSION["log"];
$quyen= $_SESSION["quyen"]; ?>
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
-->
</style>
<?php
require '../config.php';
$a=$_GET["id"];
 $dulieu_sua="select*from hoidapct where id = '$a'";
	$query_dulieu_sua=mysql_query($dulieu_sua);
	$row=mysql_fetch_array($query_dulieu_sua);	
$id=$row["id"];
                                                  $hoten=$row["hoten"];
												  $chude=$row["chude"];
												  $cauhoi=$row["cauhoi"];
									
										
?>
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=hoidap_cs&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Chủ đề : </td><td><select name="danhmuc"><?php 							
require '../config.php';
$sql="select*from hoidap where id =$chude";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $id=$row["id"];
                                                  $danhmuc=$row["danhmuc"];
												  
												   ?>
						<option value="<?php echo $id ?>"><?php echo $danhmuc ?></option>
						<?php }}
						$sql="select*from hoidap where id!=$chude";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $id=$row["id"];
                                                  $danhmuc=$row["danhmuc"];
												  
												   ?>
						<option value="<?php echo $id ?>"><?php echo $danhmuc ?></option>
						<?php }} ?>
						
						
						
						</select></td></tr>
<tr><td>Câu hỏi : </td><td><textarea name="cauhoi" cols="100" rows=""><?php echo $cauhoi ?></textarea></td></tr>
<input type="hidden" name="id" value="<?php echo $a ;?>">
 <tr><td></td><td><input name="submit" type="submit" value="Chỉnh Sửa" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';
$danhmuc=$_POST["danhmuc"];
$id=$_POST["id"];
$cauhoi=$_POST["cauhoi"];


	 $them=mysql_query("update `hoidapct` set `chude`='$danhmuc',`cauhoi`='$cauhoi' where `id`='$id'"); 
 echo "<script>window.location='./?act=hoidap'</script>"; 
 
}
?>