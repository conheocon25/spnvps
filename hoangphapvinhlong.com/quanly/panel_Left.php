<?php @session_start();
$log= $_SESSION["log"];
$quyen= $_SESSION["quyen"];
if($quyen==1){	
?>
<?php $arrMenu = array(
	array(
		'Danh mục tin tức',
		'Danh mục chuyên mục_$_./?act=danhmuctintuc',
		'Tin tức_$_./?act=tintuc',
		
		),	
	array(
		'Giảng sư / chuyên đề',
		'Phân Loại_$_./?act=phanloai',		
		'Danh mục CĐ/GS_$_./?act=danhmucvideo',												
		'Video_$_./?act=video',
	),		
	array(
		'Danh mục riêng',	
		'Giới thiệu_$_./?act=gioithieu',
		'Sidle trang chủ_$_./?act=sidletrangchu',
		'Banner_$_./?act=banner',
		'Thông báo_$_./?act=thongbao',
		'Sự kiện_$_./?act=sukien',	
		'Ảnh hoạt động_$_./?act=anhhoatdong',
		'Đáng chú ý_$_./?act=dangchuy',
		'Video Nổi Bậc_$_./?act=videonoibac',
		'Nghe nhạc phật_$_./?act=nghenhacphatgiao',
		'Liên hệ_$_./?act=lienhe',
		'Liên kết web_$_./?act=lienketweb',
		'Ủng hộ website_$_./?act=sovang',	
		'Góp ý_$_./?act=gopy',	
		'Quảng cáo_$_./?act=quancao',	
		'Bình luận video_$_./?act=blvi',	
		'Bình luận audio_$_./?act=blau',
		'Bình luận nhạc video_$_./?act=blvinhac',	
		'Bình luận tin tức_$_./?act=bltt',		
		
	),	
	array(
		'Từ thiện',
		'Danh mục_$_./?act=danhmuctuthien',
		'Từ thiện_$_./?act=tuthien',
	
	),	
	array(
		'Nghe nhạc',
		'Danh mục_$_./?act=danhmucaudio',
		'Album_$_./?act=album',
		'Bài hát_$_./?act=nhac',
	
	),	
	array(
		'Nghe nhạc video',
		'Danh mục_$_./?act=danhmucaudiovideo',
		'Album_$_./?act=albumvideo',
		'Bài hát_$_./?act=nhacvideo',
	
	),			
	array(
		'Hệ thống',
		'Đổi thông tin_$_./?act=doithongtin',
		'Users_$_./?act=user',
		'Thoát_$_./?act=logout',
	),
);
}else{
$arrMenu = array(
	array(
		'Danh mục tin tức',
		'Danh mục chuyên mục_$_./?act=danhmuctintuc',
		'Tin tức_$_./?act=tintuc',
		
		),	
	array(
		'Giảng sư / chuyên đề',		
		'Danh mục CĐ/GS_$_./?act=danhmucvideo',												
		'Video_$_./?act=video',
	),		
	array(
		'Danh mục riêng',	
		'Thông báo_$_./?act=thongbao',
		'Sự kiện_$_./?act=sukien',	
		'Ảnh hoạt động_$_./?act=anhhoatdong',
		'Đáng chú ý_$_./?act=dangchuy',
		'Video Nổi Bậc_$_./?act=videonoibac',
		'Liên kết web_$_./?act=lienketweb',
			
		
	),	
	array(
		'Từ thiện',
		'Danh mục_$_./?act=danhmuctuthien',
		'Từ thiện_$_./?act=tuthien',
		
	
	),			
	array(
	'Hệ thống',
		'Thoát_$_./?act=logout',
	),
);







}
for($i=0;$i<count($arrMenu);$i++){?>
<table border="1" bordercolor="#0069A8" style="border-collapse: collapse" width="210" cellpadding="0">
	<tr>
		<td width="161" height="20" bgcolor="#0069A8" class="title">
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
	</tr>
	<?php }?>
</table>
<?php }?>