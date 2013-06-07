<?php
	namespace MVC\Command;	
	class Online extends Command {
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
			$mVideo = new \MVC\Mapper\Video();
			
			$mAlbum = new \MVC\Mapper\Album();
			$mEvent = new \MVC\Mapper\Event();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mPanelNews = new \MVC\Mapper\PanelNews();
			$mPanelCategoryVideo = new \MVC\Mapper\PanelCategoryVideo();
			$mPanelAds = new \MVC\Mapper\PanelAds();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------
			$Videos = $mVideo->findAll();
			
			$Albums = $mAlbum->findAll();
			$Categories = $mCategoryNews->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$PagodaAll = $mPagoda->findAll();
			
			$Events1 = $mEvent->findTop(null);
			$Event = $Events1->current();
			$CLsNext = $mClassLession->findByNext(null);
			
			$PanelNews = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();
			
			$PanelAds = $mPanelAds->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$request->setObject("Videos", $Videos);			
			
			$request->setObject("Albums", $Albums);	
			$request->setObject("Categories", $Categories);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("Event", $Event);
			$request->setObject("PagodaAll", $PagodaAll);
			$request->setObject("CLsNext", $CLsNext);
			$request->setProperty("ActiveItem", 'Online');
			$request->setObject("PanelNews", $PanelNews);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			$request->setObject("PanelAdsAll", $PanelAds);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>