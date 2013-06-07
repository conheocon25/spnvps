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
			$mVM = new \MVC\Mapper\VideoMonk();
			$mVL = new \MVC\Mapper\VideoLibrary();			
			
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();						
			$mVideo = new \MVC\Mapper\Video();
			$mAlbum = new \MVC\Mapper\Album();			
			$mNews = new \MVC\Mapper\News();
			$mEvent = new \MVC\Mapper\Event();
			$mAsk = new \MVC\Mapper\Ask();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mCourse = new \MVC\Mapper\Course();
			$mClassLession = new \MVC\Mapper\ClassLession();			
			$mTask = new \MVC\Mapper\Task();
			$mDhammapadaDetail = new \MVC\Mapper\DhammapadaDetail();
			$mConfig = new \MVC\Mapper\Config();
			$mSponsor = new \MVC\Mapper\Sponsor();
			$mPanelAds = new \MVC\Mapper\PanelAds();
			$mPanelNews = new \MVC\Mapper\PanelNews();
			$mPanelCategoryVideo = new \MVC\Mapper\PanelCategoryVideo();
									
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$Title = "WEB SITE CHÙA VĨNH KHÁNH";
															
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();			
			$AskAll = $mAsk->findByTop(array());
			$PagodaAll = $mPagoda->findAll();
			$TaskAll = $mTask->findAll();
			$AlbumAll = $mAlbum->findAll();
			$SponsorAll = $mSponsor->findAll();
			$PanelNewsAll = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();
			$PanelAdsAll = $mPanelAds->findAll();
						
			$VM24 = $mVM->findByUpdateTop(array());
			$VL24 = $mVL->findByUpdateTop(array());
			$VL8 = $mVL->findByLocalTop(array());
			$CategoryVideo = $mCategoryVideo->findAll()->current();
			$Course = $mCourse->findByNear(null)->current();
			$Event = $mEvent->findTop(null)->current();
			$DhammapadaToday = $mDhammapadaDetail->rand(null);
			$CLs = $mClassLession->findByRecent(null);
			$CLsNext = $mClassLession->findByNext(null);
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty("Title", $Title);
						
			$request->setObject("VL24", $VL24);
			$request->setObject("VM24", $VM24);
			$request->setObject("VL8", $VL8);
			$request->setObject("CLs", $CLs);
			$request->setObject("CLsNext", $CLsNext);
			$request->setObject("Event", $Event);
			$request->setObject("Course", $Course);
			$request->setObject("DhammapadaToday", $DhammapadaToday);			
			
			$request->setObject("AlbumAll", $AlbumAll);			
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("CategoryVideo", $CategoryVideo);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);						
			$request->setObject("AskAll", $AskAll);
			$request->setObject("PagodaAll", $PagodaAll);
			$request->setObject("TaskAll", $TaskAll);			
			$request->setObject("SponsorAll", $SponsorAll);			
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			$request->setObject("PanelAdsAll", $PanelAdsAll);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			
			$request->setProperty("ActiveItem", 'Home');			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>