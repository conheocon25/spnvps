<?php switch ($_REQUEST['act']){

	//Product_category------------------------------------------------------------------
	
	case "danhmuctintuc"    : include("danhmuctintuc.php");break;
	case "sidletrangchu"    : include("sidletrangchu.php");break;
	case "sidletrangchu_cs"    : include("sidletrangchu_cs.php");break;
	case "sidletrangchu_del"   : include("sidletrangchu_del.php");break;
	case "sidletrangchu_them"    : include("sidletrangchu_them.php");break;
	case "danhmuctintuc_cs"    : include("danhmuctintuc_cs.php");break;
	case "danhmuctintuc_del"    : include("danhmuctintuc_del.php");break;
	case "danhmuctintuc_them"    : include("danhmuctintuc_them.php");break;
		case "quancao"    : include("quancao.php");break;
		case "nhac_noibac"    : include("nhac_noibac.php");break;
	case "quancao_cs"    : include("quancao_cs.php");break;
	case "quancao_del"    : include("quancao_del.php");break;
	case "quancao_them"    : include("quancao_them.php");break;
	case "tintuc"  : include("tintuc.php");break;
	case "tintuc_cs"             : include("tintuc_cs.php");break;
	case "tintuc_them"           : include("tintuc_them.php");break;
	case "tintuc_del"         : include("tintuc_del.php");break;
	case "danhmucvideo"         : include("danhmucvideo.php");break;
	case "danhmucvideo_cs"         : include("danhmucvideo_cs.php");break;
	case "danhmucvideo_del"         : include("danhmucvideo_del.php");break;
	case "danhmucvideo_them"         : include("danhmucvideo_them.php");break;
	case "video"         : include("video.php");break;
	case "video_cs"         : include("video_cs.php");break;
	case "video_del"         : include("video_del.php");break;
	case "video_them"         : include("video_them.php");break;
	case "anhhoatdong"         : include("anhhoatdong.php");break;
	case "anhhoatdong_them"         : include("anhhoatdong_them.php");break;
	case "anhhoatdong_cs"         : include("anhhoatdong_cs.php");break;
	case "anhhoatdong_del"         : include("anhhoatdong_del.php");break;
	case "gioithieu"         : include("gioithieu.php");break;
	case "thongbao"         : include("thongbao.php");break;
	case "thongbao_them"         : include("thongbao_them.php");break;
	case "thongbao_cs"         : include("thongbao_cs.php");break;
	case "thongbao_del"         : include("thongbao_del.php");break;
	case "sukien"         : include("sukien.php");break;
	case "sukien_them"         : include("sukien_them.php");break;
	case "sukien_cs"         : include("sukien_cs.php");break;
	case "sukien_del"         : include("sukien_del.php");break;
	case "dangchuy"         : include("dangchuy.php");break;
	case "dangchuy_them"         : include("dangchuy_them.php");break;
	case "dangchuy_cs"         : include("dangchuy_cs.php");break;
	case "dangchuy_del"         : include("dangchuy_del.php");break;
	case "banner"         : include("banner.php");break;
	case "videonoibac"         : include("videonoibac.php");break;
	case "videonoibac_cs"         : include("videonoibac_cs.php");break;
	case "videonoibac_del"         : include("videonoibac_del.php");break;
	case "videonoibac_them"         : include("videonoibac_them.php");break;
	case "nghenhacphatgiao"         : include("nghenhacphatgiao.php");break;
	
	
	//mục home--- -----------------------------------------------------------------------	
	case "lienhe"       	  : include("lienhe.php");break;
	case "lienketweb"         : include("lienketweb.php");break;
	case "lienketweb_them"         : include("lienketweb_them.php");break;
	case "lienketweb_cs"         : include("lienketweb_cs.php");break;
	case "lienketweb_del"         : include("lienketweb_del.php");break;
	case "tuthien"         : include("tuthien.php");break;
	case "tuthien_them"         : include("tuthien_them.php");break;
	case "tuthien_cs"         : include("tuthien_cs.php");break;
	case "tuthien_del"         : include("tuthien_del.php");break;
	case "danhmuctuthien"         : include("danhmuctuthien.php");break;
	case "danhmuctuthien_them"         : include("danhmuctuthien_them.php");break;
	case "danhmuctuthien_cs"         : include("danhmuctuthien_cs.php");break;
	case "danhmuctuthien_del"         : include("danhmuctuthien_del.php");break;
	
	case "phanloai"         : include("phanloai.php");break;
	case "phanloai_cs"         : include("phanloai_cs.php");break;
	case "phanloai_del"         : include("phanloai_del.php");break;
	case "phanloai_them"         : include("phanloai_them.php");break;
	
	case "hoidap"         : include("hoidap.php");break;
	case "hoidap_cs"         : include("hoidap_cs.php");break;
	case "hoidap_del"         : include("hoidap_del.php");break;
	case "hoidap_them"         : include("hoidap_them.php");break;
	//-------------------------Advertise-------------------------------------------------
	case "doithongtin"          : include("doithongtin.php");break;
	case "traloihoidap"        : include("traloihoidap.php");break;	
	case "traloihoidap_cs"       : include("traloihoidap_cs.php");break;
	case "traloihoidap_del"     : include("traloihoidap_del.php");break;
	case "nguoidung"         : include("nguoidung.php");break;
	case "nguoidung_cs"       : include("nguoidung_cs.php");break;	
	case "nguoidung_del"      : include("nguoidung_del.php");break;
	case "videondccb"    : include("videondccb.php");break;	
	//-------------------------Support Online--------------------------------------------
	case "video_csndccb"          : include("video_csndccb.php");break;
	case "video_delndccb"        : include("video_delndccb.php");break;
	//-------------------------News------------------------------------------------------		
	case "videond"		      : include("videond.php");break;
	case "video_csnd"   	  : include("video_csnd.php");break;					
	//---------------------Member--------------------------------------------------------
	case "video_delnd"         : include("video_delnd.php");break;

case "danhsachchua"         : include("danhsachchua.php");break;
	case "danhsachchua_cs"         : include("danhsachchua_cs.php");break;
	case "danhsachchua_del"         : include("danhsachchua_del.php");break;
	case "danhsachchua_them"         : include("danhsachchua_them.php");break;
	case "videochua"         : include("videochua.php");break;
	case "videochua_cs"         : include("videochua_cs.php");break;
	case "videochua_del"         : include("videochua_del.php");break;
	case "videochua_them"         : include("videochua_them.php");break;
	
	//------------------------------------------------------------------------------------
	case "user"         : include("user.php");break;
	case "user_cs"       : include("user_cs.php");break;
	case "user_del"     : include("user_del.php");break;
	case "user_them"          : include("user_them.php");break;
	case "gopy"         : include("gopy.php");break;
	case "gopy_del"       : include("gopy_del.php");break;
	case "blvi"         : include("blvi.php");break;
	case "blvi_del"       : include("blvi_del.php");break;
	case "blau"         : include("blau.php");break;
	case "blau_del"       : include("blau_del.php");break;
	case "bltt"         : include("bltt.php");break;
	case "bltt_del"       : include("bltt_del.php");break;
	case "blvinhac"         : include("blvinhac.php");break;
	case "blvinhac_del"       : include("blvinhac_del.php");break;
	
	case "danhmucaudio"         : include("danhmucaudio.php");break;
	case "danhmucaudio_cs"       : include("danhmucaudio_cs.php");break;
	case "danhmucaudio_del"     : include("danhmucaudio_del.php");break;
	case "danhmucaudio_them"          : include("danhmucaudio_them.php");break;
	
	
	case "album"         : include("album.php");break;
	case "album_cs"       : include("album_cs.php");break;
	case "album_del"     : include("album_del.php");break;
	case "album_them"          : include("album_them.php");break;
	
		case "nhac"         : include("nhac.php");break;
	case "nhac_cs"       : include("nhac_cs.php");break;
	case "nhac_del"     : include("nhac_del.php");break;
	case "nhac_them"          : include("nhac_them.php");break;
	
	
	
	case "danhmucaudiovideo"         : include("danhmucaudiovideo.php");break;
	case "danhmucaudiovideo_cs"       : include("danhmucaudiovideo_cs.php");break;
	case "danhmucaudiovideo_del"     : include("danhmucaudiovideo_del.php");break;
	case "danhmucaudiovideo_them"          : include("danhmucaudiovideo_them.php");break;
	
	
	case "albumvideo"         : include("albumvideo.php");break;
	case "albumvideo_cs"       : include("albumvideo_cs.php");break;
	case "albumvideo_del"     : include("albumvideo_del.php");break;
	case "albumvideo_them"          : include("albumvideo_them.php");break;
	
		case "nhacvideo"         : include("nhacvideo.php");break;
	case "nhacvideo_cs"       : include("nhacvideo_cs.php");break;
	case "nhacvideo_del"     : include("nhacvideo_del.php");break;
	case "nhacvideo_them"          : include("nhacvideo_them.php");break;
	
	case "sovang"  : include("sovang.php");break;
	case "sovang_cs"             : include("sovang_cs.php");break;
	case "sovang_them"           : include("sovang_them.php");break;
	case "sovang_del"         : include("sovang_del.php");break;
	
	case "logout" :
		unset($_SESSION['log']);
		echo "<script>window.location='./?frame=home'</sc"."ript>";
		break;
	
	//--------------------------------------------------------------------------------------
	
	case "home"          : include("home.php");break;
	default              : include("nguoidung.php");break;
}
?>