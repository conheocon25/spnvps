<?php
	namespace MVC\Command;	
	class LibraryVideoMonk extends Command {
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
			$IdMonk = $request->getProperty('IdMonk');
			$Page = $request->getProperty('Page');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			if (!isset($Page)) $Page=1;
						
			$MonkAll = $mMonk->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$CategoryVideoAll = $mCategoryVideo->findAll();			
			$PagodaAll = $mPagoda->findAll();
			$SponsorAll = $mSponsor->findAll();
			$PanelAdsAll = $mPanelAds->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$CategoryBType = $mCategoryBType->find($IdBType);
			$Monk = $mMonk->find($IdMonk);
			$VMAll = $mVideoMonk->findByPage(array($IdMonk, $Page, 10));
			$PN = new \MVC\Domain\PageNavigation($Monk->getVMs()->count(), 10, $Monk->getURLRead());
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject('PN', $PN);
			$request->setProperty("ActiveItem", 'LibraryVideo');
			$request->setProperty("Page", $Page );			
			$request->setObject("Monk", $Monk);
			$request->setObject("CategoryBType", $CategoryBType);
			
			$request->setObject("VMAll", $VMAll);
			$request->setObject("MonkAll", $MonkAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("CategoryVideoAll", $CategoryVideoAll);			
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('SponsorAll', $SponsorAll);	
			$request->setObject("PanelAdsAll", $PanelAdsAll);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>