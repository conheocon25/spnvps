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
			$IdCategory = $request->getProperty('IdCategory');
			$Page = $request->getProperty('Page');
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$Category = $mCategoryNews->find($IdCategory);			
			$AlbumAll = $mAlbum->findAll();			
			$CategoryAskAll = $mCategoryAsk->findAll();
			$PagodaAll = $mPagoda->findAll();
			$SponsorAll = $mSponsor->findAll();			
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
						
			if (!isset($Page)) $Page = 1;
			
			$Course = $mCourse->findByNear(null)->current();
			$Event = $mEvent->findTop(null)->current();

			$Title = mb_strtoupper("TIN TỨC / ".$Category->getName(), 'UTF8');
			
			$NewsAll = $mNews->findByCategoryPage(array($IdCategory, $Page, 8));
			$PN = new \MVC\Domain\PageNavigation($Category->getNews()->count(), 8, $Category->getURLRead());
						
			$PanelNewsAll = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();			
			$PanelAdsAll = $mPanelAds->findAll();
			$MonkAll = $mMonk->findVIP(null);
			
			$Popup = $mPopup->findByName("news");
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty("Title", $Title);
						
			$request->setObject("Category", $Category);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);			
			$request->setObject("Event", $Event);
			$request->setObject("SponsorAll", $SponsorAll);
			$request->setObject("PagodaAll", $PagodaAll);
			$request->setObject("Course", $Course);
			$request->setObject("NewsAll", $NewsAll);				
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			$request->setObject("PanelAdsAll", $PanelAdsAll);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("MonkAll", $MonkAll);
			$request->setObject("Popup", $Popup);
			
			$request->setObject("PN", $PN);			
			$request->setProperty("ActiveItem", 'ReadCategory');
			$request->setProperty("Page", $Page);	
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>
