<?php
	namespace MVC\Command;	
	class Event extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$EventKey = $request->getProperty('EventKey');
						
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
			$EventAll		= $mEvent->findAll();
			if (!isset($EventKey))
				$Event = $EventAll->current();
			else
				$Event = $mEvent->findByKey($EventKey);
						
			$CategoryNewsAll 		= $mCategoryNews->findAll();							
			$CategoryBTypeAll 		= $mCategoryBType->findByPart1();
			$CategoryDocumentAll 	= $mCategoryDocument->findAll();
			$Title = "SỰ KIỆN";
											
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty("Title", $Title);
									
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);									
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryDocumentAll", 	$CategoryDocumentAll);
			
			$request->setObject("Event", 	$Event);
			$request->setObject("EventAll", $EventAll);
			
			$request->setProperty("ActiveItem", 'ReadCategory');
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>
