<?php
	namespace MVC\Command;	
	class LibraryVideoMonkPlay extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdMonk = $request->getProperty('IdMonk');
			$IdVideoMonk = $request->getProperty('IdVideoMonk');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mVideo = new \MVC\Mapper\Video();
			$mMonk = new \MVC\Mapper\Monk();
			$mVM = new \MVC\Mapper\VideoMonk();
			$mAlbum = new \MVC\Mapper\Album();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mSponsor = new \MVC\Mapper\Sponsor();
			$mPanelAds = new \MVC\Mapper\PanelAds();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------												
			$Monks = $mMonk->findAll();
			$VM = $mVM->find($IdVideoMonk);
			$VMs = $mVM->findBy(array($IdMonk));
			$CategoryAskAll = $mCategoryAsk->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoryVideoAll = $mCategoryVideo->findAll();			
			$PagodaAll = $mPagoda->findAll();
			$SponsorAll = $mSponsor->findAll();
			
			$MonkSelected = $mMonk->find($IdMonk);			
			$Video = $VM->getVideo();
			$Video->setCount( $Video->getCount()+1 );
			$mVideo->update($Video);
			
			$MonkAll = $mMonk->findAll();
			$PanelAdsAll = $mPanelAds->findAll();			
			$CategoryBTypeAll = $mCategoryBType->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setProperty("ActiveItem", 'LibraryVideo');
			$request->setObject("VM", $VM);
			$request->setObject("VMs", $VMs);
			$request->setObject("MonkSelected", $MonkSelected);
			
			$request->setObject("MonkAll", $MonkAll);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoryVideoAll", $CategoryVideoAll);			
			$request->setObject('SponsorAll', $SponsorAll);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject("PanelAdsAll", $PanelAdsAll);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
									
			return self::statuses('CMD_DEFAULT');
		}
	}
?>