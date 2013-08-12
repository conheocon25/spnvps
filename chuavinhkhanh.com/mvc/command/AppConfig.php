<?php
	namespace MVC\Command;	
	class AppConfig extends Command{
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$Page = $request->getProperty('Page');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			require_once("mvc/base/mapper/MapperDefault.php");
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryVideoAll = $mCategoryVideo->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();			
			$CategoryPaidAll = $mCategoryPaid->findAll();			
			$CategoryTaskAll = $mCategoryTask->findAll();
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
			$PopupAll = $mPopup->findAll();
			
			$Title = "CẤU HÌNH";
			$Navigation = array(
				array("TRANG CHỦ", "/trang-chu"),
				array("QUẢN LÝ", "/app")
			);
			
			if (!isset($Page)) $Page=1;			
			$Config = $mConfig->findByName("ROW_PER_PAGE");
			$ConfigAll1 = $mConfig->findByPage(array($Page, $Config->getValue() ));
			$PN = new \MVC\Domain\PageNavigation($ConfigAll->count(), $Config->getValue(), "/app/config" );
					
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryVideoAll", $CategoryVideoAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);			
			$request->setObject("CategoryPaidAll", $CategoryPaidAll);			
			$request->setObject("CategoryTaskAll", $CategoryTaskAll);
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
			$request->setObject('PopupAll', $PopupAll);
			
			$request->setObject('ConfigAll1', $ConfigAll1);
			$request->setObject('Navigation', $Navigation);
			$request->setObject('PN', $PN);
			$request->setProperty("Title", $Title);
			$request->setProperty("Page", $Page);
			$request->setProperty("ActiveItem", 'Home');
			$request->setProperty("ActiveAdmin", 'Statistic');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>