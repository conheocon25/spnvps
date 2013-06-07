<?php
	namespace MVC\Command;	
	class AppPanelAds extends Command{
		function doExecute( \MVC\Controller\Request $request ){
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
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryVideoAll = $mCategoryVideo->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$PagodaAll = $mPagoda->findAll();
			$AlbumAll = $mAlbum->findAll();
			$EventAll = $mEvent->findAll();
			$MonkAll = $mMonk->findAll();
			$CourseAll = $mCourse->findAll();
			$TaskAll = $mTask->findAll();
			$LinkedAll = $mLinked->findAll();
			$SponsorAll = $mSponsor->findAll();
			$PanelAdsAllAll = $mPanelAds->findAll();
			$PanelNewsAllAll = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();
			
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
			$request->setObject('TaskAll', $TaskAll);
			$request->setObject('LinkedAll', $LinkedAll);
			$request->setObject('SponsorAll', $SponsorAll);
			$request->setObject('PanelAdsAll', $PanelAdsAllAll);
			$request->setObject('PanelNewsAllAll', $PanelNewsAllAll);
			$request->setObject('PanelCategoryVideoAll', $PanelCategoryVideoAll);
			
			$request->setProperty("Title", 'QUẢN LÝ / PANEL / QUẢNG CÁO / ');
			$request->setProperty("ActiveItem", 'Home');
			$request->setProperty("ActiveAdmin", 'PanelAds');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>