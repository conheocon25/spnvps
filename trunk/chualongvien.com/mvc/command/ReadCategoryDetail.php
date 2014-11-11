<?php
	namespace MVC\Command;	
	class ReadCategoryDetail extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$Key1 = $request->getProperty('Key1');
			$Key2 = $request->getProperty('Key2');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mCategoryBType 	= new \MVC\Mapper\CategoryBType();
			$mCategoryNews 		= new \MVC\Mapper\CategoryNews();
			$mCategoryVideo 	= new \MVC\Mapper\CategoryVideo();
			$mCategoryDocument 	= new \MVC\Mapper\CategoryDocument();
			
			$mAlbum 			= new \MVC\Mapper\Album();				
			$mNews 				= new \MVC\Mapper\News();
			$mEvent 			= new \MVC\Mapper\Event();	
						
			$mConfig 			= new \MVC\Mapper\Config();		
			$mVM 				= new \MVC\Mapper\VideoMonk();
			$mVL 				= new \MVC\Mapper\VideoLibrary();		
			$mVideo				= new \MVC\Mapper\Video();		
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$News 				= $mNews->findByKey($Key2);
			
			$CategoryNewsAll 	= $mCategoryNews->findAll();						
			$CategoryBTypeAll 	= $mCategoryBType->findByPart1();
						
			$Title = mb_strtoupper( $News->getTitle(), 'UTF8');
			$CategoryDocumentAll= $mCategoryDocument->findAll();			
			$EventAll 			= $mEvent->findAll();
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty("Title", $Title);			
			$request->setObject("Category", $News->getCategory());			
			$request->setProperty("ActiveItem", 'ReadCategory');
			$request->setObject("CategoryDocumentAll", 	$CategoryDocumentAll);
			
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);						
			$request->setObject("News", $News);						
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			
			$request->setObject("Event", 				$EventAll->current());
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>
