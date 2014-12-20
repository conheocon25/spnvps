<?php
	namespace MVC\Command;	
	class ReadCategory extends Command {
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
			$Page = $request->getProperty('Page');
						
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
			$CategoryDocumentAll= $mCategoryDocument->findAll();
			$Category = $mCategoryNews->findByKey($Key1);
			$CategoryNewsAll = $mCategoryNews->findAll();
			if (!isset($Category)) $Category = $CategoryNewsAll->current();
			$IdCategory = $Category->getId();
						
			$CategoryBTypeAll = $mCategoryBType->findByPart1();						
			if (!isset($Page)) $Page = 1;			
			
			$Title = mb_strtoupper("TIN TỨC / ".$Category->getName(), 'UTF8');
			
			$NewsAll = $mNews->findByCategoryPage(array($IdCategory, $Page, 16));
			$PN = new \MVC\Domain\PageNavigation($Category->getNews()->count(), 16, $Category->getURLRead());									
			$EventAll 			= $mEvent->findAll();			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty("Title", $Title);
						
			$request->setObject("Category", $Category);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);						
			$request->setObject("NewsAll", $NewsAll);										
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryDocumentAll", 	$CategoryDocumentAll);							
			$request->setObject("PN", $PN);			
			$request->setProperty("ActiveItem", 'ReadCategory');
			$request->setObject("Event", 				$EventAll->current());
			$request->setProperty("Page", $Page);	
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>
