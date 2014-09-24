<table border="1" bordercolor="#FFFFFF" style="border-collapse: collapse" width="100%" cellspacing="5" cellpadding="0">
	<tr>
		<td height="50" bgcolor="#0069A8" align="left" width="210">
			<a href="./"><font color="#FFFFFF"><span style="font-weight: 700">Control Panel</span></font></a><br>
			<a href="../index.php" target='_'><font color="#FFFFFF"><span style="font-weight: 700">Website</span></font></a>
		</td>
		<?php @session_start();
$log= $_SESSION["log"];
$quyen= $_SESSION["quyen"];
if($quyen==1){	
?>	
		<td bgcolor="#0069A8" width="200">
	
		
		<?php $arrMenu = array(
	array(
		'Danh mục hỏi đáp / Đăng ký',
		'Các câu hỏi_$_./?act=hoidap',
		'Các tài khoảng đăng ký_$_./?act=nguoidung',
		
		
	),
);

for($i=0;$i<count($arrMenu);$i++){?>
<table border="1" bordercolor="#0069A8" style="border-collapse: collapse" width="210" cellpadding="0">
	<tr>
		<td width="161" height="20" bgcolor="#0069A8" class="title2">
			&nbsp;<font style="font-weight: 700" color="#FFFFFF"><?php echo $arrMenu[$i][0]?></font>
		</td>
	</tr>
	<?php for($j=1;$j<count($arrMenu[$i]);$j++){
		$arr = explode('_$_',$arrMenu[$i][$j]);
	?>
	<tr>
		<td width="161" height="25" class="normalfont" style="border-bottom-color:#CCCCCC">
			<?php if(substr($arr[1],7)!=$_REQUEST['act']){?>
				&nbsp;&nbsp;&nbsp;<a href="<?php echo $arr[1]?>"><?php echo $arr[0]?></a>
			<?php }else{?>
				&nbsp;&nbsp;&nbsp;<a href="<?php echo $arr[1]?>"><font color="#CC0000"><?php echo $arr[0]?></font></a>
			<?php }?>
		</td>
	
	<?php }?></tr>
</table>
<?php }?>






</td>

<td bgcolor="#0069A8" width="200">
		
		
		<?php $arrMenu = array(
	array(
		'Danh mục đăng video',
		'Các video đã xét duyệt_$_./?act=videond',
		'Các video chưa xét duyệt_$_./?act=videondccb',
		
		
	),
);

for($i=0;$i<count($arrMenu);$i++){?>
<table border="1" bordercolor="#0069A8" style="border-collapse: collapse" width="210" cellpadding="0">
	<tr>
		<td width="161" height="20" bgcolor="#0069A8" class="title2">
			&nbsp;<font style="font-weight: 700" color="#FFFFFF"><?php echo $arrMenu[$i][0]?></font>
		</td>
	</tr>
	<?php for($j=1;$j<count($arrMenu[$i]);$j++){
		$arr = explode('_$_',$arrMenu[$i][$j]);
	?>
	<tr>
		<td width="161" height="25" class="normalfont" style="border-bottom-color:#CCCCCC">
			<?php if(substr($arr[1],7)!=$_REQUEST['act']){?>
				&nbsp;&nbsp;&nbsp;<a href="<?php echo $arr[1]?>"><?php echo $arr[0]?></a>
			<?php }else{?>
				&nbsp;&nbsp;&nbsp;<a href="<?php echo $arr[1]?>"><font color="#CC0000"><?php echo $arr[0]?></font></a>
			<?php }?>
		</td>
	
	<?php }?></tr>
</table>
<?php }?>






</td>



<td bgcolor="#0069A8">
		
		
		<?php $arrMenu = array(
	array(
		'Danh mục danh bạ chùa',
		'Các danh bạ chùa_$_./?act=danhsachchua',
		'Các video hoạt động_$_./?act=videochua',
		
		
	),
);

for($i=0;$i<count($arrMenu);$i++){?>
<table border="1" bordercolor="#0069A8" style="border-collapse: collapse" width="210" cellpadding="0">
	<tr>
		<td width="161" height="20" bgcolor="#0069A8" class="title2">
			&nbsp;<font style="font-weight: 700" color="#FFFFFF"><?php echo $arrMenu[$i][0]?></font>
		</td>
	</tr>
	<?php for($j=1;$j<count($arrMenu[$i]);$j++){
		$arr = explode('_$_',$arrMenu[$i][$j]);
	?>
	<tr>
		<td width="161" height="25" class="normalfont" style="border-bottom-color:#CCCCCC">
			<?php if(substr($arr[1],7)!=$_REQUEST['act']){?>
				&nbsp;&nbsp;&nbsp;<a href="<?php echo $arr[1]?>"><?php echo $arr[0]?></a>
			<?php }else{?>
				&nbsp;&nbsp;&nbsp;<a href="<?php echo $arr[1]?>"><font color="#CC0000"><?php echo $arr[0]?></font></a>
			<?php }?>
		</td>
	
	<?php }?></tr>
</table>
<?php }?>






</td>
<?php }else{} ?>
	</tr>
	<tr><td height="2"></td></tr>
</table>
