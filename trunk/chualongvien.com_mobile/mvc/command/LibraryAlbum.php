<?php
	namespace MVC\Command;	
	class LibraryAlbum extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$KAlbum = $request->getProperty('KAlbum');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mAlbum 			= new \MVC\Mapper\Album();										
			$mConfig 			= new \MVC\Mapper\Config();		
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$AlbumAll = $mAlbum->findAll();
																		
			if (!isset($KAlbum)){
				$Album = $AlbumAll->current();
			}else{
				$Album = $mAlbum->findByKey($KAlbum);
			}			
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setProperty("URLJSON"			, $Album->getURLJSON());
			$request->setObject("AlbumCurrent"		, $Album);
			$request->setObject("AlbumAll"			, $AlbumAll);			
									
			return self::statuses('CMD_DEFAULT');
		}
	}
?>