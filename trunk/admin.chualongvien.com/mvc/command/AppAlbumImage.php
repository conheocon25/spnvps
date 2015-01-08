<?php
	namespace MVC\Command;	
	class AppAlbumImage extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdAlbum = $request->getProperty('IdAlbum');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mAlbum 	= new \MVC\Mapper\Album();
			$mConfig 	= new \MVC\Mapper\Config();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$Album 			= $mAlbum->find($IdAlbum);
															
			$Title = "CHI TIẾT";
			$Navigation = array(array("ALBUM"	, "/app/album"));
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------																					
			$request->setObject('Album', $Album);
			$request->setProperty('Title', $Title);
			$request->setObject('Navigation', $Navigation);
			$request->setProperty("ActiveAdmin", 'Album');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>