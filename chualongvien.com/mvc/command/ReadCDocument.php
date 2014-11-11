<?php
	namespace MVC\Command;	
	class ReadCDocument extends Command {
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
			$mDocument 			= new \MVC\Mapper\Document();
				
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
			$CategoryNewsAll = $mCategoryNews->findAll();
			
			$Category = $mCategoryDocument->findByKey($Key1);
			$CategoryDocumentAll = $mCategoryDocument->findAll();
			
			if (!isset($Category)) $Category = $CategoryDocumentAll->current();
			$IdCategory = $Category->getId();
						
			$CategoryBTypeAll = $mCategoryBType->findByPart1();						
			if (!isset($Page)) $Page = 1;			
			
			$Title = mb_strtoupper("VĂN BẢN / ".$Category->getName(), 'UTF8');
			
			$DocumentAll = $mDocument->findByPage(array($IdCategory, $Page, 10));
			$PN = new \MVC\Domain\PageNavigation($Category->getDocumentAll()->count(), 10, $Category->getURLRead());
			$EventAll 			= $mEvent->findAll();			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setProperty("Title", $Title);
						
			$request->setObject("Category", $Category);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryDocumentAll", $CategoryDocumentAll);			
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			
			$request->setObject("DocumentAll", $DocumentAll);
			$request->setObject("Event", 				$EventAll->current());
									
			$request->setObject("PN", $PN);
			$request->setProperty("ActiveItem", 'ReadCDocument');
			$request->setProperty("Page", $Page);	
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>
