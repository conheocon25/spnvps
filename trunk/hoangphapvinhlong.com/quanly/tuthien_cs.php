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
 $dulieu_sua="select * from  tuthien_ct where id = '$a'";
	$query_dulieu_sua=mysql_query($dulieu_sua);
	$row_dulieu_sua=mysql_fetch_array($query_dulieu_sua);
	$a3="$row_dulieu_sua[fulltext]"; 
	$noibac="$row_dulieu_sua[noibac]"; 
	$title="$row_dulieu_sua[title]"; 
	$img="$row_dulieu_sua[img]";
	$published="$row_dulieu_sua[published]"; 
	$created="$row_dulieu_sua[created]"; 
	$created_by="$row_dulieu_sua[created_by]"; 
	$hits="$row_dulieu_sua[hits]"; 
	$idcategories="$row_dulieu_sua[idcategories]"; 
	$shottext="$row_dulieu_sua[shottext]"; 
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
<form name="f1" action="?act=tuthien_cs&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Tiêu đề : </td><td><textarea name="tieude" cols="100" rows=""><?php echo $title ?></textarea></td></tr>
<tr><td>Shottext : </td><td><textarea name="shottext" cols="100" rows=""><?php echo $shottext ?></textarea></td></tr>
<tr><td>Danh mục tin tức : </td><td><select name="giangsu"><?php 							
require '../config.php';
$sql="select*from tuthien_danhmuc where id =$idcategories";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $id=$row["id"];
                                                  $name=$row["name"];
												  
												   ?>
						<option value="<?php echo $id ?>"><?php echo $name ?></option>
						<?php }}
						$sql="select*from tuthien_danhmuc where id!=$idcategories";
$kq=mysql_query($sql);
                                            if(mysql_num_rows($kq)!=0)
                                            {
                                                while($row=mysql_fetch_array($kq))
                                                {
                                                  $id=$row["id"];
                                                  $name=$row["name"];
												  
												   ?>
						<option value="<?php echo $id ?>"><?php echo $name ?></option>
						<?php }} ?>
						
						
						
						</select>
</td></tr>
<tr><td>Nội dung : </td><td><?php
echo "<div id=\"div_vn_afc\">";
			khung_nhap_nhieu_sua_sanpham_menu_ngang("noidung",$a3);
		echo "</div>";?>
</td></tr>
<tr><td>Hình trích ngan : </td><td><input type="file" name="upload" />
<input type="hidden" name="ten_anh" value="<?php echo $img ?>">
<input type="hidden" name="id" value="<?php echo $a ;?>">
<img src="../<?php echo $img ?>" width="130px" height="100px"></td></tr>
<tr><td>Công bố : </td><td><select name="congbo"><option value="1">Có</option><option value="0">Không</option></select></td></tr>
<tr><td>Nổi bậc : </td><td><select name="noibac"><option value="0">Không</option><option value="1">Có</option></select></td></tr>
 <tr><td></td><td><input name="submit" type="submit" value="Th&ecirc;m" /></td></tr>

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
$shottext=$_POST["shottext"];
$ten_anh=$_POST["ten_anh"];
$giangsu=$_POST["giangsu"];
$congbo=$_POST["congbo"];
$noibac=$_POST["noibac"];
$noidung=$_POST["noidung"];
date_default_timezone_set("asia/bangkok");
$created=date("Y-m-d");
$created_by=$row["id"];
$hits=0;
if($_FILES['upload']['tmp_name']==""){
    $them=mysql_query("update `tuthien_ct` set `title`='$tieude',`img`='$ten_anh',`published`='$congbo',`fulltext`='$noidung',`created`='$created',`created_by`='$created_by',`hits`='$hits',`idcategories`='$giangsu',`shottext`='$shottext',`noibac`='$noibac' where `id`='$id'"); 
	echo "<script>alert('Sửa tin thành công);</script>";
 echo "<script>window.location='./?act=tuthien'</script>";}else{
$dir = "data/images/tuthien/"; //Bạn nên thay đổi đường dẫn cho phù hợp 
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

    $them=mysql_query("update tuthien_ct set `title`='$tieude',`img`='$duongdan',`published`='$congbo',`fulltext`='$noidung',`created`='$created',`created_by`='$created_by',`hits`='$hits',`idcategories`='$giangsu',`shottext`='$shottext',`noibac`='$noibac' where id='$id'"); 
 echo "<script>window.location='./?act=tuthien'</script>";}
 
 
}
?>