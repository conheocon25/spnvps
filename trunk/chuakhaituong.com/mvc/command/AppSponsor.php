<?php
	namespace MVC\Command;	
	class AppSponsor extends Command{
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
			$SponsorAll = $mSponsor->findAll();
			$PanelAdsAll = $mPanelAds->findAll();
			$PanelNewsAll = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();
			$ConfigAll = $mConfig->findAll();
			$TaskAll = $mTask->findAll();
			
			$SponsorList = $mSponsor->findAll();
			
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
			$request->setObject('PanelNewsAll', $PanelNewsAll);
			$request->setObject('PanelCategoryVideoAll', $PanelCategoryVideoAll);
			$request->setObject('TaskAll', $TaskAll);
			
			$request->setObject('SponsorList', $SponsorList);
			
			$request->setProperty("Title", 'QUẢN LÝ / SỔ VÀNG CÔNG ĐỨC / ');			
			$request->setProperty("ActiveAdmin", 'Sponsor');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>