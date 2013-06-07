<?php
	namespace MVC\Command;	
	class AppCategoryVideoDetailDelLoad extends Command {
		function doExecute( \MVC\Controller\Request $request ) {
			require_once("mvc/base/domain/HelperFactory.php");			
			//-------------------------------------------------------------
			//THAM SỐ TOÀN CỤC
			//-------------------------------------------------------------			
			$Session = \MVC\Base\SessionRegistry::instance();
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------			
			$IdCategory = $request->getProperty('IdCategory');
			$IdVideoLibrary = $request->getProperty('IdVideoLibrary');
			
			//-------------------------------------------------------------
			//MAPPER DỮ LIỆU
			//-------------------------------------------------------------						
			$mVideoLibrary = new \MVC\Mapper\VideoLibrary();
			$mPagoda = new \MVC\Mapper\Pagoda();
			$mCategoryAsk = new \MVC\Mapper\CategoryAsk();
			$mCategoryNews = new \MVC\Mapper\CategoryNews();
			$mCategoryVideo = new \MVC\Mapper\CategoryVideo();
			$mCategoryBType = new \MVC\Mapper\CategoryBType();
			$mPanelAds = new \MVC\Mapper\PanelAds();
			
			//-------------------------------------------------------------
			//XỬ LÝ CHÍNH
			//-------------------------------------------------------------										
			$CategoryAskAll = $mCategoryAsk->findAll();
			$CategoryNewsAll = $mCategoryNews->findAll();
			$PagodaAll = $mPagoda->findAll();
			$VL = $mVideoLibrary->find($IdVideoLibrary);
			$CategoryBType = $mCategoryBType->findAll();
			$PanelAdsAllAll = $mPanelAds->findAll();			
			$Title = "Quản lý / Danh mục / ".$VL->getCategory()->getName()." / ".$VL->getVideo()->getName()." / Xóa";
			
			//-------------------------------------------------------------
			//THAM SỐ GỬI ĐI
			//-------------------------------------------------------------						
			$request->setObject('VL', $VL);
			$request->setProperty('Title', $Title);
			$request->setObject('CategoryAskAll', $CategoryAskAll);
			$request->setObject('CategoryNewsAll', $CategoryNewsAll);
			$request->setObject('PagodaAll', $PagodaAll);
			$request->setObject('CategoryBTypeAll', $CategoryBType);
			$request->setObject('PanelAdsAll', $PanelAdsAllAll);
			$request->setProperty('ActiveItem', 'Home');
		}
	}
?>
