<?php
	namespace MVC\Command;	
	class LibraryVideoCategoryPlay extends Command {
		function doExecute( \MVC\Controller\Request $request ){
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------						
			$Session = \MVC\Base\SessionRegistry::instance();
									
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐẾN
			//-------------------------------------------------------------
			$IdCategory = $request->getProperty('IdCategory');
			$IdVideoLibrary = $request->getProperty('IdVideoLibrary');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mVideo = new \MVC\Mapper\Video();
			$mMonk = new \MVC\Mapper\Monk();
			$mVL = new \MVC\Mapper\VideoLibrary();
			$mAlbum = new \MVC\Mapper\Album();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mPanelAds = new \MVC\Mapper\PanelAds();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------												
			$Monks = $mMonk->findAll();
			$VL = $mVL->find($IdVideoLibrary);
			$VLs = $mVL->findBy(array($IdCategory));
			$CategoryAskAll = $mCategoryAsk->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$CategoriesVideo = $mCategoryVideo->findAll();
			$Category = $mCategoryVideo->find($IdCategory);
			$PagodaAll = $mPagoda->findAll();
						
			$CategorySelected = $mCategoryVideo->find($IdCategory);
			$Video = $VL->getVideo();
			$Video->setCount( $Video->getCount()+1 );
			$mVideo->update($Video);
			
			$PanelAds = $mPanelAds->findAll();
			$CategoryBTypeAll = $mCategoryBType->findAll();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject("VL", $VL);
			$request->setObject("VLs", $VLs);
			$request->setObject("Monks", $Monks);
			$request->setObject("CategoryAskAll", $CategoryAskAll);
			$request->setObject("CategoryNewsAll", $CategoryNewsAll);
			$request->setObject("CategoriesVideo", $CategoriesVideo);
			$request->setObject("CategorySelected", $CategorySelected);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject("PanelAdsAll", $PanelAds);
			$request->setObject("CategoryBTypeAll", $CategoryBTypeAll);
			$request->setProperty("ActiveItem", 'LibraryVideo');
			
			return self::statuses('CMD_DEFAULT');
		}
	}
?>