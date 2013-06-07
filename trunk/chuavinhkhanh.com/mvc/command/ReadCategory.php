<?php
	namespace MVC\Command;	
	class ReadCategory extends Command {
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
			$Page = $request->getProperty('Page');
						
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
						
			if (!isset($IdCategory)){
				$Category = $CategoryNewsAll->current();
			}else{
				$Category = $mCategoryNews->find($IdCategory);
			}
			if (!isset($Page)) $Page = 1;
			
			$Course = $mCourse->findByNear(null)->current();
			$Event = $mEvent->findTop(null)->current();			
			$Title = mb_strtoupper("TIN TỨC / ".$Category->getName(), 'UTF8');			
			$NewsAll = $mNews->findByCategoryPage(array($IdCategory, $Page, 8));
			$PN = new \MVC\Domain\PageNavigation($Category->getNews()->count(), 8, $Category->getURLRead());			
			$DhammapadaToday = $mDhammapadaDetail->rand(null);
			$CLsNext = $mClassLession->findByNext(null);
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setProperty("Title", $Title);
			$request->setProperty("ActiveItem", 'ReadCategory');
			$request->setProperty("Page", $Page);
			$request->setObject("PN", $PN);
			$request->setObject("DhammapadaToday", $DhammapadaToday);			
			$request->setObject("Category", $Category);
			$request->setObject("Course", $Course);
			$request->setObject("Event", $Event);
			$request->setObject("CLsNext", $CLsNext);
			$request->setObject("NewsAll", $NewsAll);
			
			$request->setObject("AlbumAll", $AlbumAll);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);			
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("AskAll", $AskAll);
			$request->setObject("PagodaAll", $PagodaAll);
			$request->setObject("TaskAll", $TaskAll);						
			$request->setObject("SponsorAll", $SponsorAll);
			$request->setObject("PanelNewsAll", $PanelNewsAll);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			$request->setObject("PanelAdsAll", $PanelAdsAll);			
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>
