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
 $dulieu_sua="select*from video_categories ca,video_phanloai pl where pl.maloai=ca.phanloai and ca.id = '$a'";
	$query_dulieu_sua=mysql_query($dulieu_sua);
	$row=mysql_fetch_array($query_dulieu_sua);
	
$name=$row["name"];
$id=$row["id"];
$tenloai=$row["tenloai"];
$chuyende=$row["chuyende"];
$img=$row["img"];
$noibac=$row["noibac"];
$congbo=$row["congbo"];
?>
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=danhmucvideo_cs&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Tên giảng sư/chuyên đề : </td><td><textarea name="giangsu" cols="100" rows=""><?php echo $name ?></textarea></td></tr>
<tr><td>Phân loại : </td><td><select name="phanloai"><?php 							
require '../config.php';
$sql="select*from video_phanloai pl,video_categories ca where pl.maloai=ca.phanloai and ca.id='$a'";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $maloai=$row["maloai"];
                                                  $tenloai=$row["tenloai"];
												  
												   ?>
						<option value="<?php echo $maloai ?>"><?php echo $tenloai ?></option>
						<?php }}?>
						<?php 							
require '../config.php';
$sql="select*from video_phanloai";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $maloai=$row["maloai"];
                                                  $tenloai=$row["tenloai"];
												  
												   ?>
						<option value="<?php echo $maloai ?>"><?php echo $tenloai ?></option>
						<?php }}?>
						</select>
</td></tr>
<tr>
  <td>Thuộc chuyên đề: </td>
  <td><select name="chuyende"><?php if($chuyende==1){echo"<option value='1'>Có</option><option value='0'>Không</option>";}else {echo"<option value='0'>Không</option><option value='1'>Có</option>";}?></select></td>
</tr>
<tr>
  <td>Công bố: </td>
  <td><select name="congbo"><?php if($congbo==1){echo"<option value='1'>Có</option><option value='0'>Không</option>";}else {echo"<option value='0'>Không</option><option value='1'>Có</option>";}?></select></td>
</tr>
<tr>
  <td>Nổi bậc: </td>
  <td><select name="noibac"><?php if($noibac==1){echo"<option value='1'>Có</option><option value='0'>Không</option>";}else {echo"<option value='0'>Không</option><option value='1'>Có</option>";}?></select></td>
</tr>
<tr><td>Hình: </td><td><input type="file" name="upload" />
<input type="hidden"  name="ten_anh" value="<?php echo $img ?>">
<input type="hidden" name="id" value="<?php echo $a ;?>">
<img src="../<?php echo $img ?>" width="130px" height="100px"></td></tr>
 <tr><td></td><td><input name="submit" type="submit" value="Chỉnh Sửa" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';
$giangsu=$_POST["giangsu"];
$id=$_POST["id"];
$phanloai=$_POST["phanloai"];
$ten_anh=$_POST["ten_anh"];
$chuyende=$_POST["chuyende"];
$congbo=$_POST["congbo"];
$noibac=$_POST["noibac"];
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

$kd= utf8tourl(utf8convert($giangsu));
if($_FILES['upload']['tmp_name']==""){
    $them=mysql_query("update video_categories set name='$giangsu',img='$ten_anh',phanloai='$phanloai',noibac='$noibac',chuyende='$chuyende',congbo='$congbo',linkca='$kd' where id='$id'"); 
	echo "<script>alert('Sửa tin thành công);</script>";
 echo "<script>window.location='./?act=danhmucvideo'</script>";}else{
$dir = "data/images/giangsu/"; //Bạn nên thay đổi đường dẫn cho phù hợp 
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

    $them=mysql_query("update `video_categories` set `name`='$giangsu',`img`='$duongdan',`phanloai`='$phanloai',`noibac`='$noibac',`chuyende`='$chuyende',`congbo`='$congbo',linkca='$kd' where `id`='$id'"); 
 echo "<script>window.location='./?act=danhmucvideo'</script>";}
 
 
}
?>