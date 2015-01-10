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
							
			$mNews 				= new \MVC\Mapper\News();			
			$mConfig 			= new \MVC\Mapper\Config();		
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------									
			$Category = $mCategoryNews->findByKey($Key1);
			$CategoryNewsAll = $mCategoryNews->findAll();
			if (!isset($Category)) $Category = $CategoryNewsAll->current();
			$IdCategory = $Category->getId();
						
			$CategoryBTypeAll = $mCategoryBType->findByPart1();						
			if (!isset($Page)) $Page = 1;			
									
			$NewsAll = $mNews->findByCategoryPage(array($IdCategory, $Page, 16));
			$PN = new \MVC\Domain\PageNavigation($Category->getNews()->count(), 16, $Category->getURLRead());
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------												
			$request->setObject("CategoryCurrent", $Category);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);						
			$request->setObject("NewsAll", $NewsAll);													
			$request->setObject("PN", $PN);
			$request->setProperty("Page", $Page);	
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>