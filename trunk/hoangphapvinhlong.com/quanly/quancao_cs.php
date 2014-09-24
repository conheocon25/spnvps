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
$a=$_GET["id"];
 $dulieu_sua="select * from  quancao where id = '$a'";
	$query_dulieu_sua=mysql_query($dulieu_sua);
	$row_dulieu_sua=mysql_fetch_array($query_dulieu_sua);
	$noidung="$row_dulieu_sua[noidung]"; 
	$tieude="$row_dulieu_sua[tieude]"; 
	$luotxem="$row_dulieu_sua[luotxem]"; 
	$hinhanh="$row_dulieu_sua[hinhanh]";
	
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

}
?>
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=quancao_cs&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Tiêu đề : </td><td><textarea name="tieude" cols="100" rows=""><?php echo $tieude ?></textarea></td></tr>
<tr><td>Nội dung : </td><td><?php
echo "<div id=\"div_vn_afc\">";
			khung_nhap_nhieu_sua_sanpham_menu_ngang("noidung",$noidung);
		echo "</div>";?>
</td></tr>
<tr><td>Hình: </td><td><input type="file" name="upload" />
<input type="hidden" name="ten_anh" value="<?php echo $hinhanh ?>">
<input type="hidden" name="id" value="<?php echo $a ;?>">
<img src="../<?php echo $hinhanh ?>" width="130px" height="100px"></td></tr>
 <tr><td></td><td><input name="submit" type="submit" value="Chĩnh Sữa" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';
$result =mysql_query("SELECT * FROM users where tennguoidung='$log'");
$row = mysql_fetch_array($result);
$tieude=$_POST["tieude"];
$id=$_POST["id"];
$ten_anh=$_POST["ten_anh"];
$noidung=$_POST["noidung"];
$luotxem=0;
function utf8convert($str) {
    if(!$str) return false;
    $utf8 = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'=>'đ|Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
            );
    foreach($utf8 as $ascii=>$uni) $str = preg_replace("/($uni)/i",$ascii,$str);
return $str;
}
 function utf8tourl($text){
    $text = strtolower(utf8convert($text));
    $text = str_replace( "ß", "ss", $text);
    $text = str_replace( "%", "", $text);
    $text = preg_replace("/[^_a-zA-Z0-9 -]/", "",$text);
    $text = str_replace(array('%20', ' '), '-', $text);
    $text = str_replace("----","-",$text);
    $text = str_replace("---","-",$text);
    $text = str_replace("--","-",$text);
return $text;
}

$kd= utf8tourl(utf8convert($tieude));
if($_FILES['upload']['tmp_name']==""){
    $them=mysql_query("update `quancao` set `tieude`='$tieude',`hinhanh`='$ten_anh',`noidung`='$noidung',`luotxem`='$luotxem' where `id`='$id'"); 
	echo "<script>alert('Sửa tin thành công);</script>";
 echo "<script>window.location='./?act=quancao'</script>";}else{
$dir = "data/images/bg/"; //Bạn nên thay đổi đường dẫn cho phù hợp 
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

   $them=mysql_query("update `quancao` set `tieude`='$tieude',`hinhanh`='$duongdan',`noidung`='$noidung',`luotxem`='$luotxem' where `id`='$id'"); 
 echo "<script>window.location='./?act=quancao'</script>";}
 
 
}
?>