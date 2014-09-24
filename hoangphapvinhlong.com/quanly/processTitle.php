<?php switch ($_REQUEST['act']){
	//-------------------------------------------------------------------------------------------
	case "danhmuctintuc"   : $title = 'Danh mục tin tức';break;
	case "sidletrangchu_cs"   : $title = 'Danh mục sidle trang chủ';break;
	case "sidletrangchu_them"   : $title = 'Danh mục sidle trang chủ';break;
	case "sidletrangchu_del"   : $title = 'Danh mục sidle trang chủ';break;
	case "sidletrangchu"   : $title = 'Danh mục sidle trang chủ';break;
	case "nhac_noibac"   : $title = 'Hieu chinh';break;
	case "danhmuctintuc_cs"   : $title = 'Danh mục tin tức';break;
	case "danhmuctintuc_del"   : $title = 'Danh mục tin tức';break;
	case "danhmuctintuc_them"   : $title = 'Danh mục tin tức';break;
	case "quancao"   : $title = 'Danh mục quang caó';break;
	case "quancao_cs"   : $title = 'Danh mục quang cao';break;
	case "quancao_del"   : $title = 'Danh mục quang cao';break;
	case "quancao_them"   : $title = 'Danh mục quang cao';break;
	case "tintuc" : $title = 'Cập nhật tin tức';break;
	case "tintuc_cs"  		  : $title = 'Hiệu chỉnh / Cập nhật : Tin tức';break;
	case "tintuc_them" 		  : $title = 'Hiệu chỉnh / Cập nhật : Tin tức';break;	
	case "tintuc_del" 		  : $title = 'Xóa Sản phẩm';break;
	case "danhmucvideo"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "danhmucvideo_cs"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "danhmucvideo_del"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "videondccb"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "video_csndccb"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "video_delndccb"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "danhmucvideo_them"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "video"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "video_cs"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "video_del"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "videond"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "video_csnd"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "video_delnd"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "video_them"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "anhhoatdong"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "anhhoatdong_them"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "anhhoatdong_cs"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "anhhoatdong_del"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "gioithieu"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "thongbao"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "thongbao_them"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "thongbao_cs"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "thongbao_del"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "sukien"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "sukien_them"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "sukien_cs"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "sukien_del"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "dangchuy"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "dangchuy_them"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "dangchuy_cs"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "dangchuy_del"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "banner"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "videonoibac"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "videonoibac_cs"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "videonoibac_them"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "videonoibac_del"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "nghenhacphatgiao"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	
	//-------------------------------------Content----------------------------------------------
	case "lienhe"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "lienketweb"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "lienketweb_them"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "lienketweb_cs"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "lienketweb_del"	  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "tuthien" : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "tuthien_cs"  		  : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "tuthien_them" 		  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "tuthien_del" 		  : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "danhmuctuthien" : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "danhmuctuthien_cs"  		  : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "danhmuctuthien_them" 		  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "danhmuctuthien_del" 		  : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "phanloai" : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "phanloai_cs"  		  : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "phanloai_them" 		  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "phanloai_del" 		  : $title = 'Hiệu chỉnh / Cập nhật';break;
	
	case "hoidap" : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "hoidap_cs"  		  : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "hoidap_them" 		  : $title = 'Hiệu chỉnh / Cập nhật';break;	
	case "hoidap_del" 		  : $title = 'Hiệu chỉnh / Cập nhật';break;
	//-------------------------Tin tức & Sự kiện-------------------------------------------------
	case "doithongtin"               : $title = 'Đổi thông tin';break;
	case "traloihoidap"             : $title = 'Hiệu chỉnh / Cập nhật';break;
	//-------------------------------------------------------------------------------------------	
	case "traloihoidap_cs"           : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "traloihoidap_del"         : $title = 'Hiệu chỉnh / Cập nhật';break;
	//---------------------------Hỗ trợ trực tuyến-----------------------------------------------
	case "nguoidung"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "nguoidung_cs"            : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "nguoidung_del"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	
		case "danhsachchua"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "danhsachchua_cs"            : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "danhsachchua_del"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "danhsachchua_del"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	
	case "videochua"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "videochua_cs"            : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "videochua_del"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "videochua_them"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	
	case "user"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "user_cs"            : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "user_del"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "user_them"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	
	case "danhmucaudio"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "danhmucaudio_cs"            : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "danhmucaudio_del"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "danhmucaudio_them"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	
	
	case "album"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "album_cs"            : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "album_del"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "album_them"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	
	
	case "nhac"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "nhac_cs"            : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "nhac_del"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "nhac_them"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	
	
	case "danhmucaudiovideo"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "danhmucaudiovideo_cs"            : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "danhmucaudiovideo_del"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "danhmucaudiovideo_them"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	
	
	case "albumvideo"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "albumvideo_cs"            : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "albumvideo_del"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "albumvideo_them"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	
	
	case "nhacvideo"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "nhacvideo_cs"            : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "nhacvideo_del"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "nhacvideo_them"              : $title = 'Hiệu chỉnh / Cập nhật';break;
	case "sovang" : $title = 'Cập nhật tin tức';break;
	
	case "sovang_cs"  		  : $title = 'Hiệu chỉnh / Cập nhật : Tin tức';break;
	case "sovang_them" 		  : $title = 'Hiệu chỉnh / Cập nhật : Tin tức';break;	
	case "sovang_del" 		  : $title = 'Xóa Sản phẩm';break;
	case "gopy_del" 		  : $title = 'Xóa Sản phẩm';break;
	case "gopy" : $title = 'Cập nhật tin tức';break;
	
	case "blvi_del" 		  : $title = 'Xóa Sản phẩm';break;
	case "blvi" : $title = 'Cập nhật tin tức';break;
	case "blau_del" 		  : $title = 'Xóa Sản phẩm';break;
	case "blau" : $title = 'Cập nhật tin tức';break;
	case "bltt_del" 		  : $title = 'Xóa Sản phẩm';break;
	case "bltt" : $title = 'Cập nhật tin tức';break;
	case "blvinhac_del" 		  : $title = 'Xóa Sản phẩm';break;
	case "blvinhac" : $title = 'Cập nhật tin tức';break;
	
	
	
	//-----------------------------------------------------------------------------------------------
	default                   : $title = 'Trang Quản Lý';break;
}
echo $title;
?>