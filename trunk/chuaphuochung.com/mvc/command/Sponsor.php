<?php
	namespace MVC\Command;	
	class Sponsor extends Command{
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
						
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------						
			$SponsorAll = $mSponsor->findAll();
			$SponsorAll = $mSponsor->findAll();
			$Trackings = $mTracking->findAll();
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
			
			$Course = $mCourse->findByNear(null)->current();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setObject("SponsorAll", $SponsorAll);
			$request->setObject("Trackings", $Trackings);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject('PagodaAll', $PagodaAll);			
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);			
			$request->setObject("MonkAll", $MonkAll);
			$request->setObject("Course", $Course);
			$request->setObject("EventAll", $EventAll);
			$request->setObject("Popup", $Popup);
			
			$request->setProperty("Title", 'HOẠT ĐỘNG QUYÊN GÓP TỪ THIỆN');
			$request->setProperty("ActiveItem", 'Sponsor');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>