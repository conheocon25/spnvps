<?php @session_start();
$log= $_SESSION["log"];
$quyen= $_SESSION["quyen"]; ?>
<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
}
.style1 {color: #FF0000}
-->
</style>
<script src="ckeditor/ckeditor.js"></script>
<table align="center" border="1" cellpadding="1" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=danhmucvideo_them&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Tên giảng sư/chuyên đề : </td><td><textarea name="giangsu" cols="100" rows=""></textarea><br/><span class='style1'>Chú ý: Nếu muốn Danh mục nào đứng trước thì thêm vào số thứ tự vì sẻ sắp xếp theo thứ tự giảm dần.</span></td></tr>
<tr><td>Sắp xếp :</td><td><input type="textbox" name="sapxep" value="<?php echo $sapxep ?>"></td></tr>
<tr><td>Phân loại :</td><td><select name="phanloai">
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
<tr><td>Phân loại giảng sư : </td><td><select name="giangsupl">
<option value="0">Không thuộc giảng sư</option>
						<?php 							
require '../config.php';
$sql="select*from giangsu";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $magiangsu=$row["magiangsu"];
                                                  $tengiangsu=$row["tengiangsu"];
												  
												   ?>
						<option value="<?php echo $magiangsu ?>"><?php echo $tengiangsu ?></option>
						<?php }}?>
						</select>
</td></tr>
<tr><td>Tỉnh thành : </td><td><select name="tinhthanh">
						<?php 							
require '../config.php';
$sql="select*from tinhthanh";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $matinh=$row["matinh"];
                                                  $tentinh=$row["tentinh"];
												  
												   ?>
						<option value="<?php echo $matinh ?>"><?php echo $tentinh ?></option>
						<?php }}?>
						</select>
</td></tr>
<tr><td>Giới thiệu: </td><td>
<textarea name="editor1"></textarea>
        <script>
            CKEDITOR.replace( 'editor1' );
        </script>
</td></tr>
<tr>
  <td>Thuộc chuyên đề: </td>
  <td><select name="chuyende"><option value='0'>Không</option><option value='1'>Có</option></select></td>
</tr>
<tr>
  <td>Công bố: </td>
  <td><select name="congbo"><option value='0'>Không</option><option value='1'>Có</option></select></td>
</tr>
<tr>
  <td>Nổi bậc: </td>
  <td><select name="noibac"><option value='0'>Không</option><option value='1'>Có</option></select></td>
</tr>
<tr><td>Hình: </td><td><input type="file" name="upload" /></td></tr>
 <tr><td></td><td><input name="submit" type="submit" value="Thêm mới" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';
$giangsu=$_POST["giangsu"];
$phanloai=$_POST["phanloai"];
$chuyende=$_POST["chuyende"];
$giangsupl=$_POST["giangsupl"];
$gioithieu=$_POST["editor1"];
$tinhthanh=$_POST["tinhthanh"];
$congbo=$_POST["congbo"];
if($sapxep=$_POST["sapxep"]!=""){$sapxep=$_POST["sapxep"];}else{$sapxep=10000;}
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

if( mysql_num_rows(mysql_query("SELECT linkca FROM video_categories WHERE linkca='$kd'")))
    {
	 echo "<script>alert('Thêm không thành công. Danh mục này đã tồn tại');</script>";
	 
 echo "<script>window.location='./?act=danhmucvideo'</script>";
 exit;
	}
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
        echo "<script>alert('Thêm thành công');</script>";
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

     $them=mysql_query("insert into video_categories(`sapxep`,`name`,`img`,`phanloai`,`noibac`,`chuyende`,`congbo`,`linkca`,`giangsu`,`gioithieu`,`tinhthanh`)VALUES('{$sapxep}','{$giangsu}','{$duongdan}','{$phanloai}','{$noibac}','{$chuyende}','{$congbo}','{$kd}','{$giangsupl}','{$gioithieu}','{$tinhthanh}')"); 
 echo "<script>window.location='./?act=danhmucvideo'</script>";
 
 
}
?>