<?php @session_start();
$log= $_SESSION["log"];
$quyen= $_SESSION["quyen"]; ?>
<script src="ckeditor/ckeditor.js"></script>
<?php
require '../config.php';
$a=$_GET["id"];
 $dulieu_sua="select * from  sidletrangchu where maside = '$a'";
	$query_dulieu_sua=mysql_query($dulieu_sua);
	$row_dulieu_sua=mysql_fetch_array($query_dulieu_sua);
	$tieudeside="$row_dulieu_sua[tieudeside]"; 
	$noidungside="$row_dulieu_sua[noidungside]"; 
	$hinhanhside="$row_dulieu_sua[hinhanhside]"; 
	$linkside="$row_dulieu_sua[linkside]";


?>
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=sidletrangchu_cs&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Tiêu đề : </td><td><textarea name="tieude" cols="100" rows=""><?php echo $tieudeside ?></textarea></td></tr>
<tr><td>Link : </td><td><textarea name="link" cols="100" rows=""><?php echo $linkside ?></textarea></td></tr>
<tr><td>Nội dung : </td><td><textarea name="editor1"><?php echo "$noidungside"; ?></textarea>
        <script>
            CKEDITOR.replace( 'editor1' );
        </script>
</td></tr>
<tr><td>Hình trích ngan : </td><td><input type="file" name="upload" />
<input type="hidden" name="ten_anh" value="<?php echo $hinhanhside ?>">
<input type="hidden" name="id" value="<?php echo $a ;?>">
<img src="../<?php echo $hinhanhside ?>" width="130px" height="100px"></td></tr>
 <tr><td></td><td><input name="submit" type="submit" value="Chỉnh sửa" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';
$id=$_POST["id"];
$ten_anh=$_POST["ten_anh"];
$tieude=$_POST["tieude"];
$link=$_POST["link"];
$editor1=$_POST["editor1"];

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
    $them=mysql_query("update `sidletrangchu` set `tieudeside`='$tieude',`noidungside`='$editor1',`hinhanhside`='$ten_anh',`linkside`='$link' where `maside`='$id'"); 
	echo "<script>alert('Sửa tin thành công);</script>";
 echo "<script>window.location='./?act=sidletrangchu'</script>";}else{
$dir = "data/images/sidletrangchu/"; //Bạn nên thay đổi đường dẫn cho phù hợp 
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

    $them=mysql_query("update `sidletrangchu` set `tieudeside`='$tieude',`noidungside`='$editor1',`hinhanhside`='$duongdan',`linkside`='$link' where `maside`='$id'"); 
 echo "<script>window.location='./?act=sidletrangchu'</script>";}
 
 
}
?>