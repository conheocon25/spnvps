<?php @session_start();
$log= $_SESSION["log"];
$quyen= $_SESSION["quyen"]; ?>
 <script language="JavaScript" src="calendar_us.js"></script>
<script src="ckeditor/ckeditor.js"></script>
	<link rel="stylesheet" href="calendar.css">
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style1 {color: #FF0000}
-->
</style>
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=sukien_them&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Tiêu đề : </td><td><textarea name="tieude" cols="100" rows=""></textarea></td></tr>
<tr><td>Nội dung : </td><td><textarea name="editor1"><?php echo "$a3"; ?></textarea>
        <script>
            CKEDITOR.replace( 'editor1' );
        </script></td></tr>
<tr>
  <td>Nổi bậc: </td>
  <td><select name="noibac"><option value='0'>Không</option><option value='1'>Có</option></select></td>
</tr>
 <tr><td>Ngày bắt đầu:</td><td><input type="text" name="bd"  size="20" />
   <span class="style1">Lưu Ý: Nhập theo dạng : Năm-tháng-ngày-giờ-phút-giây. vd : 2013-08-20-19-00-00        </span></td>
 </tr>
			 
<tr><td>Hình nền: </td><td><input type="file" name="upload" />
</td></tr>
 <tr><td></td><td><input name="submit" type="submit" value="Thêm" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';
$tieude=$_POST["tieude"];
$noidung=$_POST["editor1"];
$bd=$_POST["bd"];
$kt=$_POST["kt"];
$noibac=$_POST["noibac"];
date_default_timezone_set("asia/bangkok");
$ngay=date("Y-m-d");

  $date = explode('-', $kt); 
										$day = $date[1]; 
										$month = $date[0]; 
										$year = $date[2];
										$ht="$year-$month-$day";
										$date1 = explode('-', $bd); 
										$day1 = $date1[1]; 
										$month1 = $date1[0]; 
										$year1 = $date1[2];
										$ht2="$year1-$month1-$day1";

 $dir = "data/images/sukien/"; //Bạn nên thay đổi đường dẫn cho phù hợp 
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
	   $them=mysql_query("insert into event(`thoigianbd`,`noidung`,`tieude`,`noibac`,`imgbg`)VALUES('{$bd}','{$noidung}','{$tieude}','{$noibac}','{$duongdan}')"); 
 echo "<script>alert('Thêm thành công');</script>";
		echo "<script>window.location='./?act=sukien'</script>";
}
?>