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
 $dulieu_sua="select*from video_video where id = '$a'";
	$query_dulieu_sua=mysql_query($dulieu_sua);
	$row=mysql_fetch_array($query_dulieu_sua);
	
$title=$row["title"];
if(substr($row["video"],0,37)=="http://nguyenphongvinhlong.com/video/"){
$video=substr($row["video"],37);}else{$video=$row["video"];}
$views=$row["views"];
$noibac=$row["noibac"];
$noibactrangchu=$row["noibactrangchu"];
$congbo=$row["congbo"];
$imgbg=$row["imgbg"];
?>
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=video_cs&lenh=do" method="post" enctype="multipart/form-data">
<tr>
  <td>Tiêu đề: </td>
  <td><textarea name="tieude" cols="100" rows=""><?php echo $title ?></textarea></td></tr>
<tr>
  <td>Url Video : </td>
  <td><textarea name="url" cols="100" rows=""><?php echo $video ?></textarea><br/> Chú ý: Ghi đường dẫn tuyệt đối trong thư mục chứa bài hát Video.</td>
</tr>
<tr>
  <td>Chọn server nếu video là trên server: </td>
  <td><select name="server">
  <option value="0">Chọn server</option>
  
  <?php 							
require '../config.php';
$sql="select*from server";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $masv=$row["masv"];
                                                  $tensv=$row["tensv"];
												  
												   ?>
						<option value="<?php echo $tensv ?>"><?php echo $tensv ?></option>
						<?php }}?></select>
  
  </td>
</tr>
<tr>
  <td>Chuyên mục: </td>
  <td><select name="chuyenmuc">
   <?php 							
require '../config.php';
$sql="select*from video_categories ca,video_video vi where ca.id=vi.category and vi.id='$a'";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $name=$row["name"];
                                                  $category=$row["category"];?>
												<option value="<?php echo $category ?>"><?php echo $name ?></option>  
												   ?>
						
						<?php }}?>
  <?php 							
require '../config.php';
$sql="select*from video_categories order by name desc";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $name=$row["name"];
                                                  $id=$row["id"];
												  
												   ?>
						<option value="<?php echo $id ?>"><?php echo $name ?></option>
						<?php }}?></select>
  
  </td>
</tr>
<tr>
  <td>Lượt xem: </td>
  <td><input name="luotxem" type="text" value="<?php echo $views ?>" /></td>
</tr>
<tr>
  <td>Nổi bật: </td>
  <td><select name="noibac"><?php if($noibac==1){echo"<option value='1'>Có</option><option value='0'>Không</option>";}else {echo"<option value='0'>Không</option><option value='1'>Có</option>";}?></select></td>
</tr>
<tr>
  <td>Công bố: </td>
  <td><select name="congbo"><?php if($congbo==1){echo"<option value='1'>Có</option><option value='0'>Không</option>";}else {echo"<option value='0'>Không</option><option value='1'>Có</option>";}?></select></td>
</tr>
<tr><td>Chỉnh sửa hình nền:</td><td><input type="file" name="upload" />
<?php if(substr($imgbg,0,18)=='data/images/video/'){echo "<img src='../$imgbg' width='60px' height='50px' />";}else {echo "<img src='$imgbg' width='60px' height='50px' />";} ?>
</td></tr>
 <tr><td><input name="id" type="hidden" value="<?php echo $a ?>"type="text" /></td><td><input name="submit" type="submit" value="Chỉnh Sửa" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
require '../config.php';
$tieude=$_POST["tieude"];
$id=$_POST["id"];
$url=$_POST["url"];
$server=$_POST["server"];
$chuyenmuc=$_POST["chuyenmuc"];
$luotxem=$_POST["luotxem"];
$congbo=$_POST["congbo"];
$noibac=$_POST["noibac"];
$noibactrangchu=$_POST["noibactrangchu"];
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
if(substr($url,29,24)=='feature=player_embedded&'){$urlvi = str_replace("?feature=player_embedded&","?",$url);}else{$urlvi=$url;}
$kd= utf8tourl(utf8convert($tieude));
$tieudetach = str_replace("www.youtube.com/watch?v=","img.youtube.com/vi/",$urlvi);
$imgbg="$tieudetach"."/default.jpg";
date_default_timezone_set("asia/bangkok");
$ngay=date("Y-m-d");
if($server!='0'){
$urlsv="$server/$url";
  $hinhsv = "data/images/video/video_icon.png";
if($_FILES['upload']['name']==""){
		
		$sua=mysql_query("update `video_video` set `title`='$tieude',`video`='$urlsv',`imgbg`='$hinhsv',`category`='$chuyenmuc',`views`='$luotxem',`noibac`='$noibac',`congbo`='$congbo',`ngay`='$ngay',`linkvi`='$kd' where `id`='$id'"); 
	 echo "<script>alert('Sửa thành công');</script>";
 echo "<script>window.location='./?act=video'</script>";
		}else{ 
		 $dir = "data/images/video/";
		$types = array("image/gif","image/GIF","image/JPG","image/jpg","image/png","image/JPEG","image/jpeg","application/x-zip-compressed");     
     $tmp_name = $_FILES['upload']['tmp_name'];  
     $new_name = $_FILES['upload']['name'];
	 $duongdan="$dir"."$new_name";
	 $tam="../";            
     move_uploaded_file($tmp_name,$tam.$dir . $new_name);
 	$sua=mysql_query("update `video_video` set `title`='$tieude',`video`='$urlsv',`imgbg`='$duongdan',`category`='$chuyenmuc',`views`='$luotxem',`noibac`='$noibac',`congbo`='$congbo',`ngay`='$ngay',`linkvi`='$kd' where `id`='$id'"); 
	 echo "<script>alert('Sửa thành công');</script>";
 echo "<script>window.location='./?act=video'</script>";
}}else{


		if($_FILES['upload']['name']==""){
		
		$sua=mysql_query("update `video_video` set `title`='$tieude',`video`='$urlvi',`imgbg`='$imgbg',`category`='$chuyenmuc',`views`='$luotxem',`noibac`='$noibac',`congbo`='$congbo',`ngay`='$ngay',`linkvi`='$kd' where `id`='$id'"); 
	 echo "<script>alert('Sửa thành công');</script>";
 echo "<script>window.location='./?act=video'</script>";
		}else{ 
		 $dir = "data/images/video/";
		$types = array("image/gif","image/GIF","image/JPG","image/jpg","image/png","image/JPEG","image/jpeg","application/x-zip-compressed");     
     $tmp_name = $_FILES['upload']['tmp_name'];  
     $new_name = $_FILES['upload']['name'];
	 $duongdan="$dir"."$new_name";
	 $tam="../";            
     move_uploaded_file($tmp_name,$tam.$dir . $new_name);
 	$sua=mysql_query("update `video_video` set `title`='$tieude',`video`='$urlvi',`imgbg`='$duongdan',`category`='$chuyenmuc',`views`='$luotxem',`noibac`='$noibac',`congbo`='$congbo',`ngay`='$ngay',`linkvi`='$kd' where `id`='$id'"); 
	 echo "<script>alert('Sửa thành công');</script>";
 echo "<script>window.location='./?act=video'</script>";
}}
}
?>