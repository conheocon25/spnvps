<?php
	namespace MVC\Command;	
	class LibraryVideoCategory extends Command {
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
			$IdBType = $request->getProperty('IdBType');
			$IdCategory = $request->getProperty('IdCategory');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------												
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryVideoAll = $mCategoryVideo->findAll();
			$MonkAll = $mMonk->findAll();
			$CategoryBType = $mCategoryBType->find($IdBType);
			$Category = $mCategoryVideo->find($IdCategory);
			$PagodaAll = $mPagoda->findAll();
			$SponsorAll = $mSponsor->findAll();
			$PanelNewsAll = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();
			
			if (!isset($Page)) $Page=1;
			$VLAll = $mVL->findByPage(array($IdCategory, $Page, 10));
			$PN = new \MVC\Domain\PageNavigation($Category->getVLs()->count(), 10, $Category->getURLRead());
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryVideoAll", $CategoryVideoAll);			
			$request->setObject("CategoryBType", $CategoryBType);			
			$request->setObject("MonkAll", $MonkAll);						
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('SponsorAll', $SponsorAll);
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
						
			$request->setObject("Category", $Category);
			$request->setObject("PN", $PN);
			$request->setObject("VLAll", $VLAll);
			$request->setProperty("Page", $Page);
			$request->setProperty("ActiveItem", 'LibraryVideo');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>