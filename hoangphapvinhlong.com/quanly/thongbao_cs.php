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
<script src="ckeditor/ckeditor.js"></script>
<?php
require '../config.php';
$a=$_GET["id"];
 $dulieu_sua="select*from thongbao where id = '$a'";
	$query_dulieu_sua=mysql_query($dulieu_sua);
	$row=mysql_fetch_array($query_dulieu_sua);	
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
										

?>
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=thongbao_cs&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Tiêu đề : </td><td><textarea name="tieude" cols="100" rows=""><?php echo $tieude ?></textarea></td></tr>
<tr><td>Nội dung : </td><td><textarea name="editor1"><?php echo "$noidung"; ?></textarea>
        <script>
            CKEDITOR.replace( 'editor1' );
        </script></td></tr>
<tr>
  <td>Nổi bật: </td>
  <td><select name="noibac"><?php if($noibac==1){echo"<option value='1'>Có</option><option value='0'>Không</option>";}else {echo"<option value='0'>Không</option><option value='1'>Có</option>";}?></select></td>
</tr>
<tr><td>Hình trích ngang : </td><td><input type="file" name="upload" />
<input type="hidden" name="ten_anh" value="<?php echo $img ?>">
<input type="hidden" name="id" value="<?php echo $a ;?>">
<img src="../<?php echo $img ?>" width="130px" height="100px"></td></tr>
 <tr><td></td><td><input name="submit" type="submit" value="Chỉnh Sửa" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';
$tieude=$_POST["tieude"];
$id=$_POST["id"];
$noidung=$_POST["editor1"];
$ten_anh=$_POST["ten_anh"];
$noibac=$_POST["noibac"];
date_default_timezone_set("asia/bangkok");
$ngay=date("Y-m-d");
if($_FILES['upload']['tmp_name']==""){
    $them=mysql_query("update `thongbao` set `tieude`='$tieude',`noidung`='$noidung',`noibac`='$noibac',`img`='$ten_anh' where `id`='$id'"); 
 echo "<script>window.location='./?act=thongbao'</script>"; }else{
 $dir = "data/images/thongbao/"; //Bạn nên thay đổi đường dẫn cho phù hợp 
//Kiều file, Gif, jpeg, zip ::bạn có thể sửa đổi nếu thích 
$types = array("image/gif","image/GIF","image/JPG","image/jpg","image/png","image/JPEG","image/jpeg","application/x-zip-compressed");     
//Check to determine if the submit button has been pressed  
//Shorten Variables  
     $tmp_name = $_FILES['upload']['tmp_name'];  
     $new_name = $_FILES['upload']['name'];
	 $duongdan="$dir"."$new_name";
	 $tam="../";
//Check MIME Type  
    if (in_array($_FILES['upload']['type'], $types)){                     
         //Move file from tmp dir to new location  
        move_uploaded_file($tmp_name,$tam.$dir . $new_name);
        echo "<script>alert('Sửa tin thành công');</script>";
    }else{                 
    //Print Error Message  
     echo "<script>alert('{$_FILES['upload']['name']} Was Not Uploaded!');</script>";       
    //Debug  
   $name =  $_FILES['upload']['name'];  
   $type =    $_FILES['upload']['type'];  
   $size =    $_FILES['upload']['size'];  
   $tmp =     $_FILES['upload']['name'];      
   echo "Name: $name<br/ >Type: $type<br />Size: $size<br />Tmp: $tmp";               
    }
	 $them=mysql_query("update `thongbao` set `tieude`='$tieude',`noidung`='$noidung',`noibac`='$noibac',`img`='$duongdan' where `id`='$id'"); 
 echo "<script>window.location='./?act=thongbao'</script>"; 
 
}}
?>