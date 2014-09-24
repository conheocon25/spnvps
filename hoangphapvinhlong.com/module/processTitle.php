<?php switch ($_REQUEST['frame']){
											
	//--------------------------------------------------------------------------------------------	
	case "tintuchangngay":break;
	case "taivideo":break;
	case "giangsutatca":break;
	case "tainhac":break;
	case "giangsu":break;
		case "xl_upfile":break;
	case "quancaoct":break;
	
		case "upload":break;

	case "trangdownload":break;
	case "tintuchangngayct" 	   :break;
	case "video"         : 	break;
	case "videoplayergiam"         : 	break;
	case "videogiangsu"           :break;
	case "videogiangsugiam"           :break;
	case "videoplayer"            :break;
	case "gioithieu"     : break;
	case "datcauhoi"  	   :;break;
	case "thongbao"  	   : break;
	case "thongbaoct"          : break;
	case "danhbachua"        : break;
	case "tuthien"          :break;
	case "tuthienct"           :break;
	case "lienhe"      : break;	
	case "anhhoatdong"  : break;	
	case "sukien"  : break;	
	case "sukienct"  : break;	
	case "daotao"  : break;	
	case "daotaoct"  : break;	
	case "hoidap"  : break;	
	case "hoidapct"  : break;		
	case "dangky"  : break;	
	case "login_action"  : break;
	case "login_action2"  : break;
	case "dangxuat"  : break;
	case "traloicauhoi"  : break;	
	case "thaydoithongtincanhan"  : break;
	case "dangvideo"  : break;
	case "thayhinhdaidien"  : break;
	case "suavideodadang"  : break;	
	case "themgiangsu"  : break;	
	case "lienhemail"  : break;		
	case "danhbaplayer"  : break;
	case "audio"  : break;
	case "audiodanhsach"  : break;
	case "audiohat"  : break;
	
	case "nhacvideo"  : break;
	case "nhacvideodanhsach"  : break;
	case "nhacvideohat"  : break;
	case "newvideo"  : break;
	case "newvideoaudio"  : break;
	case "newvideovideo"  : break;
	case "topvideo"  : break;
	case "hienthitimkiem"  : break;
	case "download"  : break;
	
	case "sovangct"  : break;
	
	
	case "home"            : break;
	default                : $title = $_lang=="vn" ? "Sản phẩm mới" : "New product";break;

}
echo $title;
?>
