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
<form name="f1" action="?act=danhsachchua_them&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Tên chùa : </td><td><textarea name="tenchua" cols="100" rows=""><?php echo $tenchua ?></textarea></td></tr>
<tr><td>Chủ trì : </td><td><textarea name="chutri" cols="100" rows=""><?php echo $chutri ?></textarea></td></tr>
<tr><td>Số điện thoại : </td><td><textarea name="sdt" cols="100" rows=""><?php echo $sdt ?></textarea></td></tr>
<tr><td>Địa chỉ : </td><td><textarea name="diachi" cols="100" rows=""><?php echo $diachi ?></textarea></td></tr>
<tr><td>Website : </td><td><textarea name="website" cols="100" rows=""><?php echo $website ?></textarea></td></tr>
 <tr><td></td><td><input name="submit" type="submit" value="Thêm" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';
$tenchua=$_POST["tenchua"];
$id=$_POST["id"];
$chutri=$_POST["chutri"];
$sdt=$_POST["sdt"];
$diachi=$_POST["diachi"];
$website=$_POST["website"];
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

$kd= utf8tourl(utf8convert($tenchua));

if( mysql_num_rows(mysql_query("SELECT linkchua FROM danhbachua WHERE linkchua='$kd'")))
    {
	 echo "<script>alert('Thêm không thành công. Danh mục này đã tồn tại');</script>";
	 
 echo "<script>window.location='./?act=danhsachchua'</script>";
 exit;
	}

     $them=mysql_query("insert into danhbachua(`tenchua`,`chutri`,`sdt`,`diachi`,`website`,`linkchua`)VALUES('{$tenchua}','{$chutri}','{$sdt}','{$diachi}','{$website}','{$kd}')"); 
 echo "<script>window.location='./?act=danhsachchua'</script>";
 
 
}
?>