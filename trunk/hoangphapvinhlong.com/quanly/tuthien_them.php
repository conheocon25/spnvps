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
<table align="center" border="1" cellpadding="2" bordercolor="#C9C9C9" width="100%">
<form name="f1" action="?act=tuthien_them&lenh=do" method="post" enctype="multipart/form-data">
<tr><td>Tiêu đề : </td><td><textarea name="tieude" cols="100" rows=""></textarea></td></tr>
<tr><td>Shottext : </td><td><textarea name="shottext" cols="100" rows=""></textarea></td></tr>
<tr><td>Danh mục tin tức : </td><td><select name="giangsu"><?php 							
require '../config.php';
$sql="select*from tuthien_danhmuc";
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
<div id="div_vn_afc">

			<script type="text/javascript">
			var oFCKeditor = new FCKeditor('noidung');
			//tao ta mot textarea co name="luan" id="luan"
			oFCKeditor.BasePath = "fckeditor/";
			oFCKeditor.Width	= 770 ;
			oFCKeditor.Height	= 350 ;
			oFCKeditor.Config["EnterMode"]		= "br" ;
			oFCKeditor.Create();
			document.getElementById('xEnter').value = "br" ;
			//document.getElementById("luan").value="<img src='http://www.vnexpress.net/Files/Subject/3B/A1/35/82/1.jpg' border='0'>";
			//var k=document.getElementById("luan").value;
			//alert(k);
			</script>
		</div>
</td></tr>
<tr><td>Hình trích ngan : </td><td><input type="file" name="upload" /> </td></tr>
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
$shottext=$_POST["shottext"];
$giangsu=$_POST["giangsu"];
$congbo=$_POST["congbo"];
$noibac=$_POST["noibac"];
$noidung=$_POST["noidung"];
date_default_timezone_set("asia/bangkok");
$created=date("Y-m-d");
$created_by=$row["id"];
$hits=0;
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

    $them=mysql_query("insert into tuthien_ct(`title`,`img`,`published`,`fulltext`,`created`,`created_by`,`hits`,`idcategories`,`shottext`,`noibac`)VALUES('{$tieude}','{$duongdan}','{$congbo}','{$noidung}','{$created}','{$created_by}','{$hits}','{$giangsu}','{$shottext}','{$noibac}')"); 
 echo "<script>window.location='./?act=tuthien'</script>";
 
 
}
?>