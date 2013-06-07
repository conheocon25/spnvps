<?php
	namespace MVC\Command;	
	class ReadCategoryDetail extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdCategory = $request->getProperty('IdCategory');
			$IdNews = $request->getProperty('IdNews');
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------			
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
			
			$News = $mNews->find($IdNews);
			$Category = $mCategoryNews->find($IdCategory);
			if(isset($News)) {
				$Title = mb_strtoupper( $News->getTitle(), 'UTF8');
			}
			else {
				$Title = "";
			}
			$Course = $mCourse->findByNear(null)->current();
			$Event = $mEvent->findTop(null)->current();
			$DhammapadaToday = $mDhammapadaDetail->rand(null);
			$CLsNext = $mClassLession->findByNext(null);
						
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty("Title", $Title);
			$request->setProperty("ActiveItem", 'ReadCategory');
			$request->setObject("CLsNext", $CLsNext);			
			$request->setObject("Event", $Event);
			$request->setObject("Course", $Course);
			$request->setObject("Category", $Category);
			$request->setObject("News", $News);			
			$request->setObject("DhammapadaToday", $DhammapadaToday);						
						
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);			
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("PagodaAll", $PagodaAll);
			$request->setObject("SponsorAll", $SponsorAll);			
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			$request->setObject("PanelAdsAll", $PanelAdsAll);			
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>
