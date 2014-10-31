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
			$mCategoryDocument 	= new \MVC\Mapper\CategoryDocument();
			
			$mAlbum 			= new \MVC\Mapper\Album();	
									
			$mConfig 			= new \MVC\Mapper\Config();
			$mVM 				= new \MVC\Mapper\VideoMonk();
			$mVL 				= new \MVC\Mapper\VideoLibrary();		
			$mVideo				= new \MVC\Mapper\Video();
			$mVB				= new \MVC\Mapper\VoiceBook();
			$mPPost				= new \MVC\Mapper\PPost();
			$mPVideo			= new \MVC\Mapper\PVideo();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Title = "WEBSITE CHÙA LONG VIỄN";
												
			$LocalVideoAll 		= $mVL->findByTopLocal(array(2));
			$TopLibraryVideoAll = $mVL->findByTopLibrary(array());
			$TopHistoryVideoAll = $mVL->findByTopHistory(array());
			
			$TopLibraryBookAll 	= $mVB->findByTopLibrary(array());
			$TopHistoryBookAll 	= $mVB->findByTopHistory(array());
			$TopLocalBookAll 	= $mVB->findByTopLocal(array());
			$TopCategoryBookAll = $mVB->findByTopCategory(array());
			
			$AlbumAll 			= $mAlbum->findAll();
			$Categories 		= $mCategoryNews->findAll();
			$CategoryNewsAll 	= $mCategoryNews->findAll();			
			$CategoryBTypeAll 	= $mCategoryBType->findByPart1();
			$CategoryVideo 		= $mCategoryVideo->findAll()->current();
			
			$CategoryDocumentAll= $mCategoryDocument->findAll();
			
			$PPostAll 			= $mPPost->findByTop6(array());
			$PVideoAll 			= $mPVideo->findByTop8(array());
																														
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty("Title", $Title);
			
			$request->setObject("LocalVideoAll", 		$LocalVideoAll);			
			$request->setObject("TopLibraryVideoAll", 	$TopLibraryVideoAll);
			$request->setObject("TopHistoryVideoAll", 	$TopHistoryVideoAll);
			
			$request->setObject("TopHistoryBookAll", 	$TopHistoryBookAll);
			$request->setObject("TopLibraryBookAll", 	$TopLibraryBookAll);
			$request->setObject("TopLocalBookAll", 		$TopLocalBookAll);
			$request->setObject("TopCategoryBookAll", 	$TopCategoryBookAll);
			
			$request->setObject("CategoryBTypeAll", 	$CategoryBTypeAll);			
			$request->setObject("CategoryDocumentAll", 	$CategoryDocumentAll);
			$request->setObject("CategoryVideo", 		$CategoryVideo);
			$request->setObject("CategoryNewsAll", 		$CategoryNewsAll);			
			$request->setObject("AlbumAll", 			$AlbumAll);						
			
			$request->setObject("PPostAll", 			$PPostAll);
			$request->setObject("PVideoAll", 			$PVideoAll);
			
			$request->setProperty("ActiveItem", 'Home');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>