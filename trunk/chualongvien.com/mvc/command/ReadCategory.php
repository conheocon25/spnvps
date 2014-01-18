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
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Category = $mCategoryNews->findByKey($Key1);
			$CategoryNewsAll = $mCategoryNews->findAll();
			if (!isset($Category)) $Category = $CategoryNewsAll->current();
			$IdCategory = $Category->getId();
						
			$CategoryBTypeAll = $mCategoryBType->findByPart1();						
			if (!isset($Page)) $Page = 1;			
			
			$Title = mb_strtoupper("TIN TỨC / ".$Category->getName(), 'UTF8');
			
			$NewsAll = $mNews->findByCategoryPage(array($IdCategory, $Page, 16));
			$PN = new \MVC\Domain\PageNavigation($Category->getNews()->count(), 16, $Category->getURLRead());									
			$MonkAll = $mMonk->findVIP(null);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty("Title", $Title);
						
			$request->setObject("Category", $Category);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);						
			$request->setObject("NewsAll", $NewsAll);										
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("MonkAll", $MonkAll);
						
			$request->setObject("PN", $PN);			
			$request->setProperty("ActiveItem", 'ReadCategory');
			$request->setProperty("Page", $Page);	
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>
