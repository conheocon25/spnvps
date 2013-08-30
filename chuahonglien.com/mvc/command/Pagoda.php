<?php
	namespace MVC\Command;	
	class Pagoda extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$KPagoda = $request->getProperty('KPagoda');
			$KVideoPagoda = $request->getProperty('KVideoPagoda');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Categories = $mCategoryNews->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$PagodaAll = $mPagoda->findAll();
			
			$Pagoda = $mPagoda->findByKey($KPagoda);			
			$Video = $mVideo->findByKey($KVideoPagoda);
			
			$EventAll = $mEvent->findAll();
			$Popup = $mPopup->findByName("chua-ban");
			
			$SponsorAll = $mSponsor->findAll();
			$PanelNewsAll = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();
			$MonkAll = $mMonk->findVIP(null);
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setObject("Pagoda", $Pagoda);
			$request->setObject("Video", $Video);
			
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);			
			$request->setObject("PagodaAll", $PagodaAll);
						
			$request->setObject("SponsorAll", $SponsorAll);
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			$request->setObject("MonkAll", $MonkAll);
			
			$request->setObject("EventAll", $EventAll);
			$request->setObject("Popup", $Popup);
			
			$request->setProperty("ActiveItem", 'Pagoda');
									
			return self::statuses('CMD_DEFAULT');
		}
	}
?>