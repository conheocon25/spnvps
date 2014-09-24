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
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=video_them&lenh=do" method="post" enctype="multipart/form-data">
<tr>
  <td>Tiêu đề: </td>
  <td><textarea name="tieude" cols="100" rows=""></textarea></td></tr>
<tr>
  <td>Url Video : </td>
  <td><textarea name="url" cols="100" rows=""></textarea><br/> Chú ý: Ghi đường dẫn tuyệt đối trong thư mục chứa bài hát Video.</td>
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
  <td>Nổi bậc: </td>
  <td><select name="noibac"><option value='0'>Không</option><option value='1'>Có</option></select></td>
</tr>
<tr>
  <td>Công bố: </td>
  <td><select name="congbo"><option value='0'>Không</option><option value='1'>Có</option></select></td>
</tr>
<tr><td>Chỉnh sửa hình nền:</td><td><input type="file" name="upload" />
</td></tr>
 <tr><td></td><td><input name="submit" type="submit" value="Thêm mới" /></td></tr>

</form>
</table>
<?php
if ( $_GET['lenh'] == "do" )
{
$result =mysql_query("SELECT * FROM users where tennguoidung='$log'");
$row = mysql_fetch_array($result);
$tennguoidung=$row["tennguoidung"];
require '../config.php';
$tieude=$_POST["tieude"];
$url=$_POST["url"];
$chuyenmuc=$_POST["chuyenmuc"];
$noibactrangchu=$_POST["noibactrangchu"];
$luotxem=0;
$congbo=$_POST["congbo"];
$server=$_POST["server"];
$noibac=$_POST["noibac"];
if(substr($url,29,24)=='feature=player_embedded&'){$urlvi = str_replace("?feature=player_embedded&","?",$url);}else{$urlvi=$url;}
$tieudetach = str_replace("www.youtube.com/watch?v=","img.youtube.com/vi/",$urlvi);
$imgbg="$tieudetach"."/default.jpg";
date_default_timezone_set("asia/bangkok");
$ngay=date("Y-m-d");
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
if($server!='0'){
$urlsv="$server/$url";
  $hinhsv = "data/images/video/video_icon.png";
if($_FILES['upload']['name']==""){
		
		$them=mysql_query("insert into video_video(`title`,`video`,`imgbg`,`category`,`views`,`noibac`,`congbo`,`user`,`ngay`,`linkvi`)values('{$tieude}','{$urlsv}','{$hinhsv}','{$chuyenmuc}','{$luotxem}','{$noibac}','{$congbo}','{$tennguoidung}','{$ngay}','{$kd}')"); 
			 echo "<script>alert('Thêm thành công');</script>";
		 echo "<script>window.location='./?act=video'</script>";
		}else{ 
		 $dir = "data/images/video/";
		$types = array("image/gif","image/GIF","image/JPG","image/jpg","image/png","image/JPEG","image/jpeg","application/x-zip-compressed");     
     $tmp_name = $_FILES['upload']['tmp_name'];  
     $new_name = $_FILES['upload']['name'];
	 $duongdan="$dir"."$new_name";
	 $tam="../";            
     move_uploaded_file($tmp_name,$tam.$dir . $new_name);
 	 $them=mysql_query("insert into video_video(`title`,`video`,`imgbg`,`category`,`views`,`noibac`,`congbo`,`user`,`ngay`,`linkvi`)values('{$tieude}','{$urlsv}','{$duongdan}','{$chuyenmuc}','{$luotxem}','{$noibac}','{$congbo}','{$tennguoidung}','{$ngay}','{$kd}')"); 
	 echo "<script>alert('Thêm thành công');</script>";
 echo "<script>window.location='./?act=video'</script>";
}}else{


		if($_FILES['upload']['name']==""){
		
		$them=mysql_query("insert into video_video(`title`,`video`,`imgbg`,`category`,`views`,`noibac`,`congbo`,`user`,`ngay`,`linkvi`)values('{$tieude}','{$urlvi}','{$imgbg}','{$chuyenmuc}','{$luotxem}','{$noibac}','{$congbo}','{$tennguoidung}','{$ngay}','{$kd}')"); 
			 echo "<script>alert('Thêm thành công');</script>";
		 echo "<script>window.location='./?act=video'</script>";
		}else{ 
		 $dir = "data/images/video/";
		$types = array("image/gif","image/GIF","image/JPG","image/jpg","image/png","image/JPEG","image/jpeg","application/x-zip-compressed");     
     $tmp_name = $_FILES['upload']['tmp_name'];  
     $new_name = $_FILES['upload']['name'];
	 $duongdan="$dir"."$new_name";
	 $tam="../";            
     move_uploaded_file($tmp_name,$tam.$dir . $new_name);
 	 $them=mysql_query("insert into video_video(`title`,`video`,`imgbg`,`category`,`views`,`noibac`,`congbo`,`user`,`ngay`,`linkvi`)values('{$tieude}','{$urlvi}','{$duongdan}','{$chuyenmuc}','{$luotxem}','{$noibac}','{$congbo}','{$tennguoidung}','{$ngay}','{$kd}')"); 
	 echo "<script>alert('Thêm thành công');</script>";
 echo "<script>window.location='./?act=video'</script>";
}}}
?>