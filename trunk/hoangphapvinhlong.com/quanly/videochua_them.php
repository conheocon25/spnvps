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
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=videochua_them&lenh=do" method="post" enctype="multipart/form-data">
<tr>
  <td>Tiêu đề: </td>
  <td><textarea name="tieude" cols="100" rows=""></textarea></td></tr>
<tr>
  <td>Url Video : </td>
  <td><textarea name="video" cols="100" rows=""></textarea></td>
</tr>
<tr>
  <td>Giảng sư : </td>
  <td><textarea name="giangsu" cols="100" rows=""></textarea></td>
</tr>
<tr>
  <td>Thuộc Chùa: </td>
  <td><select name="idchua">
  <?php 							
require '../config.php';
$sql="select*from danhbachua";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                   $tenchua=$row["tenchua"];
                                                  $id=$row["id"];
												  
												   ?>
						<option value="<?php echo $id ?>"><?php echo $tenchua ?></option>
						<?php }}?></select>
  
  </td>
</tr>
<tr>
  <td>Lượt xem: </td>
  <td><input name="xem" type="text" value="" /></td>
</tr>
<tr><td>Chỉnh sửa hình nền:</td><td><input type="file" name="upload" />
</td></tr>
 <tr><td></td><td><input name="submit" type="submit" value="Thêm" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';
$tieude=$_POST["tieude"];
$id=$_POST["id"];
$video=$_POST["video"];
$idchua=$_POST["idchua"];
$xem=$_POST["xem"];
$giangsu=$_POST["giangsu"];
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
$tieudetach = str_replace("www.youtube.com/watch?v=","img.youtube.com/vi/",$video);
$bgimg="$tieudetach"."/default.jpg";
date_default_timezone_set("asia/bangkok");
$ngay=date("Y-m-d");
if( mysql_num_rows(mysql_query("SELECT video FROM danhbachua_chitiet WHERE video='$video'")))
    {
	 echo "<script>alert('Thêm không thành công. Video này đã tồn tại');</script>";
	 
 echo "<script>window.location='./?act=videochua'</script>";
 exit;
	}


if($_FILES['upload']['tmp_name']==""){
    $them=mysql_query("insert into danhbachua_chitiet(`tieude`,`video`,`bgimg`,`idchua`,`xem`,`link`,`giangsu`)values('{$tieude}','{$video}','{$bgimg}','{$idchua}','{$xem}','{$kd}','{$giangsu}')"); 
	 echo "<script>alert('Thêm thành công');</script>";
 echo "<script>window.location='./?act=videochua'</script>";
 
 }else{
 $dir = "data/images/video/"; //Bạn nên thay đổi đường dẫn cho phù hợp 
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
  $them=mysql_query("insert into danhbachua_chitiet(`tieude`,`video`,`bgimg`,`idchua`,`xem`,`link`,`giangsu`)values('{$tieude}','{$video}','{$duongdan}','{$idchua}','{$xem}','{$kd}','{$giangsu}')"); 
	 echo "<script>alert('Thêm thành công');</script>";
 echo "<script>window.location='./?act=videochua'</script>";
 
 }
}
?>