<?php
	namespace MVC\Command;	
	class Report extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdTracking = $request->getProperty('IdTracking');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$SponsorAll = $mSponsor->findAll();
			$TrackingAll = $mTracking->findAll();			
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();			
			$PagodaAll = $mPagoda->findAll();			
			$PanelNewsAll = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();			
			$Tracking = $mTracking->find($IdTracking);
			$MonkAll = $mMonk->findVIP(null);
			
			$EventAll = $mEvent->findAll();
			$Popup = $mPopup->findByName("bao-cao");
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setObject("EventAll", $EventAll);
			$request->setObject("Popup", $Popup);
			
			$request->setObject("SponsorAll", $SponsorAll);
			$request->setObject("TrackingAll", $TrackingAll);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject('PagodaAll', $PagodaAll);			
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);			
			$request->setObject("Tracking", $Tracking);
			$request->setObject("MonkAll", $MonkAll);
			
			$request->setProperty("Title", 'BÁO CÁO');
			$request->setProperty("ActiveItem", 'Sponsor');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>