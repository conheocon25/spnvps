<?php
	namespace MVC\Command;	
	class Sponsor extends Command {
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
			$Title = "WEB SITE CHÙA THIÊN QUANG";
												
			$AlbumAll = $mAlbum->findAll();
			$CategoryAll = $mCategoryNews->findByAll(null);
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$CategoryVideo = $mCategoryVideo->findAll()->current();			
			$AskAll = $mAsk->findByTop(array());
			$PagodaAll = $mPagoda->findAll();
			$TaskAll = $mTask->findAll();
			$SponsorPerson = $mSponsorPerson->findAll();
			
			$Course = $mCourse->findByNear(null)->current();
			$Event = $mEvent->findTop(null)->current();
						
			$DhammapadaToday = $mDhammapadaDetail->rand(null);
			$CLAll = $mClassLession->findByRecent(null);
			$CLNextAll = $mClassLession->findByNext(null);
			
			$PanelNewsAll = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();
			
			$PanelAdsAll = $mPanelAds->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty("Title", $Title);
									
			$request->setObject("AlbumAll", $AlbumAll);
			$request->setObject("SponsorPerson", $SponsorPerson);
			$request->setObject("CategoryAll", $CategoryAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("CategoryVideo", $CategoryVideo);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);			
			$request->setObject("Event", $Event);
			$request->setObject("AskAll", $AskAll);
			$request->setObject("PagodaAll", $PagodaAll);
			$request->setObject("TaskAll", $TaskAll);
			$request->setObject("Course", $Course);
			$request->setObject("DhammapadaToday", $DhammapadaToday);
			$request->setObject("CLAll", $CLAll);
			$request->setObject("CLNextAll", $CLNextAll);
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			$request->setProperty("ActiveItem", 'Sponsor');
			$request->setObject("PanelAdsAll", $PanelAdsAll);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>