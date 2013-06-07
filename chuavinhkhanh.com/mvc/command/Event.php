<?php
	namespace MVC\Command;	
	class Event extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdEvent = $request->getProperty('IdEvent');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
			$mEvent = new \MVC\Mapper\Event();
			$mNews = new \MVC\Mapper\News();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mCourse = new \MVC\Mapper\Course();
			$mConfig = new \MVC\Mapper\Config();
			$mDhammapadaDetail = new \MVC\Mapper\DhammapadaDetail();
			$mClassLession = new \MVC\Mapper\ClassLession();
			$mSponsor = new \MVC\Mapper\Sponsor();
			$mPanelNews = new \MVC\Mapper\PanelNews();
			$mPanelCategoryVideo = new \MVC\Mapper\PanelCategoryVideo();
			$mPanelAds = new \MVC\Mapper\PanelAds();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------			
			$EventsNear = $mEvent->findByNear(null);
			$EventsFinish = $mEvent->findByFinish(null);									
			$Event = $EventsNear->current();
			
			if (isset($IdEvent)){
				$EventRead = $mEvent->find($IdEvent);
			}else{
				$EventRead = $EventsNear->current();
			}
			
			$Course = $mCourse->findByNear(null)->current();						
			$DhammapadaToday = $mDhammapadaDetail->rand(null);
			$CLsNext = $mClassLession->findByNext(null);
			
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$PagodaAll = $mPagoda->findAll();
			$SponsorAll = $mSponsor->findAll();
			$PanelNewsAll = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();			
			$PanelAds = $mPanelAds->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("Event", $Event);
			$request->setProperty("ActiveItem", 'Event');			
			$request->setObject("EventRead", $EventRead);
			$request->setObject("EventsNear", $EventsNear);
			$request->setObject("EventsFinish", $EventsFinish);						
			$request->setObject("Course", $Course);
			$request->setObject("CLsNext", $CLsNext);
			$request->setObject("DhammapadaToday", $DhammapadaToday);			
			
			$request->setObject("SponsorAll", $SponsorAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject('PagodaAll', $PagodaAll);						
			$request->setObject("SponsorAll", $SponsorAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			$request->setObject("PanelAdsAll", $PanelAds);
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>