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
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=tintuc_them&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Tiêu đề : </td><td><textarea name="tieude" cols="100" rows=""></textarea></td></tr>
<tr><td>Shottext : </td><td><textarea name="shottext" cols="100" rows=""></textarea></td></tr>
<tr><td>Danh mục tin tức : </td><td><select name="giangsu"><?php 							
require '../config.php';
$sql="select*from content_categories";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $id=$row["id"];
                                                  $name=$row["name"];
												  
												   ?>
						<option value="<?php echo $id ?>"><?php echo $name ?></option>
						<?php }} ?></select>
</td></tr>
<tr><td>Nội dung : </td><td>
<textarea name="editor1"><?php echo "$a3"; ?></textarea>
        <script>
            CKEDITOR.replace( 'editor1' );
        </script>
</td></tr>
<tr><td>Hình trích ngan : </td><td><input type="file" name="upload" /> </td></tr>
<tr><td>Công bố : </td><td><select name="congbo"><option value="1">Có</option><option value="0">Không</option></select></td></tr>
<tr><td>Nổi bậc : </td><td><select name="noibac"><option value="0">Không</option><option value="1">Có</option></select></td></tr>
 <tr><td></td><td><input name="submit" type="submit" value="Thêm mới" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';
$result =mysql_query("SELECT * FROM users where tennguoidung='$log'");
$row = mysql_fetch_array($result);
$tieude=$_POST["tieude"];
$shottext=$_POST["shottext"];
$giangsu=$_POST["giangsu"];
$congbo=$_POST["congbo"];
$noibac=$_POST["noibac"];
date_default_timezone_set("asia/bangkok");
$created=date("Y-m-d");
$created_by=$row["id"];
$hits=0;
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

$noidung=$_POST['editor1'];
$kd= utf8tourl(utf8convert($tieude));
$dir = "data/images/tintuc/"; //Bạn nên thay đổi đường dẫn cho phù hợp 
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

    $them=mysql_query("insert into content_items(`title`,`img`,`published`,`fulltext`,`created`,`created_by`,`hits`,`idcategories`,`shottext`,`noibac`,`link`)VALUES('{$tieude}','{$duongdan}','{$congbo}','{$noidung}','{$created}','{$created_by}','{$hits}','{$giangsu}','{$shottext}','{$noibac}','{$kd}')"); 
 echo "<script>window.location='./?act=tintuc'</script>";
 
 
}
?>