<?php
	namespace MVC\Command;	
	class LibraryVideoPlay extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdVideo = $request->getProperty('IdVideo');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mMonk = new \MVC\Mapper\Monk();
			$mVideo = new \MVC\Mapper\Video();
			$mVM = new \MVC\Mapper\VideoMonk();			
			$mEvent = new \MVC\Mapper\Event();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mPanelAds = new \MVC\Mapper\PanelAds();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------												
			$Monks = $mMonk->findAll();
			$PagodaAll = $mPagoda->findAll();
			$VM = $mVM->find($IdVideo);
			$Video = $VM->getVideo();
			
			$MonkSelected = $VM->getMonk();
			$CategorySelected = $VM->getCategory();
			
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoriesVideo = $mCategoryVideo->findAll();
			$CategoryAskAll = $mCategoryAsk->findAll();
						
			$Video->setCount( $Video->getCount()+1 );
			$mVideo->update($Video);
			
			$PanelAds = $mPanelAds->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("Monks", $Monks);
			$request->setObject("VM", $VM);
			$request->setObject("Video", $Video);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoriesVideo", $CategoriesVideo);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject("MonkSelected", $MonkSelected);
			$request->setObject("CategorySelected", $CategorySelected);
			$request->setObject("PanelAdsAll", $PanelAds);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setProperty("ActiveItem", 'LibraryVideo');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>