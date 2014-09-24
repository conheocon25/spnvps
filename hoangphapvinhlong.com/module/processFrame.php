<?php switch (addslashes($_REQUEST['frame'])){

	//----------------------Product-------------------------------------------------------------
	case "tintuc"			: include("module/tintuc.php");break;	
	case "taivideo"			: include("taivideo.php");break;
	case "giangsutatca"			: include("module/giangsutatca.php");break;	
	case "tainhac"			: include("tainhac.php");break;	
case "giangsu"			: include("module/giangsu.php");break;		
	case "newvideoaudio"			: include("module/newvideoaudio.php");break;
case "newvideovideo"			: include("module/newvideovideo.php");break;	
	case "upload"			: include("module/upload.php");break;		
	case "quancaoct"			: include("module/quancaoct.php");break;	
		case "trangdownload"			: include("module/trangdownload.php");break;		
	case "anhhoatdong"		: include("module/anhhoatdong.php");break;		
	case "lienhe"	: include("module/lienhe.php");break;		
	//---------------------- Content------------------------------------------------------------
	case "tintucct"          	: include("module/tintucct.php");break;
	case "video"			: include("module/video.php");break;	
	case "videogiangsu"          : include("module/videogiangsu.php");break;	
	case "videogiangsugiam"          : include("module/videogiangsugiam.php");break;	
	//----------------------News----------------------------------------------------------------
	case "videoplayer"             : include("module/videoplayer.php");break;
	case "videoplayergiam"             : include("module/videoplayergiam.php");break;
	case "gioithieu"      : include("module/gioithieu.php");break;	
		
	case "datcauhoi"           : include("module/datcauhoi.php");break;
	case "xl_upfile"           : include("module/xl_upfile.php");break;
	case "thongbao"         : include("module/thongbao.php");break;
	case "thongbaoct"            : include("module/thongbaoct.php");break;
	case "danhbachua"       : include("module/danhba.php");break;
	case "tuthien"         : include("module/tuthien.php");break;
	case "tuthienct"   : include("module/tuthienct.php");break;
	case "sukien"		        : include("module/sukien.php");break;
	case "sukienct"	        : include("module/sukienct.php");break;
	case "daotao"		        : include("module/daotao.php");break;
	case "daotaoct"	        : include("module/daotaoct.php");break;
	case "hoidap"		        : include("module/hoidap.php");break;
	case "hoidapct"	        : include("module/hoidapct.php");break;
	case "dangky"	        : include("module/dangky.php");break;
	case "login_action"	        : include("module/login_action.php");break;
	case "login_action2"	        : include("module/login_action2.php");break;
	case "dangxuat"	        : include("module/dangxuat.php");break;
	case "traloicauhoi"	        : include("module/traloicauhoi.php");break;
	case "thaydoithongtincanhan"	        : include("module/thaydoithongtincanhan.php");break;
	case "dangvideo"	        : include("module/dangvideo.php");break;
	case "thayhinhdaidien"	        : include("module/thayhinhdaidien.php");break;
	case "suavideodadang"	        : include("module/suavideodadang.php");break;
	case "themgiangsu"	        : include("module/themgiangsu.php");break;
	case "lienhemail"	        : include("module/lienhemail.php");break;
	case "phapamlongvien"	        : include("module/phapamlongvien.php");break;
	case "danhbaplayer"	        : include("module/danhbaplayer.php");break;
	case "audio"	        : include("module/audio.php");break;
	case "audiodanhsach"	        : include("module/audiodanhsach.php");break;
	case "audiohat"	        : include("module/audiohat.php");break;
	
	case "nhacvideo"	        : include("module/nhacvideo.php");break;
	case "nhacvideodanhsach"	        : include("module/nhacvideodanhsach.php");break;
	case "nhacvideohat"	        : include("module/nhacvideohat.php");break;
	case "newvideo"	        : include("module/newvideo.php");break;
	case "topvideo"	        : include("module/topvideo.php");break;
	case "hienthitimkiem"	        : include("module/hienthitimkiem.php");break;
	case "download"	        : include("data/images/audionhac/download.php");break;
	
	case "sovangct"	        : include("module/sovangct.php");break;
	
	
	
	case "forum"            : echo "<script>window.location='forum'</script>";break;
		
	case "home"             : include("module/home.php");break;
	default                 : include("module/home.php");break;

}
?>