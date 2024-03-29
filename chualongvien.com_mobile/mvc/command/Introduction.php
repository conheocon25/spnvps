<?php
	namespace MVC\Command;	
	class Introduction extends Command {
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
			$mEvent 			= new \MVC\Mapper\Event();	
									
			$mConfig 			= new \MVC\Mapper\Config();		
			$mVM 				= new \MVC\Mapper\VideoMonk();
			$mVL 				= new \MVC\Mapper\VideoLibrary();		
			$mVideo				= new \MVC\Mapper\Video();		
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------															
			$Categories 		= $mCategoryNews->findAll();
			$CategoryBTypeAll 	= $mCategoryBType->findByPart1();
			$CategoryNewsAll 	= $mCategoryNews->findAll();
			$CategoryNewsAll 	= $mCategoryNews->findAll();
			$CategoryDocumentAll= $mCategoryDocument->findAll();						
			$EventAll 			= $mEvent->findAll();
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryDocumentAll", 	$CategoryDocumentAll);
			$request->setObject("Event", 				$EventAll->current());
			$request->setProperty("ActiveItem", 'Introduction');
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>