<?php
	namespace MVC\Command;	
	class Home extends Command {
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
			include("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Title = "WEBSITE CHÙA KHAI TƯỜNG";
						
			$VM24 = $mVM->findByUpdateTop1(null);
			$VM8 = $mVM->findByTopLocal(array(2));
			$VL24 = $mVL->findByUpdateTop(array(2));
			$VL8 = $mVL->findByTopLocal(array(2));
			
			$AlbumAll = $mAlbum->findAll();
			$Categories = $mCategoryNews->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$CategoryVideo = $mCategoryVideo->findAll()->current();
			$SponsorAll = $mSponsor->findAll();						
			$AskAll = $mAsk->findByTop(array());
			$PagodaAll = $mPagoda->findAll();
			$PanelAdsAll = $mPanelAds->findAll();
			$PanelNewsAll = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();
			$TaskAll = $mTask->findAll();
			$MonkAll = $mMonk->findVIP(null);
			
			$Event = $mEvent->findByNear(null)->current();
			$Course = $mCourse->findByNear(null)->current();
												
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty("Title", $Title);
			
			$request->setObject("VL8", $VL8);
			$request->setObject("VM8", $VM8);
			$request->setObject("VM24", $VM24);
			$request->setObject("VL24", $VL24);
			$request->setObject("Course", $Course);			
			$request->setObject("Event", $Event);			
						
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("CategoryVideo", $CategoryVideo);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);			
			$request->setObject("AlbumAll", $AlbumAll);
			$request->setObject("AskAll", $AskAll);
			$request->setObject("PagodaAll", $PagodaAll);
			$request->setObject("SponsorAll", $SponsorAll);
			$request->setObject("TaskAll", $TaskAll);											
			$request->setObject("PanelAdsAll", $PanelAdsAll);
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			$request->setObject("MonkAll", $MonkAll);

			$request->setProperty("ActiveItem", 'Home');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>