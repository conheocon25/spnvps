<?php
	namespace MVC\Command;	
	class Introduction extends Command {
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
			$mAudio = new \MVC\Mapper\Audio();
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
			$Video = $Videos->current();
			$Audios = $mAudio->findAll();
			$Albums = $mAlbum->findAll();			
			$Categories = $mCategoryNews->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			
			$PagodaAll = $mPagoda->findAll();

			$Events1 = $mEvent->findTop(null);
			$Event = $Events1->current();
			
			$PanelNews = $mPanelNews->findAll();
			$PanelCategoryVideoAll = $mPanelCategoryVideo->findAll();
			
			$PanelAds = $mPanelAds->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------
			$request->setObject("Videos", $Videos);
			$request->setObject("Video", $Video);
			$request->setObject("Audios", $Audios);
			$request->setObject("Albums", $Albums);
			$request->setObject("Event", $Event);
			$request->setObject("Categories", $Categories);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setProperty("ActiveItem", 'Introduction');
			$request->setObject("PanelNews", $PanelNews);
			$request->setObject("PanelCategoryVideoAll", $PanelCategoryVideoAll);
			$request->setObject("PanelAdsAll", $PanelAds);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
						
			return self::statuses('CMD_DEFAULT');
		}
	}
?>