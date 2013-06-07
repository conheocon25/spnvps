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
			$IdSponsor = $request->getProperty('IdSponsor');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------
			$mVideo = new \MVC\Mapper\Video();
			$mAlbum = new \MVC\Mapper\Album();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mNews = new \MVC\Mapper\News();
			$mEvent = new \MVC\Mapper\Event();
			$mAsk = new \MVC\Mapper\Ask();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mCourse = new \MVC\Mapper\Course();
			$mClassLession = new \MVC\Mapper\ClassLession();
			$mConfig = new \MVC\Mapper\Config();
			$mTask = new \MVC\Mapper\Task();
			$mDhammapadaDetail = new \MVC\Mapper\DhammapadaDetail();
			$mSponsorPerson = new \MVC\Mapper\SponsorPerson();
			$mPanelNews = new \MVC\Mapper\PanelNews();
			$mPanelCategoryVideo = new \MVC\Mapper\PanelCategoryVideo();
			$mPanelAds = new \MVC\Mapper\PanelAds();
			$mSponsor = new \MVC\Mapper\Sponsor();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------											
			$Title = "WEB SITE CHÙA VĨNH KHÁNH";
			
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$CategoryVideo = $mCategoryVideo->findAll()->current();			
			$AskAll = $mAsk->findByTop(array());
			$PagodaAll = $mPagoda->findAll();
			$TaskAll = $mTask->findAll();
			$SponsorAll = $mSponsor->findAll();
			
			$Course = $mCourse->findByNear(null)->current();
			$Event = $mEvent->findTop(null)->current();

			$DhammapadaToday = $mDhammapadaDetail->rand(null);
			$CLs = $mClassLession->findByRecent(null);
			$CLsNext = $mClassLession->findByNext(null);
			
			$PanelNewsAll = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();			
			$PanelAdsAll = $mPanelAds->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty("Title", $Title);
			$request->setProperty("ActiveItem", 'Sponsor');
			$request->setObject("DhammapadaToday", $DhammapadaToday);
			$request->setObject("CLs", $CLs);
			$request->setObject("CLsNext", $CLsNext);
			$request->setObject("Event", $Event);
			
			$request->setObject("SponsorAll", $SponsorAll);			
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("CategoryVideo", $CategoryVideo);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);						
			$request->setObject("AskAll", $AskAll);
			$request->setObject("PagodaAll", $PagodaAll);
			$request->setObject("TaskAll", $TaskAll);
			$request->setObject("Course", $Course);			
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);		
			$request->setObject("PanelAdsAll", $PanelAdsAll);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>