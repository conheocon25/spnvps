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
<script language="javascript" src="fckeditor/fckeditor.js"></script>
<?php
require '../config.php';
 $dulieu_sua="select*from banner";
	$query_dulieu_sua=mysql_query($dulieu_sua);
	$row=mysql_fetch_array($query_dulieu_sua);	
$id=$row["id"];
$noidung=$row["noidung"];
												  
?>
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=banner&lenh=do" method="post" enctype="multipart/form-data">

<tr><td>Link ảnh : </td><td><input type="file" name="upload" /><?php if(substr($noidung,0,19)=='data/images/banner/'){?><img src="../<?php echo $noidung ?>" width="700px" height="400px"><?php }else{}?></td></tr>
<input type="hidden" name="id" value="<?php echo $id ;?>">
<tr><td>Flash : </td><td><textarea name="flash" cols="100" rows=""><?php if(substr($noidung,0,19)!='data/images/banner/'){echo "$noidung";}else {} ?></textarea></td></tr>
 <tr><td></td><td><input name="submit" type="submit" value="Chỉnh Sửa" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';
$id=$_POST["id"];
$flash=$_POST["flash"];
if($_FILES['upload']['tmp_name']==""){  $them=mysql_query("update `banner` set `noidung`='$flash' where `id`='$id'"); 
 echo "<script>window.location='./?act=banner'</script>"; }else{
$dir = "data/images/banner/"; //Bạn nên thay đổi đường dẫn cho phù hợp 
//Kiều file, Gif, jpeg, zip ::bạn có thể sửa đổi nếu thích 
$types = array("image/gif","image/GIF","image/JPG","image/jpg","image/png","image/JPEG","image/SWF","image/jpeg","application/x-zip-compressed");     
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

    $them=mysql_query("update `banner` set `noidung`='$duongdan' where `id`='$id'"); 
 echo "<script>window.location='./?act=banner'</script>"; }
 
 
}
?>