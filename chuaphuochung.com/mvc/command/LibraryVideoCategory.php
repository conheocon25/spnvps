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
			$IdBType = $request->getProperty('IdBType');
			$IdCategory = $request->getProperty('IdCategory');
			$Page = $request->getProperty('Page');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if (!isset($Page)) $Page=1;
			
			$SponsorAll = $mSponsor->findAll();
			$MonkAll = $mMonk->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();			
			$PagodaAll = $mPagoda->findAll();
			$PanelAdsAll = $mPanelAds->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$CategoryVideoAll = $mCategoryVideo->findAll();
			
			$CategoryBType = $mCategoryBType->find($IdBType);
			$Category = $mCategoryVideo->find($IdCategory);
			$VLAll = $mVideoLibrary->findByPage(array($IdCategory, $Page, 10));
			$PN = new \MVC\Domain\PageNavigation($Category->getVLs()->count(), 10, $Category->getURLRead());
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setObject("VLAll", $VLAll);
			$request->setObject("Category", $Category);
			$request->setObject("CategoryBType", $CategoryBType);
			
			$request->setObject("SponsorAll", $SponsorAll);
			$request->setObject("MonkAll", $MonkAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryVideoAll", $CategoryVideoAll);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject("PanelAdsAll", $PanelAdsAll);
									
			$request->setObject('PN', $PN);
			$request->setProperty("ActiveItem", 'LibraryVideo');
			$request->setProperty("Page", $Page);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>