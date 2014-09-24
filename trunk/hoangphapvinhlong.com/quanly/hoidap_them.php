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
$noidung="";
 function xuly_kitu___khung_nhap_lieu___sua_sanpham_menu_ngang($giatri){
	$giatri=str_replace("\n","",$giatri);
	$giatri=str_replace("\t","",$giatri);
	$giatri=str_replace("\r","",$giatri);
	$giatri=str_replace("'","\'",$giatri);
	//$giatri=str_replace("\"","'",$giatri);
	return $giatri;
}
function khung_nhap_nhieu_sua_sanpham_menu_ngang($ten,$giatri)
{
	$giatri=xuly_kitu___khung_nhap_lieu___sua_sanpham_menu_ngang($giatri);
	//echo $giatri." \$giatri <br>";
	echo "
	<script type=\"text/javascript\">
		var giatri=\"$giatri\";
	</script>
	";
	echo "
	<script type=\"text/javascript\">

	var oFCKeditor = new FCKeditor('$ten');
	oFCKeditor.BasePath = \"fckeditor/\";
	oFCKeditor.Width	= 770 ;
	oFCKeditor.Config[\"EnterMode\"]		= \"br\" ;
	oFCKeditor.Value='$giatri';
	oFCKeditor.Create();
	document.getElementById('xEnter').value = \"br\" ;

	</script>";

}?>
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=thongbao_them&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Tiêu đề : </td><td><textarea name="tieude" cols="100" rows=""></textarea></td></tr>
<tr><td>Nội dung : </td><td><?php
echo "<div id=\"div_vn_afc\">";
			khung_nhap_nhieu_sua_sanpham_menu_ngang("noidung",$noidung);
		echo "</div>";?></td></tr>
<tr>
  <td>Nổi bậc: </td>
  <td><select name="noibac"><option value='0'>Không</option><option value='1'>Có</option></select></td>
</tr>
<tr><td>Hình trích ngan : </td><td><input type="file" name="upload" /></td></tr>
<input type="hidden" name="id" value="<?php echo $a ;?>">
 <tr><td></td><td><input name="submit" type="submit" value="Thêm" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';
$tieude=$_POST["tieude"];
$noidung=$_POST["noidung"];
$noibac=$_POST["noibac"];
date_default_timezone_set("asia/bangkok");
$ngay=date("Y-m-d");
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
        echo "<script>alert('Thêm tin thành công');</script>";
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

     $them=mysql_query("insert into thongbao(`tieude`,`noidung`,`created`,`noibac`,`img`)VALUES('{$tieude}','{$noidung}','{$ngay}','{$noibac}','{$duongdan}')"); 
 echo "<script>window.location='./?act=thongbao'</script>";
 
 
}
?>