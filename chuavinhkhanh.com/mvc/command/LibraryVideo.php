<?php
	namespace MVC\Command;	
	class LibraryVideo extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdBType = $request->getProperty("IdBType");
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mMonk = new \MVC\Mapper\Monk();
			$mVM = new \MVC\Mapper\VideoMonk();
			$mAlbum = new \MVC\Mapper\Album();
			$mEvent = new \MVC\Mapper\Event();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mSponsor = new \MVC\Mapper\Sponsor();
			$mPanelAds = new \MVC\Mapper\PanelAds();
						
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------																		
			$VM1s = $mVM->findByUpdateTop(null);
			$VM2s = $mVM->findByUpdateTop(null);
			$VM3s = $mVM->findByUpdateTop(null);
			
			$MonkAll = $mMonk->findAll();			
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
			$CategoryBType = $mCategoryBType->find($IdBType);
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$PagodaAll = $mPagoda->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
			$EventAll = $mEvent->findTop(null);
			$Event = $EventAll->current();
			$PanelAdsAll = $mPanelAds->findAll();
			$SponsorAll = $mSponsor->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------									
			$request->setProperty("ActiveItem", 'LibraryVideo');
			
			$request->setObject("VM1s", $VM1s);
			$request->setObject("VM2s", $VM2s);
			$request->setObject("VM3s", $VM3s);
			$request->setObject("Event", $Event);
			
			$request->setObject("MonkAll", $MonkAll);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject("PanelAdsAll", $PanelAdsAll);
			$request->setObject('SponsorAll', $SponsorAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("CategoryBType", $CategoryBType);						
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>