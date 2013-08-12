<?php
	namespace MVC\Command;	
	class SponsorDetailVideo extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$KSponsor = $request->getProperty('KSponsor');
			$KVideoSponsor = $request->getProperty('KVideoSponsor');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Sponsor = $mSponsor->findByKey($KSponsor);
			$Video = $mVideo->findByKey($KVideoSponsor);
			
			$SponsorAll = $mSponsor->findAll();
			if (!isset($Sponsor)) $Sponsor = $SponsorAll->current();
			
			$Categories = $mCategoryNews->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();			
			$PagodaAll = $mPagoda->findAll();
			
			$PanelNewsAll = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();
			$MonkAll = $mMonk->findVIP(null);
			
			$EventAll = $mEvent->findAll();
			$Popup = $mPopup->findByName("so-vang");
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setObject("Video", $Video);
						
			$request->setObject("SponsorAll", $SponsorAll);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject('PagodaAll', $PagodaAll);			
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			$request->setObject("Sponsor", $Sponsor);
			$request->setObject("MonkAll", $MonkAll);
			
			$request->setObject("EventAll", $EventAll);
			$request->setObject("Popup", $Popup);
			
			$request->setProperty("ActiveItem", 'Sponsor');
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>