<?php
	namespace MVC\Command;	
	class Home extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mCategoryBType 	= new \MVC\Mapper\CategoryBType();
			$mCategoryNews 		= new \MVC\Mapper\CategoryNews();
			$mCategoryVideo 	= new \MVC\Mapper\CategoryVideo();
				
			$mAlbum 			= new \MVC\Mapper\Album();	
			$mMonk 				= new \MVC\Mapper\Monk();
						
			$mConfig 			= new \MVC\Mapper\Config();
			$mVM 				= new \MVC\Mapper\VideoMonk();
			$mVL 				= new \MVC\Mapper\VideoLibrary();		
			$mVideo				= new \MVC\Mapper\Video();		
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Title = "WEBSITE CHÙA LONG VIỄN";
									
			$TopCategoryVideoAll= $mVL->findByUpdateTop(array(2));
			$LocalVideoAll 		= $mVL->findByTopLocal(array(2));
			$TopLibraryVideoAll = $mVL->findByTopLibrary(array());
			$TopHistoryVideoAll = $mVL->findByTopHistory(array());
			
			$AlbumAll 			= $mAlbum->findAll();
			$Categories 		= $mCategoryNews->findAll();
			$CategoryNewsAll 	= $mCategoryNews->findAll();			
			$CategoryBTypeAll 	= $mCategoryBType->findByPart1();
			$CategoryVideo 		= $mCategoryVideo->findAll()->current();						
			$MonkAll 			= $mMonk->findVIP(null);
																					
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty("Title", $Title);
			
			$request->setObject("LocalVideoAll", 		$LocalVideoAll);
			$request->setObject("TopCategoryVideoAll", 	$TopCategoryVideoAll);
			$request->setObject("TopLibraryVideoAll", 	$TopLibraryVideoAll);
			$request->setObject("TopHistoryVideoAll", 	$TopHistoryVideoAll);
									
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);			
			$request->setObject("CategoryVideo", $CategoryVideo);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);			
			$request->setObject("AlbumAll", $AlbumAll);						
			$request->setObject("MonkAll", $MonkAll);

			$request->setProperty("ActiveItem", 'Home');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>