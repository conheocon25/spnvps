<?php
	namespace MVC\Command;	
	class AppLibraryAlbum extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$Page = $request->getProperty('Page');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$AlbumAll 			= $mAlbum->findAll();
															
			$Title = "Hình Ảnh";
			$Navigation = array(
				array("Quản Lý", "/app")
			);
			
			if (!isset($Page)) $Page=1;			
			$Config = $mConfig->findByName("ROW_PER_PAGE");
			$AlbumAll1 = $mAlbum->findByPage(array($Page, $Config->getValue() ));
			$PN = new \MVC\Domain\PageNavigation($AlbumAll->count(), $Config->getValue(), "/app/album" );
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------																					
			$request->setObject('AlbumAll1', $AlbumAll1);
			$request->setObject('PN', $PN);
			$request->setObject('Navigation', $Navigation);
			$request->setProperty('Title', $Title);
			$request->setProperty('Page', $Page);
			$request->setProperty("ActiveAdmin", 'Album');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>