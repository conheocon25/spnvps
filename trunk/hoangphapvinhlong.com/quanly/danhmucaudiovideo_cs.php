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
 $dulieu_sua="select*from theloaialbumvideo where id = '$a'";
	$query_dulieu_sua=mysql_query($dulieu_sua);
	$row=mysql_fetch_array($query_dulieu_sua);	
$id=$row["id"];
                                                  $name=$row["ten"];
												  if($sapxepc =='10000'){$sapxep='';}else{$sapxep=$sapxepc;}
												  $published=$row["theloai"];
												 
?>
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=danhmucaudiovideo_cs&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Tên danh mục : </td><td><textarea name="name" cols="100" rows=""><?php echo $name ?></textarea></br><span class='style1'>Chú ý: Nếu muốn Danh mục nào đứng trước thì thêm vào số thứ tự vì sẻ sắp xếp theo thứ tự giảm dần.</span></td></tr></td></tr>
<tr>
  <td>Tình trạng: </td>
  <td><select name="published"><?php if($published=='nhac'){echo"<option value='nhac'>Nhạc khác</option><option value='bai-giang'>Nhạc phật</option>";}else {echo"<option value='bai-giang'>Nhạc phật</option><option value='nhac'>Nhạc khác</option>";}?></select></td>
</tr>
<input type="hidden" name="id" value="<?php echo $id ;?>">
 <tr><td></td><td><input name="submit" type="submit" value="Chỉnh Sửa" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';
$published=$_POST["published"];
$id=$_POST["id"];
$name=$_POST["name"];
if($sapxep=$_POST["sapxep"]!=""){$sapxep=$_POST["sapxep"];}else{$sapxep=10000;}
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
$kd= utf8tourl(utf8convert($name));

    $them=mysql_query("update `theloaialbumvideo` set `sapxep`='$sapxep',`ten`='$name',`theloai`='$published',`linktheloai`='$kd' where `id`='$id'"); 
 echo "<script>window.location='./?act=danhmucaudiovideo'</script>";
 
 
}
?>