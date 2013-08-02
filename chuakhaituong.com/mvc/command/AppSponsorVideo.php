<?php
	namespace MVC\Command;	
	class AppSponsorVideo extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdSponsor = $request->getProperty('IdSponsor');
			$Page = $request->getProperty('Page');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryVideoAll = $mCategoryVideo->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();			
			$PagodaAll = $mPagoda->findAll();
			$AlbumAll = $mAlbum->findAll();
			$EventAll = $mEvent->findAll();
			$MonkAll = $mMonk->findAll();
			$CourseAll = $mCourse->findAll();
			$SponsorAll = $mSponsor->findAll();
			$PanelAdsAll = $mPanelAds->findAll();
			$PanelNews = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();
			$ConfigAll = $mConfig->findAll();
			
			$Sponsor = $mSponsor->find($IdSponsor);
			$SponsorAll = $mSponsor->findAll();
			$Title = mb_strtoupper($Sponsor->getName(),'UTF8');
			$Navigation = array(
				array("TRANG CHỦ", "/trang-chu"),
				array("QUẢN LÝ", "/app"),
				array("SỔ VÀNG CÔNG ĐỨC", "/app/sponsor")
			);
			
			if (!isset($Page)) $Page=1;
			$Config = $mConfig->findByName("ROW_PER_PAGE");
			$VSAll = $mVS->findByPage(array($IdSponsor, $Page, $Config->getValue()));
			$PN = new \MVC\Domain\PageNavigation($Sponsor->getVideoAll()->count(), $Config->getValue(), $Sponsor->getURLVideo());
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryVideoAll", $CategoryVideoAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);			
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('AlbumAll', $AlbumAll);
			$request->setObject('EventAll', $EventAll);
			$request->setObject('MonkAll', $MonkAll);
			$request->setObject('CourseAll', $CourseAll);
			$request->setObject('SponsorAll', $SponsorAll); 
			$request->setObject('ConfigAll', $ConfigAll); 
			$request->setObject('PanelAdsAll', $PanelAdsAll);
			$request->setObject('PanelNews', $PanelNews);
			$request->setObject('PanelCategoryVideoAll', $PanelCategoryVideoAll);
			
			$request->setObject('Sponsor', $Sponsor);			
			$request->setObject('VSAll', $VSAll);
			$request->setObject('Navigation', $Navigation);
			$request->setObject('PN', $PN);
			$request->setProperty("Title", $Title);
			$request->setProperty("Page", $Page);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>