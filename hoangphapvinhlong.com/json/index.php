<?php @session_start();
$user= $_SESSION["log"];if(isset($user)){
?><form name="f1" method="post" action="index.php?lenh=do" enctype="multipart/form-data"><textarea name="nd" cols="150" rows="30">
<?php $f=fopen("events.json.php","r");
while($l=fgets($f))
{
	
?>
<?php echo $l;?>

<?php } ?>
</textarea><input name="submit" type="submit" value="Cap nhat" />
</form>

<?php
if ( $_GET['lenh'] == "do" ){
$ndg=$_POST["nd"];
$nd = str_replace("\n","",$ndg);
$path="events.json.php";
$file=fopen($path,"w");
fwrite($file,$nd);
 echo "<script>window.location='index.php'</script>";
}
?>
<?php }else{echo "Vui long dang nhap vao trang quan tri";}